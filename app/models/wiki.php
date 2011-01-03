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
		$queryData['conditions'][$this->alias . '.project_id'] = $this->requestAction('wikis/currentproject/id');
		return $queryData;
	}
}
?>