<?php echo $this->Html->css('jqueryui.css'); ?>
<?php echo $this->Html->css('costBenefit.css'); ?>
<?php echo $this->Javascript->link("costBenefit.js", false); ?>
<?php echo $this->Javascript->link("jqueryui-1.8.7.js", false); ?>
<?php echo $this->Html->script('jquery.jeditable.mini.js', false); ?>

<div class="tasks view">
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
	</div>
	

	<div class="slideContainer">
		<p class="header">Difficulty of implementation</p>
		<p class="slideTags left">Very difficult</p>
		<div class="slider"></div>
		<p class="slideTags right">Piece of cake</p>
		<?php echo $this->Form->hidden('estimate', array('value'=>$task['Task']['estimate']));?>
		<div id="estimateCallback" class="callback"></div>
	</div>
	<p id="humanScore"></p>
</div>

<?php //echo $this->requestAction(array('plugin'=>'comments', 'controller' => 'comments', 'action' => "index"), array('return')); ?>
<?php echo $this->requestAction("/comments/comments/index/Task/".$task['Task']['id'], array('return')); ?>
