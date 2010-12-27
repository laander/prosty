<div class="tasks form">
<?php echo $this->Form->create('Task');?>
	<fieldset>
 		<legend><?php __('Add Task'); ?></legend>
	<?php	
		echo $this->Form->hidden('milestone_id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('estimate');
		echo $this->Form->input('priority');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>