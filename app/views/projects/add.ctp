<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
 		<legend><?php __('Add Project'); ?></legend>
	<?php
		echo $this->Form->input('Project.title');
		echo $this->Form->input('Project.description');		
	    echo $this->Form->input('UserProject.user_id', array('label' => 'Add users to project', 'multiple' => 'checkbox' )); //'type' => 'select', according to manual but seems counter intuitive!		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
	</ul>
</div>