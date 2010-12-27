<h2><?php __('Milestones');?></h2>
<?php
foreach ($milestones as $milestone): 
	echo $this->element('milestoneWithTasks', array("milestone" => $milestone, "header"=>"", "left"=>1, "right"=>0));	
endforeach; ?>
<?php echo $this->element('addTaskWindow');?>
</table>
<?php echo $this->Html->link(__('New Milestone', true), array('action' => 'add')); ?>

<div class="paging">
	<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
|
	<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>
