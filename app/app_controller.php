<?php
class AppController extends Controller {
	var $components = array('Auth','RequestHandler');

	//make userinfo available in all views
	function beforeRender(){		
		$this->set('currentUser', $this->Auth->user());	
		
		//if no project is defined - redirect to dashboard (which will determine if any projects exists)
		$excludeArray = array("Users", "Projects");
		if(!isset($_SESSION["Project"]["id"]) && !in_array($this->name, $excludeArray)){
		        //$this->redirect(array('controller' => 'projects', 'action' => 'dashboard'));
		}			
	}	
}
?>
