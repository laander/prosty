<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?> | Prosty</title>

        <?php
	        echo $this->Html->css('cake.generic');
	        echo $this->Html->css('global.css');
			
	        echo $this->Html->script('jquery-1.4.4.min.js');
			echo $this->Html->script('global.js');
	        echo $scripts_for_layout;
        ?>
</head>
<body>
				<?php echo $this->Session->flash(); ?>
				<h1><?php echo $title_for_layout; ?></h1>
				<?php echo $content_for_layout; ?>

</body>
</html>