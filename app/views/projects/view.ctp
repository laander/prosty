<?php /***************** PROJECTS **************************/ ?>
<div class="projects view">
<h2><?php  __('Project');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>


<?php /***************** ACTIONS **************************/ ?>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project', true), array('action' => 'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Project', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('action' => 'add')); ?> </li>
	</ul>
</div>


<?php /***************** MILESTONES **************************/ ?>


	<h2><?php __('Milestones');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('project_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('deadline');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($milestones as $milestone):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $milestone['Milestone']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($milestone['User']['username'], array('controller' => 'users', 'action' => 'view', $milestone['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($milestone['Project']['title'], array('controller' => 'projects', 'action' => 'view', $milestone['Project']['id'])); ?>
		</td>
		<td><?php echo $milestone['Milestone']['title']; ?>&nbsp;</td>
		<td><?php echo $milestone['Milestone']['description']; ?>&nbsp;</td>
		<td><?php echo $milestone['Milestone']['deadline']; ?>&nbsp;</td>
		<td><?php echo $milestone['Milestone']['status']; ?>&nbsp;</td>
		<td><?php echo $milestone['Milestone']['created']; ?>&nbsp;</td>
		<td><?php echo $milestone['Milestone']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('controller'=>'milestones','action' => 'view', $milestone['Milestone']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('controller'=>'milestones','action' => 'edit', $milestone['Milestone']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('controller'=>'milestones','action' => 'delete', $milestone['Milestone']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $milestone['Milestone']['id'])); ?>
		</td>
	</tr>
	
<?php /***************** TASKS **************************/ ?>	
		<?php foreach ($milestone["Task"] as $task): ?>
		
		<tr><td>TASK</td><td><?php echo $task["title"] ?></td><td><?php echo $task["description"] ?></td><td><?php echo $task["score"] ?></td></tr>
		
		<?php endforeach; ?>	
		<tr><td>&nbsp;</td></tr>
<?php endforeach; ?>
	</table>