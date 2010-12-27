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
					<p class="task<?php echo $task['status_text']; ?>"><?php echo $this->Html->link($task['title'], array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?></p>
			<?php endforeach; ?>
		</div>		
	<?php else: ?>
	 No milestone has been scheduled
	<?php endif; ?>	
	<div class="footer">
		<?php echo $footer; ?>
		<div class="clear"></div>		
	</div>		
</div>