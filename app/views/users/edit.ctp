<div class="box-full">
	<p class="box-title">Edit User</p>
	<div class="box-meta">
		<?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete #%s?', true), $this->Form->value('User.id'))); ?>
	</div>		
	<div class="box-content">
		<div class="users form">
		<?php echo $this->Form->create('User');?>
			<fieldset>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('username');
				echo $this->Form->input('password');
				echo $this->Form->input('role_id');
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>