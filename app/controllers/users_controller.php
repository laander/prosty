<?php
class UsersController extends AppController {
	var $helpers = array ('Html','Form');
	var $name = 'Users';
	
	var $scaffold;

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->loginRedirect = array('controller' => 'milestones', 'action' => 'index');
        $this->Auth->allow('add');        
    }
	
	
	function login() {

	}
	
    function logout() {
        $this->redirect($this->Auth->logout());
    }
}
?>