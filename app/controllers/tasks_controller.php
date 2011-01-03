<?php
class TasksController extends AppController {
	var $components = array('Session', 'RequestHandler');
	var $helpers = array ('Html','Form','Ajax','Javascript');
	var $name = 'Tasks';
	var $belongsTo = array(    
		'Assigned' => array(
			'className' => 'User',
			'foreignKey' => 'assigned_id'
			)		
		);
	
	//var $scaffold;
	
	function view($id=null) {		
				$task = $this->Task->find('first',array(
					'conditions' => array('Task.id' => $id),
					'recursive' => 4,
					'contain' => array('Milestone.Project.UserProject.User.username')
					
				));				
				$this->set('task', $task);
	}	
	
	function toggleStatus($task_id=null) {
		//set id
		$this->data["Task"]["id"] = $task_id;
		
		//get current status
		$old_status = $this->Task->findAllById($task_id, array('fields'=>'Task.status'));
		$old_status = $old_status["Task"]["status"];
		
		//toggle status
		$this->data["Task"]["status"] = $old_status==0 ? 1 : 0;		
				
		$this->Task->save($this->data);
		die("s".$this->data["Task"]["status"]);						
	}	

	function setAssignee($task_id=null) {			
				
		if($this->params['isAjax']){
			//set id
			$this->data["Task"]["id"] = $task_id;		

			//if no assigned_id is supplied, assign to current user
			 
			if(!$this->data["Task"]["assigned"]){
				//get userid
				$user = $this->Auth->user();
		
				//set assigned_id to user_id
				$this->data["Task"]["assigned_id"] = $user["User"]["id"];		
			}else{
				$this->data["Task"]["assigned_id"] = $this->data["Task"]["assigned"];
			}
			//save
			$this->Task->save($this->data);	
			$this->Session->setFlash('The assigner was updated');
			echo"
				
					$.get('/projects/ajaxflash', function(response){
						$('#errorMsg').hide();
						$('#errorMsg').html(response).fadeIn('slow').delay(2000).fadeOut();
					});";
			
			die();
		}
		//if not ajax: redirect to frontpage
		$this->redirect(array('controller' => 'projects', 'action' => 'dashboard'));					
	}
	
	function add($milestone_id = null) {
		//data has been posted
		if (!empty($this->data)) {														
			if ($this->Task->save($this->data)) {
				$this->Session->setFlash(__('The task has been saved', true));
				$this->redirect(array('controller'=>'projects','action' => 'dashboard'));
			} else {
				$this->Session->setFlash(__('The task could not be saved. Please, try again.', true));
			}			
		//no data has been posted yet	
		}else{
			$this->set("milestone_id", $milestone_id);
		}
	}	
	
	/*** edit ***/	
	public function inlineEdit()
	{			
		if($this->params['isAjax']){
						
			$field = $this->params['form']['field'];
			$id = $this->params['form']['id'];
			$value = $this->params['form']['value'];			
			
			$this->data["Task"]["id"] = $id;
        	$this->data["Task"][$field] = $value;
        	
			if ($this->Task->save($this->data) && $this->Task->hasField($field)) {
				if(isset($this->params['form']['callbackText'])){
					$this->Session->setFlash('The form was saved!');
					//echo $this->params['form']['callbackText'];								
				}else{
					echo $value;
				}
				
				echo "
					<script>
					$.get('/projects/ajaxflash', function(response){
						$('#errorMsg').hide();
						$('#errorMsg').html(response).fadeIn('slow').delay(2000).fadeOut();
					});
					</script>";
			} else {
	        	echo "Something went wrong!";
			}
			die();			
		}		
	}

	
	public function removeAssignee($task_id){			
		if($this->params['isAjax'] && $task_id!=null){								
			$this->data["Task"]["id"] = $task_id; //set task id
			$this->data["Task"]["assigned_id"] = 0; //remove assigned user		
			$this->Task->save($this->data); //save			
		}		
	}
		
}
?>