<div class="box-full">
	<p class="box-title">New Task</p>
	<div class="box-content">
		<div class="tasks form">
		<?php echo $this->Form->create('Task');?>
			<fieldset>
			<?php	
				echo $this->Form->input('milestone_id');
				echo $this->Form->input('title');
				echo $this->Form->input('description');
				echo $this->Form->input('estimate');
				echo $this->Form->input('priority');
				echo $this->Form->input('user', array('label' => 'Assigned to'));
				echo $this->Form->input('status');				
			?>
			</fieldset>
		<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>