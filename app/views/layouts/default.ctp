<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?> | Prosty</title>
		<base href="<?php echo $base_url ?>" />
        <?php
			// CSS resources
			echo $this->Html->css('reset');
			echo $this->Html->css('jqueryui');
			echo $this->Html->css('jquery.colorbox');			
			echo $this->Html->css('screen.css');
			// JS resources	(some are loaded as needed)	
	        echo $this->Html->script('jquery-1.4.4.min.js');
	        echo $this->Html->script('tiny_mce/tiny_mce.js');
			echo $this->Html->script('jquery.autoresize.min.js');
			echo $this->Html->script('utils.js');
			echo $scripts_for_layout;
			echo $this->Html->script('screen.js');			
        ?>
	</head>
	<body>
		<div id="wrapper">
			<div id="side-container">
				<div id="header">
					<a href="/">
						<?php echo $this->Html->image("logo.png"); ?>
						<span>Konscript</span>
					</a>
				</div>
				<div id="main-menu">
					<ul class="menu-toplevel">
						<li>
							<a href="#">						
								<?php echo $this->Html->image("token-icons/Token Light/TokenW-PNG/Adobe/InDesignCS2.png"); ?>
								<span>Machinery</span>
							</a>
						</li>
						<li>
							<a href="#">
								<?php echo $this->Html->image("token-icons/Token Light/TokenW-PNG/Communication+Internet/Contact.png"); ?>
								<span>Agents</span>
							</a>
						</li>
						<li>
							<a href="#">
								<?php echo $this->Html->image("token-icons/Token Light/TokenW-PNG/Miscellaneous/Lightbulb.png"); ?>
								<span>Philosophy</span>
							</a>
						</li>
						<li class="current-toplevel">
							<a href="#">
								<?php echo $this->Html->image("token-icons/Token Light/TokenW-PNG/System+Settings/Clock.png"); ?>
								<span>Prosty</span>
							</a>
							<ul class="menu-sublevel">
								<li class="<?php echo $this->element('topmenu_classer', array('test' => 'manage')); ?>">
									<?php echo $this->Html->link(
										'Manage', 
										array('controller' => 'projects', 'action' => 'dashboard')); ?>
								</li>
								<li class="<?php echo $this->element('topmenu_classer', array('test' => 'projects')); ?>">
									<?php echo $this->Html->link(
										'Projects',
										array('controller' => 'projects', 'action' => 'index')); ?>
								</li>
								<li class="<?php echo $this->element('topmenu_classer', array('test' => 'people')); ?>">
									<?php echo $this->Html->link(
										'People', 
										array('controller' => 'users', 'action' => 'index')); ?>

								</li>
								<li class="<?php echo $this->element('topmenu_classer', array('test' => 'help')); ?>">
									<?php echo $this->Html->link(
										'Help',
										array('controller' => 'projects', 'action' => 'dashboard')); ?>
								</li>								
							</ul>							
						</li>						
					</ul>
				</div>
				<div id="subheader">
					<div>
						<?php if (isset($currentUser)): ?>
							Currently logged in as:<br /><br />
							<?php echo $currentUser["User"]["username"]; ?>
							<?php echo $this->Html->link('Log out?', array('controller'=>'users','action' => 'logout')); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div id="main-container">
				<?php if ($this->element('topmenu_classer', array('test' => 'manage')) == "current-sublevel") { ?>
				<div id="sub-menu">
					<?php 
					echo $this->Html->link(
						'Dashboard', 
						array('controller' => 'projects', 'action' => 'dashboard'), 
						array('class' => 'button ' . $this->element('submenu_classer', array('test' => 'dashboard')))); ?>
					<?php echo $this->Html->link(
						'Milestones & Tasks', 
						array('controller' => 'milestones', 'action' => 'index'), 
						array('class' => 'button ' . $this->element('submenu_classer', array('test' => 'milestones_tasks')))); ?>
					<?php echo $this->Html->link(
						'Wiki', 
						array('controller' => 'wikis', 'action' => 'index'), 
						array('class' => 'button ' . $this->element('submenu_classer', array('test' => 'wikis')))); ?>
					<div class="project-selector">
						<?php echo $this->Form->create('Project'); ?>
						<?php echo $this->Form->input('Project', array('label'=>'','type'=>'select', 'selected' => $currentProjectId));?>
						<?php echo $this->Form->end(); ?>
						<span>Current Project:</span>
					</div>
				</div>
				<?php } ?>
				<div id="content">
					<div id="primary-area">
						<div id="primary-area-inner">	
							<?php echo $content_for_layout; ?>
						</div>
					</div>
					<div id="secondary-area">
						<div class="flash-message"><?php echo $this->Session->flash(); ?></div>
						<div class="flash-message-seperator"></div>
						<p>So, what to put here? Nifty tips & tricks, naked dancing women destroying concentration?</p><br />
						<p>Facilisis nulla vitae urna tincidunt congue sed ut dui. Morbi malesuada nulla nec purus convallis. </p>
					</div>										
					<div id="tertiary-area">
						<span>Breadcrumbs:</span>
						<?php echo $this->Html->link($this->params['controller'], array('controller' => $this->params['controller'])); ?> >
						<?php echo $this->Html->link($this->params['action'], array('action' => $this->params['action'])); ?>						
						<br />
						<?php echo $this->element('sql_dump'); ?>'
					</div>
				</div>
			</div>			
		</div>
	</body>
</html>