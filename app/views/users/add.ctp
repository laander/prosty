<div class="box-full">
	<p class="box-title">New User</p>
	<div class="box-content">
		<div class="users form">
		<?php echo $this->Form->create('User');?>
			<fieldset>
			<?php
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