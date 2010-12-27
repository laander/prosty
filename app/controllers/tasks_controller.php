<?php
class TasksController extends AppController {
	var $components = array('Session');
	var $helpers = array ('Html','Form');
	var $name = 'Tasks';
	
	//var $scaffold;
	
	/*
	function index() {
		$this->set('milestones', $this->Milestone->find('all'));
	}
	*/	
	
	function view($id=null) {		
				$this->set('task', $this->Task->read(null, $id));
	}	
	
	
	function add($milestone_id = null) {

		//data has been posted
		if (!empty($this->data)) {														
			if ($this->Task->save($this->data)) {
				$this->Session->setFlash(__('The task has been saved', true));
				$this->redirect(array('controller'=>'milestones','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.', true));
			}
			
		//no data has been posted yet	
		}else{
			$this->data["Task"]["milestone_id"] = $milestone_id;
		}
	}	
		
}
?>