<div class="wikis index">
<h2><?php __('Wikis');?></h2>
<table cellpadding="0" cellspacing="0">
	<?php	
	foreach ($wikis as $wiki):
	?>
	<tr>
		<td><?php echo $this->Html->link($wiki['Wiki']['title'], array('action' => 'view', $wiki['Wiki']['id'])); ?></td>
		<td class="actions"><?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $wiki['Wiki']['id'])); ?>
		<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $wiki['Wiki']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $wiki['Wiki']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Wiki', true), array('action' => 'add')); ?></li>
	</ul>
</div>


<div class="paging"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
| <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
</div>
</div>