<?php
class UserProject extends AppModel {
	var $name = 'UserProject';
	var $displayField = 'id';

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id'
		)
	);
}
?>