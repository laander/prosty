<?php
class WikisController extends AppController {
	var $name = 'Wikis';
	var $helpers = array ('Html','Form', 'Javascript');
	var $components = array('Session');
	var $uses = array('Wiki','Milestone');
	
	function index() {
		$this->set('wikis', $this->paginate("Wiki", array('Wiki.parent_id' => 0)));		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid wiki', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$navItems = $this->Wiki->find("all", array(
		    'conditions' => array('Wiki.parent_id' => $id),
			'fields' => array('Wiki.title','Wiki.id')
		));		
		
		$wiki = $this->Wiki->read(null, $id);		
        $this->set(compact('navItems','wiki', 'milestones'));
	}

	function add($parent_id = null) {
		if (!empty($this->data)) {
			// set related project as the current project if not defined		
			if (!isset($this->data['Wiki']['project_id'])) {
				$this->data['Wiki']['project_id'] = $this->currentProject('id');
			}		
			$this->Wiki->create();
			if ($this->Wiki->save($this->data)) {
				$this->Session->setFlash(__('The wiki has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wiki could not be saved. Please, try again.', true));
			}
		}
		
		//pass parameter parent_id to hidden input in view
		if(!$parent_id){
			$parents = $this->Wiki->Parent->find('list');
			$this->set(compact('parents'));			
		}else{
			$this->data["Wiki"]["parent_id"] = $parent_id;
		}					
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid wiki', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			// set related project as the current project if not defined		
			if (!isset($this->data['Wiki']['project_id'])) {
				$this->data['Wiki']['project_id'] = $this->currentProject('id');
			}		
			if ($this->Wiki->save($this->data)) {
				$this->Session->setFlash(__('The wiki has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The wiki could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Wiki->read(null, $id);
		}
		//$users = $this->Wiki->User->find('list');
		$parents = $this->Wiki->Parent->find('list');
		$this->set(compact('users', 'parents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for wiki', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Wiki->delete($id)) {
			$this->Session->setFlash(__('Wiki deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Wiki was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>