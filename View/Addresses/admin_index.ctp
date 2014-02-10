<div class="addresses index">
	<h2><?php echo __d('address', 'Addresses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('information', __d('address', "Information")); ?></th>
			<th><?php echo $this->Paginator->sort('address', __d('address', "Address")); ?></th>
			<th><?php echo $this->Paginator->sort('zip', __d('address', "Zip")); ?></th>
			<th><?php echo $this->Paginator->sort('city_id', __d('address', "City")); ?></th>
			<th><?php echo $this->Paginator->sort('neighbourhood_id', __d('address', "Neighbourhood")); ?></th>
			<th class="actions"><?php echo __d('address', 'Actions'); ?></th>
	</tr>
	<?php foreach ($addresses as $address): ?>
	<tr>
		<td><?php echo h($address['Address']['id']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['information']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['address']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['zip']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($address['City']['city'], array('controller' => 'cities', 'action' => 'view', $address['City']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($address['Neighbourhood']['neighbourhood'], array('controller' => 'neighbourhoods', 'action' => 'view', $address['Neighbourhood']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__d('address', 'View'), array('action' => 'view', $address['Address']['id'])); ?>
			<?php echo $this->Html->link(__d('address', 'Edit'), array('action' => 'edit', $address['Address']['id'])); ?>
			<?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $address['Address']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $address['Address']['id'])); ?>
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
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'New Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Neighbourhoods'), array('controller' => 'neighbourhoods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('controller' => 'neighbourhoods', 'action' => 'add')); ?> </li>
	</ul>
</div>
