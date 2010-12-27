<h2><?php __('Milestones');?></h2>
<?php
foreach ($milestones as $milestone):
		$footer = $this->Html->link('Add Task', array('controller' => 'tasks', 'action' => 'add', $milestone['Milestone']['id']), array('class'=> 'left')); 
		echo $this->element('milestoneWithTasks', array("milestone" => $milestone, "header"=>"", "footer"=>$footer));	
	endforeach; ?>
</table>
<?php echo $this->Html->link(__('New Milestone', true), array('action' => 'add')); ?>


<div class="paging">
	<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $this->Paginator->numbers();?>
|
	<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>
