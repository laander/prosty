<div class="box-full">
	<p class="box-title">Edit Milestone</p>
	<div class="box-meta">
		<?php echo $this->Html->link(__('Delete Milestone', true), array('action' => 'delete', $this->Form->value('Milestone.id')), null, sprintf(__('Are you sure you want to delete #%s?', true), $this->Form->value('Milestone.id'))); ?>
	</div>	
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
			<?php echo $this->Form->end(__('Save', true));?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>