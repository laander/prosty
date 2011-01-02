<?php
class Milestone extends AppModel {    
    var $name = 'Milestone';
    var $actsAs = array('Containable');            

    var $hasMany = array(
		'Task'=> array(
    		'className'=>'Task',
			'foreignKey' => 'milestone_id',
    		'order'    => 'Task.status ASC'
		)
	);	  
    	
    var $belongsTo = array(
    	'Project' =>array(
    		'className' => 'Project',
    		'foreignKey' => 'project_id' 	
    	),
    );
    
    function beforeFind($queryData){    	

		// Only fetch milestones for the project currently being viewed
		$queryData['order']['Milestone.deadline'] = 'asc';
		$queryData['conditions']['Milestone.project_id'] = $this->requestAction('milestones/currentproject/id');
		return $queryData;
    }    
}

?>