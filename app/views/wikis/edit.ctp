<?php 
echo $this->Javascript->link("/js/tiny_mce/tiny_mce.js", false);
echo $this->Javascript->link("/js/tiny_mce_invoke.js", false);
?>

<div class="wikis form">
<?php echo $this->Form->create('Wiki');?>
	<fieldset>
 		<legend><?php __('Edit Wiki'); ?></legend>
	<?php
		echo $this->Form->input('id');	
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('parent_id', array('empty'=> 'Root'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>