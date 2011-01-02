<div class="box-full">
	<p class="box-title">New Milestone</p>
	<div class="box-content">
		<div class="milestones form">
			<?php echo $this->Form->create('Milestone');?>
			<fieldset>
			<?php
				echo $this->Form->input('title');
				echo $this->Form->input('description');
				echo $this->Form->input('deadline');
				echo $this->Form->input('status');				
			?>
			</fieldset>
			<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>