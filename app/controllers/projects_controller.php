<?php
class ProjectsController extends AppController {
	var $helpers = array ('Html','Form');
	var $name = 'Projects';
    var $paginate = array(
    		'Project' => array(
    			'limit' => 20,
    			'order' => array('id' => 'asc')
    		),
    		'Milestone' => array(
    			'limit' => 20),  
             	'order' => array('deadline' => 'asc')
    		);	
	
	var $scaffold;
	
	/*
	function index() {
		$this->set('milestones', $this->Milestone->find('all'));
	}
	*/
	
	function view($id = null) {
	    //fetch this project
		$project = $this->Project->read(null, $id);		
		
		// save to view variable: paginate associated project items - with condition!
	    $milestones = $this->paginate('Milestone', array('Milestone.project_id' => $id)); //return milestones associated to this project
	   
	    
		$this->set(compact('project', 'milestones'));		
	}
}
?>