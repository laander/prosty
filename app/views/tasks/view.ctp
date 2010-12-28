<?php echo $this->Html->script('jquery.jeditable.mini.js', false); ?>

<div class="tasks view">
<h2><?php  __('Task');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>


<div class="edit" id="task_<?php echo $task['Task']['id']; ?>"><?php echo $task['Task']['title']; ?></div>

<?php
echo $ajax->editor("task_".$task['Task']['id'], 
    array( 
        'controller' => 'tasks', 
        'action' => 'updateTitle',
    ), 
    array(
        'indicator' => '<img src="/img/indicator.gif">',
        'submit' => 'OK',
        'style' => 'inherit',
        'submitdata' => array('id'=> $task['Task']['id']),
        'tooltip'   => 'Click to edit...'
        )
);
	?>  			
			
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $task['Task']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estimate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $task['Task']['estimate']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Priority'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $task['Task']['priority']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php
	echo $this->requestAction("/comments/comments/index/Task/".$task['Task']['id'], array('return')); 
?>