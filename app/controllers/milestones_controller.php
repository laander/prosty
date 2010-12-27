<?php
class MilestonesController extends AppController {
	var $components = array('Session');
	var $helpers = array ('Html','Form');
	var $name = 'Milestones';

	var $scaffold;
	
	function index() {					
		$this->helpers[] = 'Time';		
		$this->set('milestones', $this->paginate());
	}	
	
	function add() {
		if (!empty($this->data)) {											
			//$this->data["Milestone"]["project_id"] = $this->Session->read('Project.id');			
			if ($this->Milestone->save($this->data)) {
				$this->Session->setFlash(__('The milestone has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The milestone could not be saved. Please, try again.', true));
			}
		}
	}	
	
	/*** edit ***/	
	function edit($id = null) {		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid milestone', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {			
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
	
}
?>