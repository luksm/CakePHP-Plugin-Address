<div class="neighbourhoods index">
	<h2><?php echo __d('address', 'Neighbourhoods'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('city_id', __d('address', 'City')); ?></th>
			<th><?php echo $this->Paginator->sort('neighbourhood', __d('address', 'Neighbourhood')); ?></th>
			<th class="actions"><?php echo __d('address', 'Actions'); ?></th>
	</tr>
	<?php foreach ($neighbourhoods as $neighbourhood): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($neighbourhood['City']['city'], array('controller' => 'loc_cities', 'action' => 'view', $neighbourhood['City']['id'])); ?>
		</td>
		<td><?php echo h($neighbourhood['Neighbourhood']['neighbourhood']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__d('address', 'View'), array('action' => 'view', $neighbourhood['Neighbourhood']['id'])); ?>
			<?php echo $this->Html->link(__d('address', 'Edit'), array('action' => 'edit', $neighbourhood['Neighbourhood']['id'])); ?>
			<?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $neighbourhood['Neighbourhood']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $neighbourhood['Neighbourhood']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __d('address', 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __d('address', 'previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__d('address', 'next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
    <?php echo $this->element('admin/menu'); ?>
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List Cities'), array('controller' => 'loc_cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New City'), array('controller' => 'loc_cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Addresses'), array('controller' => 'loc_addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Address'), array('controller' => 'loc_addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
