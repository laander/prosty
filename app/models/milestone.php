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
    	)
    );
    
    /** only fetch milestones from project currently being viewed **/  
    function beforeFind($queryData){    	
    	if(isset($_SESSION["Project"]["id"])){
    		$queryData['order']['Milestone.deadline'] = 'asc';
    		$queryData['conditions']['Milestone.project_id'] = $_SESSION["Project"]["id"];
    		return $queryData;
    	}else{    	
    		return false;
    	}
    }     

    function beforeSave($queryData){
    	$this->data["Milestone"]["project_id"] = $_SESSION["Project"]["id"];
    	return true;
    }
    
}

?>