<?php /***************** PROJECT INFO **************************/ ?>

<div class="dashboard projectInfo">
	<div class="header"><h2><?php  __('Project');?></h2></div>
	<table>		
		<tr><td>Project</td><td><?php echo $project['Project']['title']; ?></td></tr>
		<tr><td>Description</td><td><?php echo $project['Project']['description']; ?></td></tr>
		<tr><td>Github</td><td><?php echo $project['Project']['github']; ?></td></tr>
		<tr><td>Website</td><td><?php echo $project['Project']['siteurl']; ?></td></tr>
		<tr>
			<td>Client(s)</td>
			<td><?php foreach($clients as $id=>$username): ?>
			 		<?php echo $this->Html->link($username, array('controller'=>'users','action' => 'view', $id)); ?>
			 	<?php endforeach; ?>
			</td>
		</tr>
		<tr><td>Consultant(s)</td><td>
				<?php foreach($consultants as $id=>$username): ?>
			 		<?php echo $this->Html->link($username, array('controller'=>'users','action' => 'view', $id)); ?>
			 	<?php endforeach; ?>
		</td></tr>
	</table>
</div>

<?php /***************** UPCOMING MILESTONE **************************/ ?>

<?php
if(is_array($milestone)){
	echo $this->element('milestoneWithTasks', array("milestone" => $milestone, "header"=>"Upcoming: ", "left"=>1, "right"=>1));
}else{
	echo $this->element('milestoneWithTasks', array("milestone" => false, "header"=>"Upcoming milestone", "left"=>0, "right"=>1));
}
?>
