<?php
$divId = "comment_add_".$_model."_".$_foreignKey;
$session->flash();
?>

<div class="comments form">
 <?php echo $form->create('Comment', array("type"=>"post", "action"=>"add", 'class'=>'js-ajax'));?>
	<fieldset>
 		<legend><?php __('Add Comment');?></legend>
	<?php
		echo $form->input('model', array('type' => 'hidden', "value"=>$_model));
		echo $form->input('foreign_key', array('type' => 'hidden', "value"=>$_foreignKey));
		echo $form->input('comment');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<?php echo $html->link('Demo', array('controller'=>'comments','action'=>'add',$_foreignKey), array('class'=>'js-ajax')); ?>

