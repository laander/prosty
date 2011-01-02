<?php
class Project extends AppModel {
	var $name = 'Project';
	var $actsAs = array('Containable');	     
	
	var $hasMany = array(
		'Milestone' => array(
			'className' => 'Milestone',
			'foreignKey' => 'project_id'
			),
		'Wiki' => array(
			'className' => 'Wiki',
			'foreignKey' => 'project_id'
			)			
		);

	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'user_projects',
			'foreignKey' => 'project_id',
			'associationForeignKey' => 'user_id',
			'with' => 'UserProject',
		),
	);					

	function beforeFind($queryData){
			
		// Make sure only people assigned to a project can see it - only exception is admins
		if(isset($_SESSION["Auth"]["User"]) && $_SESSION["Auth"]["User"]["role_id"] != 1){
			$queryData['joins'] = array(
			    array(
			        'table' => 'user_projects',
			        'alias' => 'User',
			        'type' => 'LEFT',
			        'conditions' => array(
			            'User.project_id = Project.id'
			        )
			    )
			);				
			$queryData['conditions']['User.user_id']  = $_SESSION["Auth"]["User"]["id"];
		}
		return $queryData;
	}
	
	function afterFind($results) {
		return $results;
	}
}
?>