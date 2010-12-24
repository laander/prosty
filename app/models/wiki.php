<?php
class Wiki extends AppModel {
	var $name = 'Wiki';
	var $displayField = 'title';
	
    var $belongsTo = array(
    	'User' =>array(
    		'className' => 'User',
    		'foreignKey' => 'user_id'    	
    	),
    	'Parent' =>array(
    		'className' => 'Wiki',
    		'foreignKey' => 'parent_id'    	
    	)    	
    );  

    function beforeSave() {
    	
		if ($this->data["Wiki"]["parent_id"]==NULL) {
    		$this->data["Wiki"]["parent_id"] = 0;
		}
		return true;
	}

    	
}
?>