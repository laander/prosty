<?php
class Wiki extends AppModel {
	var $name = 'Wiki';
	
    var $belongsTo = array(    
    	'Parent' =>array(
    		'className' => 'Wiki',
    		'foreignKey' => 'parent_id'
    	)    	
    );  

	function beforeFind($queryData){	
			
		/*** filter by project_id ***/
		if ($this->hasField('project_id')) {
			$queryData['conditions']['Wiki.project_id']  = $_SESSION["Project"]["id"];
		}
		return $queryData;
	}    	    
    
    function beforeSave() {

    	/*** set project_id ***/
    	//If field "project_id" exists
    	if ($this->hasField('project_id')) {
    		
    		//get project_id
			$projectId = $_SESSION["Project"]["id"];
			if ($projectId) {
				$this->set(array('project_id' => $projectId));
			}
		}
    	
		/*** set parent_id ***/
		if ($this->data["Wiki"]["parent_id"]==NULL) {
    		$this->data["Wiki"]["parent_id"] = 0;
		}			
		return true;
	}
}
?>