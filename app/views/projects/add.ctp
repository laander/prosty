<div class="box-full">
	<p class="box-title">New Project</p>
	<div class="box-content">
		<div class="projects form">
			<?php echo $this->Form->create('Project');?>
			<fieldset>
			<?php
				echo $this->Form->input('Project.title');
				echo $this->Form->input('Project.description');		
				echo $form->input('User',array(
					'label' => __('Users',true),
					'type' => 'select',
					'multiple' => 'checkbox',
					'options' => $users));
			?>
			</fieldset>
			<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>


