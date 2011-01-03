<?php
class AppController extends Controller {
	var $components = array('Auth','RequestHandler');
	
	function beforeRender(){		
		
		// will supply the HTML sites base url to the layout so it can set the HTML <base /> for ajax
		// http://' . $_SERVER['SERVER_NAME']. ':' . $_SERVER['SERVER_PORT']
		$this->set('base_url', Router::url('/'));
		
		// Set current user variable
		$currentUser = $this->currentUser();
		if ($currentUser != false) {
			$this->set('currentUser', $currentUser);
			$this->set('currentUserId', $currentUser['id']);
		} else {
			$this->set('currentUser', array());
			$this->set('currentUserId', 0);		
		}
		
		// Set current project variable or redirect if not chosen (with exclusions)
		$currentProject = $this->currentProject();
		if ($currentProject != false) {
			$this->set('currentProject', $currentUser);
			$this->set('currentProjectId', $currentProject['id']);		
		} else {
			if (
				($this->params['controller'] == 'projects' && $this->params['action'] == 'index') ||
				($this->params['controller'] == 'users' && $this->params['action'] == 'login')) {
				$this->set('currentProject', array());
				$this->set('currentProjectId', 0);
			} else {
				$this->Session->setFlash(__('Please select a project', true));
				$this->redirect(array('controller' => 'projects', 'action' => 'index'));					
			}
		}
		
		// Get a list of all projects and set list array for project selector element (dropdown)
		$this->loadModel('Project');
		$this->set('projectsSelector', $this->Project->find('list'));
	}

	// Will return current user or false if not available.
	// Call with a specified field as argument ($this->currentUser('id')) or else it will return all fields as an array (e.g. $user['id'])
	function currentUser($field = null) {
		if($this->Auth->user()) {
			$currentUser = $this->Auth->user();
			if (isset($field)) {
				return $currentUser['User'][$field];
			} else {
				return $currentUser['User'];
			}
		} else {
			return false;		
		}
	}
	
	
	// Will return current project or false if not available.
	// Call with a specified field as argument ($this->currentProject('id')) or else it will return all fields as an array (e.g. $project['id'])
	function currentProject($field = null) {
		if (isset($_SESSION["Project"]["id"])) {
			$currentProjectId = $_SESSION["Project"]["id"];
			if (isset($field) && $field == 'id') {
				return $currentProjectId;
			} else {
				$this->loadModel('Project');
				$currentProject = $this->Project->find('first', array(
					'recursive' => 0,
					'conditions' => array('Project.id' => $currentProjectId)
				));
				if (isset($field) && $field != null) {
					return $currentProject['Project'][$field];
				} else {
					return $currentProject['Project'];
				}
			}
		} else {
			return false;
		}
	}

	// Will set the supplied integer as the new current project id
	function setCurrentProject($id = null) {
		if ($id != null) {
			$this->loadModel('Project');
			$project = $this->Project->findById($id, array('fields'=>'id'));
			if ($project["Project"]["id"] != $id) { // project doesn't exist
				return false;
			} else { 
				$_SESSION["Project"]["id"] = $id;
				return true;
			}
		}
	}
		
}
?>
