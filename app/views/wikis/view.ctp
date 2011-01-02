<div class="box-half">
	<p class="box-title">View Wiki</p>	
	<div class="box-meta">
		<?php echo $this->Html->link(__('Edit Wiki', true), array('action' => 'edit', $wiki['Wiki']['id'])); ?> - 
		<?php echo $this->Html->link(__('Delete Wiki', true), array('action' => 'delete', $wiki['Wiki']['id']), null, sprintf(__('Are you sure you want to delete #%s?', true), $wiki['Wiki']['id'])); ?>
	</div>	
	<div class="box-content">
		<div class="wikis view">
			<div class="field text">
				<h2 class="fieldvalue"><?php echo $wiki['Wiki']['title']; ?></h2>
			</div>
			<div class="field textarea">
				<span class="fieldvalue"><?php echo $wiki['Wiki']['body']; ?></span>
			</div>		
			<div class="view">
				<span>Navigation:</span><br/>
				<?php if($wiki['Parent']['id']>0): ?>
					<?php echo $this->Html->link($wiki['Parent']['title'], array('controller' => 'wikis', 'action' => 'view', $wiki['Parent']['id'])); ?>
				<?php else: ?>
					<?php echo $this->Html->link("Root", array('controller' => 'wikis', 'action' => 'index')); ?>
				<?php endif; ?>
				<ul style="padding-left: 15px;">
				<?php foreach ($navItems as $item): ?>
						<li style="list-style: disc;"><?php echo $this->Html->link($item["Wiki"]["title"], array('action' => 'view', $item['Wiki']['id'])); ?> </li>
				<?php endforeach; ?>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="box-half">
	<p class="box-title">Add Comment</p>
	<div class="box-content">
		<?php echo $this->requestAction("/comments/comments/index/Wiki/" . $wiki['Wiki']['id'], array('return')); ?>
		<div class="clearfix"></div>	
	</div>
</div>