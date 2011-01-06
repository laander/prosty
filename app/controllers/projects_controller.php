<?php
class ProjectsController extends AppController {
	var $name = 'Projects';
	var $components = array('Session');
	var $helpers = array ('Time', 'Html','Form','Ajax','Javascript');
	
	/*turn a mysql datetime (YYYY-MM-DD HH:MM:SS) into a unix timestamp*/  
	function convert_datetime($str) { 	
	    list($date, $time) = explode(' ', $str); 
	    list($year, $month, $day) = explode('-', $date); 
	    list($hour, $minute, $second) = explode(':', $time); 
	     
	    $timestamp = mktime($hour, $minute, $second, $month, $day, $year); 	     
	    return $timestamp; 
	} 	
	
    var $paginate = array(
		'Project' => array(
			'limit' => 20,
			'order' => array('Project.id' => 'asc')
		));
			    		    		
	function index() {
		$allProjects = $this->Project->find('all', array(
			'recursive' => 1));
		$this->set('allProjects', $allProjects);
	}
			
	function add() {										
		if (!empty($this->data)) {								
			$this->Project->create();
			if ($this->Project->saveAll($this->data)) {
				$this->Session->setFlash(__('The project has been created', true));
				$this->redirect(array('action' => 'index'));			
			} else {
				$this->Session->setFlash(__('The project could not be created. Please, try again.', true));
			}						
		}
		$users = $this->Project->User->find('list', array('fields' => array('id', 'username')));
		$this->set(compact('users'));
		
	}
	
	// Will take a supplied project id, set is as a new current and redirect to dashboard
	function view($id = null) {
		
		if ($id != null) {
			if ($this->setCurrentProject($id)) { // new current project has been set
				$this->redirect(array('controller' => 'projects', 'action' => 'dashboard'));
			} else { // couldnt set supplied id as current project, probably doesn't exist
				$this->redirect(array('controller' => 'projects', 'action' => 'index'));
			}		
		} else { // no id supplied, return to the dashboard
			$this->redirect(array('controller' => 'projects', 'action' => 'dashboard'));		
		}
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The project has been saved', true));
				$this->redirect(array('action' => 'dashboard'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
		$project['Project']['id'] = $id;
		$users = $this->Project->User->find('list', array('fields' => array('id', 'username')));
		$this->set(compact('users', 'project'));
	}	

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->delete($id)) {
			$this->Session->setFlash(__('Project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Project was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	
	function dashboard() {	
				
	/***************** NOTIFICATIONS *******************************/	
		//get last login - this is only set once per session
		$last_login = $this->Session->read('User.last_login'); 
		
		if(!$last_login){
			
			//get last login 
	        $this->loadModel('User');
	        $user = $this->User->read('last_login', $this->currentUser('id'));
	        $last_login = $user["User"]["last_login"];
	        $this->Session->write('User.last_login', $last_login);

	        //update last login
			$this->User->saveField('last_login', date(DATE_ATOM));
		}
		
		//models to retrieve notifications for
		$models = array("Milestone", "Task", "Wiki");
		$notifications = array();
        foreach($models as $model){
			$this->loadModel($model);
			
			//get modified rows
			$modified = $this->$model->find('all', array(
					'conditions'=>array($model.'.modified >' => $last_login),
					'limit'=>10			
				)			
			);		

			foreach($modified as $i=>$data){								
				$modified[$i]["state"] = $data[$model]["created"]==$data[$model]["modified"] ? "created" : "modified"; //determine if the entry was created or just modified							
				$modified[$i]["date"] = $this->convert_datetime($data[$model]["modified"]); //add date field
				$modified[$i]["model"] = $model; //add model field			
				$notifications[] = $modified[$i]; //add entire entry to notifications array
			}			
        }				
        
        //sort notifications by date
        function sortByDate($b, $a) {
		    return $a['date'] - $b['date'];
		}		
		usort($notifications, 'sortByDate');
		       
		
        /***************** PROJECT INFO*******************************/
		// Get current project data
		$currentProjectId = $this->currentProject('id');
		if ($currentProjectId == false) {
			$this->Session->setFlash(__('Choose a project!', true));
			$this->redirect(array('action' => 'index'));
		}
		$project = $this->Project->find("first", array(
			"recursive" => 2,
			"conditions" => array("Project.id" => $currentProjectId),
			"contain" => array("User")
		));
						
		// Figure out which users are connected to the project, split by type
		$clients = array();
		$consultants = array();
		foreach ($project["User"] as $users) {
			$role_id = $users["role_id"];
			if ($role_id == 3){ // role id 3 is a client
				$clients[] = $users;
 			} else {
				$consultants[] = $users;
			}
		}

		/***************** UPCOMING MILESTONE *******************************/
		// Get latest milestone for dashboard view
		$milestone = $this->Project->Milestone->find("first", 
			array(
				"recursive" => 2,
				"conditions" => array("Milestone.deadline >=" => ".NOW()." ), 
				"contain" => array("Task.Assigned")
		));
		
		// Set view variables
		$this->set(compact('project','milestone','clients','consultants', 'notifications'));
	}
	
	// Used for inline editing, called using ajax
	function ajaxJEdit() {			
		if($this->params['isAjax']){
			// get milestone id and field + value to save			
			$id = $this->params['form']['id'];
			$field = $this->params['form']['field'];
			$value = $this->params['form']['value'];			
			// set save data
			$this->data["Project"]["id"] = $id;
        	$this->data["Project"][$field] = $value;
			if ($this->Project->save($this->data) && $this->Project->hasField($field)) {
				$this->Session->setFlash('The project was updated!');
			}
			echo $value;
			die();			
		}
	}
	
	// Creates a flash message if supplied and echos the flash message again
	function ajaxFlash($text = null) {
		if ($text != null) {
			$this->Session->setFlash($text);
		}
		$this->layout = "ajax_flash";
	}		
	
}
?>
