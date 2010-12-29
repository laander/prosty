<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?> | Prosty</title>

        <?php
            echo $this->Html->css('colorbox');
	        echo $this->Html->css('cake.generic');
	        echo $this->Html->css('global.css');
			
	        echo $this->Html->script('jquery-1.4.4.min.js');
			echo $this->Html->script('autoresize.jquery.min.js');			
	        echo $scripts_for_layout;
			echo $this->Html->script('global.js');
        ?>
</head>
<body>
				<div id="errorMsg"><?php echo $this->Session->flash(); ?></div>
				<?php if (isset($currentUser)): ?>				
					<div id="header">												
						<div id="topNav">
							<?php echo $this->Html->link('Dashboard', array('controller' => 'projects', 'action' => 'dashboard')); ?>
							<?php echo $this->Html->link('Milestone', array('controller' => 'milestones', 'action' => 'index')); ?>
							<?php echo $this->Html->link('Wiki', array('controller' => 'wikis', 'action' => 'index')); ?>						
						</div>					
						<div id="userInfo">Hi <?php echo $currentUser["User"]["username"]; ?> <?php echo $this->Html->link('Logout', array('controller'=>'users','action' => 'logout')); ?></div>
						
						<?php echo $this->Form->create('Project');?>
						<?php echo $this->Form->input('Project', array('label'=>'','type'=>'select', 'selected' => $_SESSION["Project"]["id"]));?>
						<?php echo $this->Form->end();?>		
					</div>					
				<?php endif; ?>
				<div class="clear"></div>			
				<h1><?php echo $title_for_layout; ?></h1>
				<?php echo $content_for_layout; ?>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>