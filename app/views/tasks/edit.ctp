<div class="tasks form">
<?php echo $this->Form->create('Task');?>
	<fieldset>
 		<legend><?php __('Edit Task'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('milestone_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('status');
		echo $this->Form->input('estimate');
		echo $this->Form->input('priority');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Task.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Task.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Milestones', true), array('controller' => 'milestones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Milestone', true), array('controller' => 'milestones', 'action' => 'add')); ?> </li>
	</ul>
</div>