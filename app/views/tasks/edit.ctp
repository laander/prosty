<?php // Request necessary js logic for cost-benefit/priority analyzer slider ?>
<?php echo $this->Javascript->link("/js/jqueryui-1.8.7.js", false); ?>

<div class="box-full">
	<p class="box-title">Edit Task</p>
	<div class="box-meta">
		<?php echo $this->Html->link(__('Delete Task', true), array('action' => 'delete', $this->Form->value('Task.id')), null, sprintf(__('Are you sure you want to delete #%s?', true), $this->Form->value('Task.id'))); ?>
	</div>	
	<div class="box-content">
		<div class="tasks form">
		<?php echo $this->Form->create('Task');?>
			<fieldset>
			<?php
				echo $this->Form->hidden('id');
				echo $this->Form->input('title');
				echo $this->Form->input('milestone_id');
				echo $this->Form->input('description');
				echo $this->Form->input('user', array('label' => 'Assigned to'));
				echo $this->Form->input('status');				
			?>
			<div class="field customslider">
				<div id="context-tasks-costbenefit">
					<div class="slide-wrapper">
						<div class="slide-container">
							<p class="header">Importance of feature</p>
							<div class="slider"></div>
							<p class="slide-tag left">Careless</p>
							<p class="slide-tag right">Very important</p>
							<?php echo $this->Form->hidden('priority');?>
							<div id="priorityCallback" class="callback"></div>		
						</div>
						<div class="slide-container">
							<p class="header">Difficulty of implementation</p>
							<div class="slider"></div>
							<p class="slide-tag left">Very difficult</p>
							<p class="slide-tag right">Piece of cake</p>
							<?php echo $this->Form->hidden('estimate');?>
							<div id="estimateCallback" class="callback"></div>
						</div>
					</div>			
					<input type="hidden" id="conclusion"/>
					<div class="verdict">
						<div class="task-costbenefit-icon"></div>
						<p id="human-verdict"></p>
					</div>
				</div>
			</div>			
			</fieldset>
		<?php echo $this->Form->end(__('Save', true));?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>