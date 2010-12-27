<?php

class Task extends AppModel {
    var $name = 'Task';    
       
    var $belongsTo = array(
    	'User' =>array(
    		'className' => 'User',
    		'foreignKey' => 'created_by'    	
    	),
    	'Milestone' => array(
    		'className' => 'Milestone',
    		'foreignKey' => 'milestone_id'
    	)
    );     
        
    function afterFind($results){
    	  foreach ($results as $id => $val) {
    	  	
    	  	if(isset($val["Task"]) && isset($results[$id]["Task"]["status"]) && isset($val["Task"]["estimate"]) && isset($val["Task"]["priority"])){    	  		
		        //human readable status    	  		
    	  		$results[$id]["Task"]["status_text"] = $val["Task"]["status"]==0 ? "Pending" : "Done";    	  		    	  	
    	  		
                //calculate cost/benefit score
    	  		$results[$id]["Task"]["score"] = pow($val["Task"]["estimate"], -1)*$val["Task"]["priority"];
    	  	}
    	  }
    	return $results;
    }
}

?>