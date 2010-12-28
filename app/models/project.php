<?php

class Project extends AppModel {
	var $name = 'Project';
	    var $actsAs = array('Containable');	     
	var $hasMany = array(
		'Milestone' => array(
			'className' => 'Milestone',
			'foreignKey' => 'project_id'
			),
		'UserProject' => array(
			'className' => 'UserProject',
			'foreignKey' => 'project_id'
			)
			);					

			function beforeFind($queryData){
				/** make sure only people assigned to a project can see it - only exception is admins **/				
				if($_SESSION["Auth"]["User"]["role_id"]!=1){
					$queryData['joins'] = array(
					    array(
					        'table' => 'user_projects',
					        'alias' => 'UserProject',
					        'type' => 'LEFT',
					        'conditions' => array(
					            'UserProject.project_id = Project.id'
					        )
					    )
					);				
					$queryData['conditions']['UserProject.user_id']  = $_SESSION["Auth"]["User"]["id"];
				}
											
				return $queryData;
			}
}
?>