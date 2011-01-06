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
			<?php foreach($notifications as $notification){	
				$state = $notification["state"];
				$model = $notification["model"];
				$username = $notification["ModifiedBy"]["username"];
				$id = $notification[$model]["id"];
				$title = $notification[$model]["title"];
				$controller = strToLower($model)."s";
				$anchorText = $username." ".$state." the ".strToLower($model)." '".$title."'";
				echo $this->Html->Link($anchorText, array('controller'=>$controller, 'action'=>'view', $id))."<br>";				
			}
			?>
			<?php //debug($notifications);?>
		</div>
		<div class="clearfix"></div>									
	</div>
</div>

<?php // Next milestone ?>
<?php echo $this->element('milestones_quickindex', array('milestone' => $milestone, 'box_title' => 'Next Milestone')); ?>
<?php echo $this->element('tasks_quickadd'); ?>