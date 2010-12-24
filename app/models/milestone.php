<?php

class Milestone extends AppModel {
    var $name = 'Milestone';        
    var $hasMany = array(
    		'Task'=> array(
	    		'className'=>'Task',
	    		'order'    => 'Task.status ASC'
    		)
    	);
    	
    var $belongsTo = array(
    	'Project' =>array(
    		'className' => 'Project',
    		'foreignKey' => 'project_id'    	
    	),
    	'User' => array(
    		'className' => 'User',
    		'foreignKey' => 'user_id'
    	)
    );
    
    
  
}

?>