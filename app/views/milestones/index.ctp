<?php // Request necessary js logic for inline editing using jEditable ?>
<?php echo $this->Javascript->link("jquery.jeditable.mini.js", false); ?>
<?php echo $this->Javascript->link("jquery.scrollTo-1.4.2-min.js", false); ?>
<?php echo $this->Javascript->link("jquery.localscroll-1.2.7-min.js", false); ?>
<script type="text/javascript">
<!--
jQuery(document).ready(function($) {
	$.localScroll.hash({reset: true});
});
//-->
</script>

<?php // Creates a compact table with current tasks in the milestone, using handy/nifty ajax buttons ?>
<?php foreach ($milestones as $milestone): ?>
<div class="box-full">
	<p class="box-title">Milestone</p>
	<div class="box-meta">
		<?php if (is_array($milestone)): ?>
			<?php echo $this->Html->link('Add Task', array('controller' => 'tasks', 'action' => 'add',  $milestone['Milestone']['id']), array('class'=> 'tasks-quickadd', 'rel' => $milestone['Milestone']['id'])); ?> -
			<?php echo $this->Html->link('Edit Milestone', array('controller' => 'milestones', 'action' => 'edit',  $milestone['Milestone']['id'])); ?>
		<?php endif; ?>
	</div>	
	<div class="box-content" id="milestone<?php echo $milestone['Milestone']['id'] ?>">
		<div class="milestones view">
			<?php if (is_array($milestone)): ?>
				<div class="field text">
					<h2 class="fieldvalue jeditable" id="jedit_milestone-title-<?php echo $milestone['Milestone']['id']; ?>"><?php echo $milestone['Milestone']['title']; ?></h2>
					<?php
						$options['submitdata'] = array('id'=> $milestone['Milestone']['id'], 'field'=>'title');
						echo $ajax->editor("jedit_milestone-title-".$milestone['Milestone']['id'], array('controller' => 'milestones', 'action' => 'ajaxjedit'), $options);
					?>				
				</div>
				<div class="field textarea">
					<span class="label">Description:</span>				
					<p class="fieldvalue jeditable" id="jedit_milestone-description-<?php echo $milestone['Milestone']['id']; ?>"><?php echo $milestone['Milestone']['description']; ?></p>
					<?php
						$options['submitdata'] = array('id'=> $milestone['Milestone']['id'], 'field'=>'description');
						$options['type'] = 'textarea';
						echo $ajax->editor("jedit_milestone-description-".$milestone['Milestone']['id'], array('controller' => 'milestones', 'action' => 'ajaxjedit'), $options);
					?>				
				</div>
				<div class="field textarea">
					<span class="label">Deadline:</span>
					<p class="fieldvalue jeditable" id="jedit_milestone-deadline-<?php echo $milestone['Milestone']['id']; ?>"><?php echo $milestone['Milestone']['deadline']; ?></p>
					<?php
						$options['submitdata'] = array('id'=> $milestone['Milestone']['id'], 'field'=>'deadline');
						$options['type'] = 'text';
						echo $ajax->editor("jedit_milestone-deadline-".$milestone['Milestone']['id'], array('controller' => 'milestones', 'action' => 'ajaxjedit'), $options);
					?>				
				</div>
				<div class="field textarea">
					<span class="label">Status:</span>
					<p class="fieldvalue jeditable" id="jedit_milestone-status-<?php echo $milestone['Milestone']['id']; ?>"><?php echo $milestone['Milestone']['status']; ?></p>
					<?php
						$options['submitdata'] = array('id'=> $milestone['Milestone']['id'], 'field'=>'status');
						$options['type'] = 'text';
						echo $ajax->editor("jedit_milestone-status-".$milestone['Milestone']['id'], array('controller' => 'milestones', 'action' => 'ajaxjedit'), $options);
					?>				
				</div>				
				<table class="context-table-tasks">
					<?php if (isset($milestone['Task'][0])): ?>
						<?php foreach ($milestone['Task'] as $task): ?>
							<tr>
								<td class="<?php if ($task['status'] == 1) { echo "task-complete"; } ?>">
									<span class="task-costbenefit-icon">
										<?php echo $task['estimate'] * $task['priority']; ?>
									</span>
									<?php echo $this->Html->link($task['title'], array('controller' => 'tasks', 'action' => 'view', $task['id']), array('class' => 'title')); ?>						
									<div class="actions">							
										<?php							
											if ($task['assigned_id'] == 0) {
												echo $html->link(
													$html->image('basic-icons/plus_16.png', array('alt' => 'Become responsible')),
													array('controller' => 'tasks', 'action' => 'ajaxSetAsAssigned', $task['id']), 
													array('class' => 'task-assigned', 'escape' => false));										
											} else {
												echo $this->element('users_profilelink', array('user' => $task["Assigned"]));
											} 	
										?>							
										</span>
									<?php							
										echo $html->link(
											$html->image('basic-icons/tick_16.png', array('alt' => 'Change status')),
											array('controller' => 'tasks', 'action' => 'ajaxToggleStatus', $task['id']), 
											array('class' => 'task-status', 'escape' => false));
									?>
									<?php
										echo $this->Html->link(
											$html->image('basic-icons/delete_16.png', array('alt' => 'Delete task')),
											array('controller' => 'tasks', 'action' => 'delete', $task['id']), array('escape' => false), 
											sprintf(__('Are you sure you want to delete #%s?', true), $task['id']));
									?>
									</div>															
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr><td><span>No tasks in milestone. Add a new!</span></td></tr>
					<?php endif; ?>
				</table>		
			<?php else: ?>
			 	<span>No upcoming milestone. Create a new one!</span>
			<?php endif; ?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>
<?php endforeach; ?>
<?php echo $this->Html->link('New Milestone', array('controller' => 'milestones', 'action' => 'add')); ?>
<?php echo $this->element('tasks_quickadd');?>