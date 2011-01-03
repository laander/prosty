<div class="box-full">
	<p class="box-title">Edit User Project</p>
	<div class="box-content">
		<div class="userProjects form">
		<?php echo $this->Form->create('UserProject');?>
			<fieldset>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('user_id');
				echo $this->Form->input('project_id');
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="actions">
			<h3><?php __('Actions'); ?></h3>
			<ul>
		
				<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('UserProject.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('UserProject.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List User Projects', true), array('action' => 'index'));?></li>
				<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
			</ul>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>