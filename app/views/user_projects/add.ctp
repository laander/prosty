<div class="box-full">
	<p class="box-title">New User Project</p>
	<div class="box-content">
		<div class="userProjects form">
		<?php echo $this->Form->create('UserProject');?>
			<fieldset>
			<?php
				echo $this->Form->input('user_id');
				echo $this->Form->input('project_id');
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="actions">
			<h3><?php __('Actions'); ?></h3>
			<ul>
		
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
