<?php // Request necessary js logic for inline editing using jEditable ?>
<?php echo $this->Javascript->link("/js/jquery.jeditable.mini.js", false); ?>

<?php // Creates a compact table with current tasks in the milestone, using handy/nifty ajax buttons ?>
<div class="box-half">
	<p class="box-title">
		<?php 
		if (isset($box_title)) { 
			echo $box_title;
		} else { 
			echo "Deadline"; 
		} ?>
	</p>
	<div class="box-meta">
		<?php if (is_array($milestone)) { ?>
			<?php echo $this->Html->link('New Task', array('controller' => 'tasks', 'action' => 'add',  $milestone['Milestone']['id']), array('class'=> 'tasks-quickadd', 'rel' => $milestone['Milestone']['id'])); ?>
		<?php } else { ?>
			<?php echo $this->Html->link('New Milestone', array('controller' => 'milestones', 'action' => 'add',  $milestone['Milestone']['id'])); ?>
		<?php } ?>
	</div>	
	<div class="box-content">
		<div class="milestones view">
			<?php if (is_array($milestone)): ?>
				<div class="field textarea" style="float: right;">
					<p class="fieldvalue"><?php echo $milestone['Milestone']['deadline']; ?></p>
				</div>			
				<div class="field text">
					<h2 class="fieldvalue jeditable" id="jedit_milestone-title-<?php echo $milestone['Milestone']['id']; ?>"><?php echo $milestone['Milestone']['title']; ?></h2>
					<?php
						$options['submitdata'] = array('id'=> $milestone['Milestone']['id'], 'field'=>'title');
						echo $ajax->editor("jedit_milestone-title-".$milestone['Milestone']['id'], array('controller' => 'milestones', 'action' => 'ajaxjedit'), $options);
					?>				
				</div>
				<div class="field text">
					<p class="fieldvalue jeditable" id="jedit_milestone-description-<?php echo $milestone['Milestone']['id']; ?>"><?php echo $milestone['Milestone']['description']; ?></p>
					<?php
						$options['submitdata'] = array('id'=> $milestone['Milestone']['id'], 'field'=>'description');
						$options['type'] = 'textarea';
						echo $ajax->editor("jedit_milestone-description-".$milestone['Milestone']['id'], array('controller' => 'milestones', 'action' => 'ajaxjedit'), $options);
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
								<?php echo $this->Html->link($task['title'], array('controller' => 'tasks', 'action' => 'view', $task['id']), array("class" => "title")); ?>						
								<div class="actions">							
									<?php							
										if ($task['assigned_id'] == 0) {
										echo $html->link(
											$html->image('basic-icons/plus_16.png', array('alt' => 'Change status')),
											array('controller' => 'tasks', 'action' => 'ajaxSetAsAssigned', $task['id']), 
											array('class' => "task-assigned", 'escape' => false));										
										} else {
											echo $this->element('users_profilelink', array('user' => $task["User"]));
										} 	
									?>							
									</span>
								<?php							
									echo $html->link(
										$html->image('basic-icons/tick_16.png', array('alt' => 'Change status')),
										array('controller' => 'tasks', 'action' => 'ajaxToggleStatus', $task['id']), 
										array('class' => "task-status", 'escape' => false));
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