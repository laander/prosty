<?php // Request necessary js logic for inline editing using jEditable ?>
<?php echo $this->Javascript->link("/js/jquery.jeditable.mini.js", false); ?>

<?php // Project Details box ?>
<div class="context-project-details box-half">
	<p class="box-title">Project Details</p>
	<p class="box-meta">
		<?php echo $this->Html->link("Edit Details", array('controller'=>'projects', 'action' => 'edit', $project['Project']['id'])); ?>
	</p>															
	<div class="box-content">
		<div class="projects view">
			<?php echo $this->Html->image("project-logo.png", array("class" => "project-logo")); ?>
			<div class="field text">
				<h2 class="fieldvalue jeditable" id="jedit_title-<?php echo $project['Project']['id']; ?>"><?php echo $project['Project']['title']; ?></h2>
				<?php
					$options['submitdata'] = array('id'=> $project['Project']['id'], 'field'=>'title');					
					echo $ajax->editor("jedit_title-".$project['Project']['id'], array(), $options);
				?>				
			</div>
			<div class="field text">
				<p class="fieldvalue jeditable" id="jedit_description-<?php echo $project['Project']['id']; ?>"><?php echo $project['Project']['description']; ?></p>
				<?php
					$options['submitdata'] = array('id'=> $project['Project']['id'], 'field'=>'description');					
					$options['type'] = 'textarea';
					echo $ajax->editor("jedit_description-".$project['Project']['id'], array(), $options);
				?>				
			</div>
			<div class="field link">
				<span class="label">Website:</span>
				<a class="fieldvalue" href="<?php echo $project['Project']['siteurl']; ?>"><?php echo $project['Project']['siteurl']; ?></a>
			</div>
			<div class="field link">
				<span class="label">Github:</span>
				<a class="fieldvalue" href="<?php echo $project['Project']['github']; ?>"><?php echo $project['Project']['github']; ?></a>
			</div>
			<div class="field users">
				<span class="label">Clients:</span>
				<?php foreach($clients as $client) {
					echo $this->element('users_profilelink', array('user' => $client));
				} ?>
			</div>
			<div class="field users">
				<span class="label">Agents:</span>
				<?php foreach ($consultants as $consultant) {
					echo $this->element('users_profilelink', array('user' => $consultant));
				} ?>
			</div>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>


<?php // Notifications ?>
<div class="context-project-details box-half">
	<p class="box-title">Notifications</p>
												
	<div class="box-content">
		<div class="projects view">		
				<div class="field text">
					Changes since your last login <span><?php echo $last_login; ?></span>
				</div>		
				<table class="context-table-recent-entries">				
					<?php foreach($recent_entries as $recent_entry): 
						$state = $recent_entry["state"];
						$notification = $recent_entry["notification"]; 
						$model = $recent_entry["model"];
						$username = $recent_entry["ModifiedBy"]["username"];
						$id = $recent_entry[$model]["id"];
						$title = $recent_entry[$model]["title"];
						$controller = strToLower($model)."s";
						$anchorText = $username." ".$state." the ".strToLower($model)." '".$title."'";
					?>
						<tr>
							<?php if($notification): ?>
							<td class="newEntry">					
								<?php echo $this->Html->Link($anchorText, array('controller'=>$controller, 'action'=>'view', $id, 'recent')); ?>																					
							</td>
							<?php else: ?>
							<td>					
								<?php echo $this->Html->Link($anchorText, array('controller'=>$controller, 'action'=>'view', $id)); ?>																					
							</td>														
							<?php endif; ?>
						</tr>						
					<?php endforeach; ?>						
				</table>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>

<?php // Next milestone ?>
<?php echo $this->element('milestones_quickindex', array('milestone' => $milestone, 'box_title' => 'Next Milestone')); ?>
<?php echo $this->element('tasks_quickadd'); ?>