<?php // Request tiny MCE for nice editing ?>
<?php
	echo $this->Javascript->link("/js/tiny_mce/tiny_mce.js", false);
	echo $this->Javascript->link("/js/tiny_mce_invoke.js", false);
?>

<div class="box-full">
	<p class="box-title">New Wiki</p>
	<div class="box-content">
		<div class="wikis form">
		<?php echo $this->Form->create('Wiki');?>
			<fieldset>
			<?php
				if(isset($parents)){
					echo $this->Form->input('parent_id', array('empty'=> 'Root'));
				}else{
					echo $this->Form->hidden('parent_id');		
				}	
				echo $this->Form->input('title'); ?>
				<div class="tinymce-wrapper">
					<?php echo $this->Form->input('body', array("class"=>"tinymce-editor")); ?>
				</div>
			</fieldset>
			<?php echo $this->Form->input('public', array(
					'options'=>array('No', 'Yes')
				)
			); ?>
		<?php echo $this->Form->end(__('Submit', true));?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>