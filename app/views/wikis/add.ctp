<?php 
echo $this->Javascript->link("/js/tiny_mce/tiny_mce.js", false);
echo $this->Javascript->link("/js/tiny_mce_invoke.js", false);
?>

<div class="wikis form">
<?php echo $this->Form->create('Wiki');?>
	<fieldset>
 		<legend><?php __('Add Wiki'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');		
		echo $this->Form->input('body', array("class"=>"tinymce"));		
		echo $this->Form->input('parent_id', array('empty'=> 'Root'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Wikis', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wikis', true), array('controller' => 'wikis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent', true), array('controller' => 'wikis', 'action' => 'add')); ?> </li>
	</ul>
</div>