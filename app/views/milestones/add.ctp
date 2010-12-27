<div class="milestones form">
<?php echo $this->Form->create('Milestone');?>
	<fieldset>
 		<legend><?php __('Add Milestone'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('deadline');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>