<?php // Request necessary js logic for modal window and cost-benefit/priority analyzer slider ?>
<?php echo $this->Javascript->link("/js/jqueryui-1.8.7.js", false); ?>
<?php echo $this->Javascript->link("/js/jquery.colorbox-min.js", false); ?>
<?php echo $this->Javascript->link("/js/jquery.jeditable.mini.js", false); ?>

<? /* ?> 	 
<h2><?php  __('Task');?></h2>
Title:
<div class="edit" id="title_<?php echo $task['Task']['id']; ?>"><?php echo $task['Task']['title']; ?></div>
<?php
//title specific options
$options['submitdata'] = array('id'=> $task['Task']['id'], 'field'=>'title');
echo $ajax->editor("title_".$task['Task']['id'], array(), $options);
?>


Description:<div class="edit" id="desc_<?php echo $task['Task']['id']; ?>"><?php echo $task['Task']['description']; ?></div>
<?php
$options['submitdata'] = array('id'=> $task['Task']['id'], 'field'=>'description');
echo $ajax->editor("desc_".$task['Task']['id'], array(),$options);
?>

<input type="hidden" id="foreign_key" value="<?=$task['Task']['id']?>"/>			


<div id="costBenefit" class="ajaxUpdate">	
	<div class="slideContainer">
		<p class="header">Importance of feature</p>
		<p class="slideTags left">Careless</p>
		<div class="slider"></div>
		<p class="slideTags right">Very important</p>
		<?php echo $this->Form->hidden('priority', array('value'=>$task['Task']['priority']));?>
		<div id="priorityCallback" class="callback"></div>		
<? */ ?>

<div class="box-half">
	<p class="box-title">View Task</p>
	<div class="box-meta">
		<?php echo $this->Html->link('Edit Task', array('controller' => 'tasks', 'action' => 'edit',  $task['Task']['id'])); ?>	-
		<?php echo $this->Html->link(__('Delete Task', true), array('action' => 'delete', $task['Task']['id']), null, sprintf(__('Are you sure you want to delete #%s?', true), $task['Task']['id'])); ?>
	</div>
	<div class="box-content">
		<div class="tasks view">
			<input type="hidden" id="foreign_key" value="<?=$task['Task']['id']?>"/>			
			<div class="field text">
				<h2 class="fieldvalue jeditable" id="jedit_title-<?php echo $task['Task']['id']; ?>"><?php echo $task['Task']['title']; ?></h2>
				<?php
					$options['submitdata'] = array('id'=> $task['Task']['id'], 'field'=>'title');
					echo $ajax->editor("jedit_title-".$task['Task']['id'], array(), $options);
				?>
			</div>
			<div class="field textarea">			
				<div class="jeditable" id="jedit_description-<?php echo $task['Task']['id']; ?>"><?php echo $task['Task']['description']; ?></div>
				<?php
					$options['submitdata'] = array('id'=> $task['Task']['id'], 'field'=>'description');
					$options['type'] = 'textarea';
					echo $ajax->editor("jedit_description-".$task['Task']['id'], array(),$options);
				?>
			</div>
			<div class="field customslider">
				<div id="context-tasks-costbenefit" class="ajaxUpdate">
					<div class="slide-wrapper">
						<div class="slide-container">
							<p class="header">Importance of feature</p>
							<div class="slider"></div>
							<p class="slide-tag left">Careless</p>
							<p class="slide-tag right">Very important</p>
							<?php echo $this->Form->hidden('priority', array('value'=>$task['Task']['priority']));?>
						</div>
						<div class="slide-container">
							<p class="header">Difficulty of implementation</p>
							<div class="slider"></div>
							<p class="slide-tag left">Very difficult</p>
							<p class="slide-tag right">Piece of cake</p>
							<?php echo $this->Form->hidden('estimate', array('value'=>$task['Task']['estimate']));?>
						</div>
					</div>			
					<input type="hidden" id="conclusion"/>
					<div class="verdict">
						<div class="task-costbenefit-icon"></div>
						<p id="human-verdict"></p>
					</div>
				</div>
			</div>

			<div class="field select">			
				<span class="label">Assign task to:</span>			
				<?php
					echo $form->create( 'Task' );
					$selected = $task['Task']['assigned_id'];
					$options = array();
					$options[0] = "-"; //remove assigned user
					foreach($task["Milestone"]["Project"]["User"] as $id=>$user){					
						$id = $user["UserProject"]["user_id"];
						$options[$id] = $user["username"];		
					}
					echo $form->select('assigned', array($options), $selected, array('empty' => false)); 
					echo $form->end();
					echo $ajax->observeForm('TaskViewForm', 
					    array(
					        'url' => array( 'action' => 'ajaxSetAsAssigned', $task['Task']['id']),
							'complete' =>	'updateFlashMessage();'        
				    	)); 
				?>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="box-half">
	<p class="box-title">Comments</p>
	<div class="box-content">
		<?php //echo $this->requestAction(array('plugin'=>'comments', 'controller' => 'comments', 'action' => "index"), array('return')); ?>
		<?php echo $this->requestAction("/comments/comments/index/Task/" . $task['Task']['id'], array('return')); ?>
		<div class="clearfix"></div>	
	</div>
</div>
