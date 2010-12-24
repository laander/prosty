<?php
class TasksController extends AppController {
	var $helpers = array ('Html','Form');
	var $name = 'Tasks';
	
	var $scaffold;
	
	/*
	function index() {
		$this->set('milestones', $this->Milestone->find('all'));
	}
	*/
	
	function view($id=null) {		
				$this->set('task', $this->Task->read(null, $id));
	}	
	
}
?>