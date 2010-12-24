<div id="upcoming_milestone">

	<div class="milestone">
		<h2><?php echo $milestone['Milestone']['title']; ?></h2>
		<p class="description"><?php echo $milestone['Milestone']['description']; ?></p>
		Deadline: <?php echo $time->timeAgoInWords($milestone['Milestone']['deadline']); ?>
	</div>
			
	<div class="tasks">
		<?php foreach ($milestone['Task'] as $task):	?>
				<p class="task<?php echo $task['status_text']; ?>"><?php echo $this->Html->link($task['title'], array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?></p>
		<?php endforeach; ?>
		<p class="bottom_menu">
		<?php echo $this->Html->link('Add Task', array('controller' => 'tasks', 'action' => 'add')); ?> 
		<?php echo $this->Html->link('All Milestones', array('controller' => 'milestones', 'action' => 'index')); ?>
		</p>		
	</div>
</div>
<?php

/*
				<td><?php echo $task['description'];?></td>
				<td><?php echo $task['status'];?></td>
				<td><?php echo $task['score'];?></td>
				*/
				?>
