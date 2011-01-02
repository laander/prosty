<div class="box-full">
	<p class="box-title">Edit Role</p>
	<div class="box-meta">
		<?php echo $this->Html->link(__('Delete Role', true), array('action' => 'delete', $this->Form->value('Role.id')), null, sprintf(__('Are you sure you want to delete #%s?', true), $this->Form->value('Role.id'))); ?>
	</div>	
	<div class="box-content">
		<div class="roles form">
			<?php echo $this->Form->create('Role');?>
			<fieldset>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title');
			?>
			</fieldset>
			<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="actions">
			<h3><?php __('Actions'); ?></h3>
			<ul>
				<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Role.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Role.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List Roles', true), array('action' => 'index'));?></li>
			</ul>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>