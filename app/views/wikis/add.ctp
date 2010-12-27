<?php 
echo $this->Javascript->link("/js/tiny_mce/tiny_mce.js", false);
echo $this->Javascript->link("/js/tiny_mce_invoke.js", false);
?>

<div class="wikis form">
<?php echo $this->Form->create('Wiki');?>
	<fieldset>
 		<legend><?php __('Add Wiki'); ?></legend>
	<?php
		if(isset($parents)){
			echo $this->Form->input('parent_id', array('empty'=> 'Root'));
		}else{
			echo $this->Form->hidden('parent_id');		
		}
			
		echo $this->Form->input('title');		
		echo $this->Form->input('body', array("class"=>"tinymce"));		


		


	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>