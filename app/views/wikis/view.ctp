<div class="wikis view">
<h2><?php  __('Wiki');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $wiki['Wiki']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($wiki['User']['username'], array('controller' => 'users', 'action' => 'view', $wiki['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $wiki['Wiki']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $wiki['Wiki']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($wiki['Parent']['title'], array('controller' => 'wikis', 'action' => 'view', $wiki['Parent']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $wiki['Wiki']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $wiki['Wiki']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Wiki', true), array('action' => 'edit', $wiki['Wiki']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Wiki', true), array('action' => 'delete', $wiki['Wiki']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $wiki['Wiki']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Wikis', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Wiki', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Wikis', true), array('controller' => 'wikis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent', true), array('controller' => 'wikis', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="view">
Undersider:
<ul>
<?php foreach ($navItems as $item): ?>
		<li><?php echo $this->Html->link($item["Wiki"]["title"], array('action' => 'view', $item['Wiki']['id'])); ?> </li>
<?php endforeach; ?>
</ul>
</div>