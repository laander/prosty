<?php

class Project extends AppModel {
    var $name = 'Project';
    
	var $hasMany = array(
		'Milestone' => array(
			'className' => 'Milestone',
			'foreignKey' => 'project_id'
		)
	);
    
}


?>