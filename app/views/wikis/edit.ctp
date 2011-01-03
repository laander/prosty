<?php // Request tiny MCE for nice editing ?>
<?php
	echo $this->Javascript->link("/js/tiny_mce/tiny_mce.js", false);
?>

<div class="box-full">
	<p class="box-title">Edit Wiki</p>
	<div class="box-meta">
		<?php echo $this->Html->link(__('Delete Wiki', true), array('action' => 'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete #%s?', true), $this->Form->value('User.id'))); ?>
	</div>
	<div class="box-content">
		<div class="wikis form">
		<?php echo $this->Form->create('Wiki');?>
			<fieldset>
			<?php
				echo $this->Form->input('id');	
				echo $this->Form->input('title');
				echo $this->Form->input('parent_id', array('empty'=> 'Root'));				
			?>
				<div class="tinymce-wrapper">
				<?php
					echo $this->Form->input('body', array('class' => 'tinymce-editor'));
				?>
				</div>
			</fieldset>
		<?php echo $this->Form->end(__('Save', true));?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>