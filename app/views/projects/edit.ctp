<div class="box-full">
	<p class="box-title">Edit Project</p>
	<div class="box-meta">
		<?php echo $this->Html->link(__('Delete Project', true), array('action' => 'delete', $this->Form->value('Project.id')), null, sprintf(__('Are you sure you want to delete #%s?', true), $this->Form->value('Project.id'))); ?>
	</div>
	<div class="box-content">
		<div class="projects form">
			<?php echo $this->Form->create('Project');?>
			<fieldset>
			<?php
				echo $this->Form->hidden('id');
				echo $this->Form->input('title');
				echo $this->Form->input('description');
				echo $this->Form->input('siteurl');
				echo $this->Form->input('github');				
				// output all the checkboxes at once
				echo $form->input('User',array(
					'label' => __('Users',true),
					'type' => 'select',
					'multiple' => 'checkbox',
					'options' => $users,
					'selected' => $html->value('User.User'),
				)); ?>
			</fieldset>
			<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>


