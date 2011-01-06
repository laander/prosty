<?php

class RecententriesComponent extends Object {
 	var $name = 'Recententries'; // the name of your component
    var $components = array('Session'); // the other component your component uses
    
    var $currentUserId;
	
    function initialize(&$controller) {    	    	    	
    	$this->currentUserId = $controller->currentUser('id');    	
    }       
    
    function getLastLogin(){
    	//get last login - this is only set once per session
    	if(!$this->Session->read('User.last_login')){			 
	        $this->setLastLogin();	        
		}
		return $this->Session->read('User.last_login');
    }
    
    function setLastLogin(){    	
	        $userModel =& ClassRegistry::init("User");
	        $user = $userModel->read('last_login', $this->currentUserId);
	        
	        //get last login from database and write to session
	        $last_login = $user["User"]["last_login"];    	
	        $this->Session->write('User.last_login', $last_login);

	        //set current timestamp as last login (but don't use this timestamp for this session) 
			$userModel->saveField('last_login', date(DATE_ATOM));
    }
    
	function entries(){			 		
						
		//models to retrieve notifications for
		$models = array("Milestone", "Task", "Wiki");
		$recent_entries = array();
        foreach($models as $model){
        	$loadedModel =& ClassRegistry::init($model);
			//$this->loadModel($model);
			
			//get modified rows
			$modified = $loadedModel->find('all', array(			
					'conditions'=>array($model.'.modified_by <>' => $this->currentUserId),		
					'limit'=>10			
				)			
			);		

			foreach($modified as $i=>$data){								
				$modified[$i]["state"] = $data[$model]["created"]==$data[$model]["modified"] ? "created" : "modified"; //determine if the entry was created or just modified
				$modified[$i]["date"] = $this->convert_datetime($data[$model]["modified"]); //add date field
				
				if($data[$model]["modified"] > $this->getLastLogin() && $modified[$i]["date"]>$this->Session->read('Notification.'.$model.$data[$model]["id"])){
					$modified[$i]["notification"] = true;					
				}else{
					$modified[$i]["notification"] = false;	
				}
												
				$modified[$i]["model"] = $model; //add model field			
				$recent_entries[] = $modified[$i]; //add entry to recent_entries array
			}			
        }

        //sort entries by date
        function sortByDate($b, $a) {
		    return $a['date'] - $b['date'];
		}		
		usort($recent_entries, 'sortByDate');
		$recent_entries = array_slice($recent_entries, 0, 20); //limit to 20 entries
		return $recent_entries;        
	}
	
	/*turn a mysql datetime (YYYY-MM-DD HH:MM:SS) into a unix timestamp*/  
	function convert_datetime($str) { 	
	    list($date, $time) = explode(' ', $str); 
	    list($year, $month, $day) = explode('-', $date); 
	    list($hour, $minute, $second) = explode(':', $time); 
	     
	    $timestamp = mktime($hour, $minute, $second, $month, $day, $year); 	     
	    return $timestamp; 
	} 		
}
?>