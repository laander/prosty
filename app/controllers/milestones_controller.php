<?php
class MilestonesController extends AppController {
	var $name = 'Milestones';
	var $components = array('Session');
	var $helpers = array ('Time','Html','Form','Ajax','Javascript');
	
	function index() {					
		$this->helpers[] = 'Time';		
		$milestone = $this->Milestone->find('all', array("recursive"=>2, "contain"=>array("Task.Assigned.username")));
		$this->set('milestones', $milestone);
	}
		
	function add() {	
		if (!empty($this->data)) {
			// set related project as the current project if not defined
			if (!isset($this->data['Milestone']['project_id'])) {
				$this->data['Milestone']['project_id'] = $this->currentProject('id');
			}		
			//$this->data["Milestone"]["project_id"] = $this->Session->read('Project.id');			
			if ($this->Milestone->save($this->data)) {
				$this->Session->setFlash(__('The milestone has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The milestone could not be saved. Please, try again.', true));
			}
		}
	}	
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid milestone', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			// set related project as the current project if not defined		
			if (!isset($this->data['Milestone']['project_id'])) {
				$this->data['Milestone']['project_id'] = $this->currentProject('id');
			}		
			if ($this->Milestone->save($this->data)) {
				$this->Session->setFlash(__('The Milestone has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Milestone could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Milestone->read(null, $id);
		}
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for milestone', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Milestone->delete($id)) {
			$this->Session->setFlash(__('Milestone deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Milestone was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	
	// Used for inline editing, called using ajax
	function ajaxJEdit() {			
		if($this->params['isAjax']){
			// get milestone id and field + value to save
			$id = $this->params['form']['id'];
			$field = $this->params['form']['field'];
			$value = $this->params['form']['value'];			
			// set save data
			$this->data["Milestone"]["id"] = $id;
        	$this->data["Milestone"][$field] = $value;        	
			if ($this->Milestone->save($this->data) && $this->Milestone->hasField($field)) {
				$this->Session->setFlash('The milestone was updated!');
			}
			echo $value;
			die();			
		}		
	}	
	
}
?>
