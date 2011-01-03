<?php
class ProjectsController extends AppController {
	var $name = 'Projects';
	var $components = array('Session');
	var $helpers = array ('Time', 'Html','Form','Ajax','Javascript');
	
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

		// Get latest milestone for dashboard view
		$milestone = $this->Project->Milestone->find("first", 
			array(
				"recursive" => 2,
				"conditions" => array("Milestone.deadline >=" => ".NOW()." ), 
				"contain" => array("Task.Assigned")
		));
		
		// Set view variables
		$this->set(compact('project','milestone','clients','consultants'));
	}
	
	// Used for inline editing, called using ajax
	function ajaxJEdit() {			
		if($this->params['isAjax']){
						
			$id = $this->params['form']['id'];
			$field = $this->params['form']['field'];
			$value = $this->params['form']['value'];			
			

			//only milestone with deadline in the future
			$conditions = array("Milestone.deadline >=" => ".NOW()." );			
			$milestone = $this->Milestone->find('first', array('conditions'=>$conditions, "recursive"=>2, "contain"=>array("Task.Assigned.username")));							
			$this->set(compact('project','milestone','clients','consultants'));
		}		


	
/*

//Git merge conflict - commented out due to unknown solution


			$this->data["Project"]["id"] = $id;
        	$this->data["Project"][$field] = $value;
        	
			if ($this->Project->save($this->data) && $this->Project->hasField($field)) {
				$this->Session->setFlash('The project was updated!');
			}
			echo $value;
			die();			
		}		
*/
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
