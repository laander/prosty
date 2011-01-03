<?php
class UserProjectsController extends AppController {
	var $name = 'UserProjects';
	var $components = array("Session");

	function index() {
		$this->UserProject->recursive = 0;
		$this->set('userProjects', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user project', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('userProject', $this->UserProject->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->UserProject->create();
			if ($this->UserProject->save($this->data)) {
				$this->Session->setFlash(__('The user project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user project could not be saved. Please, try again.', true));
			}
		}
		$users = $this->UserProject->User->find('list');
		$projects = $this->UserProject->Project->find('list');
		$this->set(compact('users', 'projects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user project', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UserProject->save($this->data)) {
				$this->Session->setFlash(__('The user project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user project could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UserProject->read(null, $id);
		}
		$users = $this->UserProject->User->find('list');
		$projects = $this->UserProject->Project->find('list');
		$this->set(compact('users', 'projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UserProject->delete($id)) {
			$this->Session->setFlash(__('User project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User project was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>