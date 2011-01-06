<?php
class Wiki extends AppModel {
	var $name = 'Wiki';
	
    var $belongsTo = array(    
    	'Parent' =>array(
    		'className' => 'Wiki',
    		'foreignKey' => 'parent_id'
    	)    	
    );
    
    function beforeSave() {
    	
		// Set correct parent id if root
		if ($this->data["Wiki"]["parent_id"] == null) {
    		$this->data["Wiki"]["parent_id"] = 0;
		}			
		return true;
	}

	function beforeFind($queryData){	
		// Only fetch wikis for the project currently being viewed. Use alias for use with Parent model call
		
		$new_condition = is_array($queryData['conditions']) ? $queryData['conditions'] : array(); 		
		$default_conditions = 
		array( "OR" => array (
			$this->alias . '.project_id' => $this->requestAction('wikis/currentproject/id'),
			$this->alias . '.public' => true
		    )
		); 
		
		
		$queryData['conditions'] = array_merge($default_conditions, $new_condition);
		return $queryData;
	}
}
?>