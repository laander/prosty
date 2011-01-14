<?php
class Role extends AppModel {
    var $name = 'Role';
	
	// Datasource for roles, uses data in static array instead of db lookup for optimization
	var $useDbConfig = 'array';	
	var $records = array(
		array(
			'id' => 1,
			'name' => 'Angel',
			'modified' => '',
			'created' => '',
			'created_by' => 1,
			'modified_by' => 1
		),
		array(
			'id' => 2,
			'name' => 'Agent',
			'modified' => '',
			'created' => '',
			'created_by' => 1,
			'modified_by' => 1
		),
		array(
			'id' => 3,
			'name' => 'Client',
			'modified' => '',
			'created' => '',
			'created_by' => 1,
			'modified_by' => 1
		)
	);

}

?>