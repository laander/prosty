<?php
class ProjectsController extends AppController {
	var $components = array('Session');
	var $helpers = array ('Html','Form','Javascript'); 
	
	var $name = 'Projects';
    var $paginate = array(
    		'Project' => array(
    			'limit' => 20,
    			'order' => array('Project.id' => 'asc')
    		));
	
	
	//var $scaffold;
	
	function index() {					
		$this->set('projects', $this->paginate());
	}
			
	function add($id = null) {		
		$this->loadModel('User');
		$users = $this->User->find('list');
		$this->set(compact('users'));	
		
		if (!empty($this->data)) {								
			//rearrange array for saveAll (relational) save
			foreach($this->data['UserProject']["user_id"] as $key=>$user_id){
				$this->data['UserProject'][$key]['user_id'] = $this->data['UserProject']["user_id"][$key];
			}			
			unset($this->data['UserProject']["user_id"]); //remove original records				
			
			//save parent (Project) and relational (UserProject) records 
			$this->Project->saveAll($this->data);			
		}
	}
	
	function view($id = null) {		
	    //fetch this project
		$project = $this->Project->read(null, $id);	

		//project must exist!
		if($project["Project"]["id"]!=$id){
			$this->Session->setFlash('The requested project does not exist!');
	        $this->redirect(array('controller' => 'projects', 'action' => 'index'));
		}else{		
			$this->Session->write('Project.id', $id);		
					
			// save to view variable: paginate associated project items - with condition!
		    $milestones = $this->paginate('Milestone', array('Milestone.project_id' => $id)); //return milestones associated to this project		   		   
			$this->set(compact('project', 'milestones'));
		}		
	}
	
	
	function dashboard($id = null){
		
		//precaution if no id is supplied - try recent id else any allowed id
		if(!$id){
			if($this->Session->read('Project.id')){
				$id = $this->Session->read('Project.id');	
			}else{
				$this->Project->unbindModel(array('hasMany' => array('Milestone','UserProject')));
				$temp_project = $this->Project->find('first', array('fields'=>'id'));
				$id = $temp_project["Project"]["id"];
			}			 
		}
		
	    // remove association with Milestone (for optimization)
	    $this->Project->unbindModel(array('hasMany' => array('Milestone')));
					
	    //fetch this project
		$project = $this->Project->find('first', array(
			'recursive'=>2,
			'conditions' => array('Project.id'=>$id),
		));
		
		$clients = array();
		$consultants = array();					
		foreach($project["UserProject"] as $users){			
			$username = $users["User"]["username"];
			$user_id = $users["User"]["id"];
			$role_id = $users["User"]["role_id"];
			
			//user is a client
			if($role_id==3){
				$clients[$user_id] = $username;
			}else{
				$consultants[$user_id] = $username;
			}
		}
		
		//project must exist!
		if($project["Project"]["id"]!=$id || !$id){
			$this->Session->setFlash('The requested project does not exist!');
	        $this->redirect(array('controller' => 'projects', 'action' => 'index'));
		}else{						
			$this->Session->write('Project.id', $id);   		  
			
			/*** get upcoming milestone **************************************/
			$this->helpers[] = 'Time';
			$this->loadModel('Milestone');
			
			//only milestone with deadline in the future
			$conditions = array("Milestone.deadline >=" => ".NOW()." );
			$milestone = $this->Milestone->find('first', array('conditions'=>$conditions));								
			$this->set(compact('project','milestone','clients','consultants'));
		}			
	}
}
?>