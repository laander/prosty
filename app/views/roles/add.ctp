<div class="box-full">
	<p class="box-title">New Role</p>
	<div class="box-content">
		<div class="roles form">
			<?php echo $this->Form->create('Role');?>
			<fieldset>
			<?php
				echo $this->Form->input('title');
			?>
			</fieldset>
			<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="actions">
			<h3><?php __('Actions'); ?></h3>
			<ul>
		
				<li><?php echo $this->Html->link(__('List Roles', true), array('action' => 'index'));?></li>
			</ul>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>