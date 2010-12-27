<?php
$left = $left==0 ? "" : $this->Html->link('Add Task', array('controller' => 'tasks', 'action' => 'add',  $milestone['Milestone']['id']), array('class'=> 'left addTaskLink', 'rel'=>$milestone['Milestone']['id']));
$right = $right==0 ? "" : $this->Html->link('All Milestones', array('controller' => 'milestones', 'action' => 'index'), array('class'=> 'right'));
?>
<?php echo $this->Javascript->link("/js/jquery.colorbox-min.js", false); ?>

<div class="dashboard milestone">
	<div class="header"><h2><?php echo $header . $milestone['Milestone']['title']; ?></h2></div>	
	<?php if(is_array($milestone)): ?>	
		<div class="milestoneDescription">		
			<p class="description"><?php echo $milestone['Milestone']['description']; ?></p>
			Deadline: <?php echo $time->timeAgoInWords($milestone['Milestone']['deadline']); ?><br/>
			<?php echo $this->Html->link('Edit milestone', array('controller' => 'milestones', 'action' => 'edit', $milestone['Milestone']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $milestone['Milestone']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $milestone['Milestone']['id'])); ?>
		</div>
		
		<h3>Tasks:</h3>		
		<div class="tasks">
			<?php foreach ($milestone['Task'] as $task):	?>
					<p class="task<?php echo $task['status_text']; ?>">
						<?php echo $this->Html->link($task['title'], array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?>						
						<?php
							echo $html->image('checkmark.png', array(
								'alt' => 'Change status',
								'url' => array('controller' => 'tasks', 'action' => 'toggleStatus', $task['id']),
								'class'=>'toggleStatus'
								)
							); 	
						?>					
					</p>
			<?php endforeach; ?>
		</div>		
	<?php else: ?>
	 No milestone has been scheduled
	<?php endif; ?>	
	<div class="footer">
		<?php echo $left.$right; ?>
		<div class="clear"></div>		
	</div>		
</div>