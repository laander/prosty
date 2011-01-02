<div class="box-full">
	<p class="box-title">Projects</p>
	<div class="box-content">
		<div class="projects index">
			<table>
				<tr>
					<th>Title</th>
					<th>Milestones</th>
					<th>Wikis</th>
					<th>Actions</th>									
				</tr>
			<?php foreach($allProjects as $project): ?>
				<tr>
					<td><?php echo $this->Html->link($project['Project']['title'], array('action' => 'view', $project['Project']['id'])); ?></td>
					<td><?php echo count($project['Milestone']); ?> Milestones</td>
					<td><?php echo count($project['Wiki']); ?> Wikis</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $project['Project']['id'])); ?>
						<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?>
					</td>					
				</tr>
			<?php endforeach; ?>
			</table>
			<?php echo $this->Html->link('New Project', array('action' => 'add')); ?>
			<div class="clearfix"></div>
		</div>								
	</div>
</div>