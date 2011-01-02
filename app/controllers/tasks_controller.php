<?php
class TasksController extends AppController {
	var $name = 'Tasks';
	var $components = array('Session', 'RequestHandler');
	var $helpers = array ('Html','Form','Ajax','Javascript');
		
	function index() {
		$this->redirect(array('controller' => 'milestones', 'action' => 'index'));
	}
	
	function view($id = null) {		
		$this->set('task', $this->Task->read(null, $id));
	}	
		
	function add() {
		if (!empty($this->data)) {														
			if ($this->Task->save($this->data)) {
				$this->Session->setFlash(__('The task has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$milestones = $this->Task->Milestone->find('list', array('conditions' => array('Milestone.project_id' => $this->currentProject('id'))));
			$users = $this->Task->User->find('list');
			$this->set(compact('milestones', 'users'));		
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid task', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Task->save($this->data)) {
				$this->Session->setFlash(__('The Task has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Task could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$milestones = $this->Task->Milestone->find('list', array('conditions' => array('Milestone.project_id' => $this->currentProject('id'))));
			$users = $this->Task->User->find('list');
			$task['Task']['id'] = $id;			
			$this->set(compact('milestones', 'users', 'task'));		
			$this->data = $this->Task->read(null, $id);
		}
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for task', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Task->delete($id)) {
			$this->Session->setFlash(__('Task deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Task was not deleted', true));
			$this->redirect(array('action'=>'index'));
	}
	
	
	// Toggles the status, called using ajax
	function ajaxToggleStatus($task_id = null) {
		//set id
		$this->data["Task"]["id"] = $task_id;
		
		//get current status
		$old_status = $this->Task->findById($task_id, array('fields'=>'Task.status'));
		$old_status = $old_status["Task"]["status"];
		
		//toggle status
		$this->data["Task"]["status"] = $old_status==0 ? 1 : 0;		
				
		$this->Task->save($this->data);
		
		if ($this->data["Task"]["status"] == 1) {
			$this->Session->setFlash(__('Task marked as completed', true));		
			die("1");
		} else {
			$this->Session->setFlash(__('Task marked as unfinished', true));
			die("0");	
		}
	}	

	// Set current user as assigned, called using ajax
	function ajaxSetAsAssigned($task_id = null) {
		//set id
		$this->data["Task"]["id"] = $task_id;
				
		//get userid
		$user = $this->Auth->user();

		//set assigned_id to user_id
		$this->data["Task"]["assigned_id"] = $user["User"]["id"];		

		//save
		if($this->Task->save($this->data)) {
			$this->Session->setFlash(__('You have been assigned the task', true));
			die("1");
		} else {
			$this->Session->setFlash(__("Couldn't assign you the task", true));		
			die("0");
		}
/*		if ($this->params['isAjax']) {
			return true;
		} else {
			$this->Session->setFlash(__('You have been assigned the task!', true));
			$this->redirect(array('controller' => 'projects', 'action' => 'dashboard'));		
		}
*/
	}	
	
	// Used for inline editing, called using ajax
	public function ajaxJEdit() {			
		if($this->params['isAjax']){
						
			$id = $this->params['form']['id'];
			$field = $this->params['form']['field'];
			$value = $this->params['form']['value'];			
			
			$this->data["Task"]["id"] = $id;
        	$this->data["Task"][$field] = $value;
        	
			if ($this->Task->save($this->data) && $this->Task->hasField($field)) {
				$this->Session->setFlash('The task was updated!');
			}
			echo $value;
			die();			
		}		
	}	
		
}
?>