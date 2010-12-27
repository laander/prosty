<div class="wikis view">
<h2><?php echo $wiki['Wiki']['title']; ?></h2>
	<?php echo $wiki['Wiki']['body']; ?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Wiki', true), array('action' => 'add',$wiki['Wiki']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Edit Wiki', true), array('action' => 'edit', $wiki['Wiki']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Wiki', true), array('action' => 'delete', $wiki['Wiki']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $wiki['Wiki']['id'])); ?> </li>
	</ul>
</div>

<div class="view">
	Navigation:
	<ul>
	<?php if($wiki['Parent']['id']>0): ?>
		<?php echo $this->Html->link($wiki['Parent']['title'], array('controller' => 'wikis', 'action' => 'view', $wiki['Parent']['id'])); ?>
	<?php else: ?>
		<?php echo $this->Html->link("Root", array('controller' => 'wikis', 'action' => 'index')); ?>
	<?php endif; ?>
	<?php foreach ($navItems as $item): ?>
			<li><?php echo $this->Html->link($item["Wiki"]["title"], array('action' => 'view', $item['Wiki']['id'])); ?> </li>
	<?php endforeach; ?>
	</ul>
</div>
<?php
	echo $this->requestAction("/comments/comments/index/Wiki/".$wiki['Wiki']['id'], array('return')); 
?>