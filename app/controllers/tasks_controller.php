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
	
	function toggleStatus($id=null) {
		//set id
		$this->data["Task"]["id"] = $id;
		
		//get current status
		$old_status = $this->Task->findById($id, array('fields'=>'Task.status'));
		$old_status = $old_status["Task"]["status"];
		
		//toggle status
		$this->data["Task"]["status"] = $old_status==0 ? 1 : 0;		
				
		$this->Task->save($this->data);
		die("s".$this->data["Task"]["status"]);						
	}	
	
	
	function add($milestone_id = null) {
		//data has been posted
		if (!empty($this->data)) {														
			if ($this->Task->save($this->data)) {
				$this->Session->setFlash(__('The task has been saved', true));
				$this->redirect(array('controller'=>'projects','action' => 'dashboard'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.', true));
			}			
		//no data has been posted yet	
		}else{
			$this->set("milestone_id", $milestone_id);
		}
	}	
		
}
?>