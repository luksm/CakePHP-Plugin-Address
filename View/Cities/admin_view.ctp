<div class="cities view">
<h2><?php echo __d('address', 'City'); ?></h2>
	<dl>
		<dt><?php echo __d('address', 'Id'); ?></dt>
		<dd>
			<?php echo h($city['City']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($city['State']['state'], array('controller' => 'states', 'action' => 'view', $city['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'City'); ?></dt>
		<dd>
			<?php echo h($city['City']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Capital'); ?></dt>
		<dd>
			<?php echo h($city['City']['capital']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'Edit City'), array('action' => 'edit', $city['City']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('address', 'Delete City'), array('action' => 'delete', $city['City']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $city['City']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Cities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New City'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Neighbourhoods'), array('controller' => 'neighbourhoods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('controller' => 'neighbourhoods', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __d('address', 'Related Addresses'); ?></h3>
	<?php if (!empty($city['Address'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __d('address', 'Id'); ?></th>
		<th><?php echo __d('address', 'Information'); ?></th>
		<th><?php echo __d('address', 'Address'); ?></th>
		<th><?php echo __d('address', 'Zip'); ?></th>
		<th><?php echo __d('address', 'City Id'); ?></th>
		<th><?php echo __d('address', 'Neighbourhood Id'); ?></th>
		<th class="actions"><?php echo __d('address', 'Actions'); ?></th>
	</tr>
	<?php foreach ($city['Address'] as $address): ?>
		<tr>
			<td><?php echo $address['id']; ?></td>
			<td><?php echo $address['information']; ?></td>
			<td><?php echo $address['address']; ?></td>
			<td><?php echo $address['zip']; ?></td>
			<td><?php echo $address['city_id']; ?></td>
			<td><?php echo $address['neighbourhood_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('address', 'View'), array('controller' => 'addresses', 'action' => 'view', $address['id'])); ?>
				<?php echo $this->Html->link(__d('address', 'Edit'), array('controller' => 'addresses', 'action' => 'edit', $address['id'])); ?>
				<?php echo $this->Form->postLink(__d('address', 'Delete'), array('controller' => 'addresses', 'action' => 'delete', $address['id']), null, __d('address', 'Are you sure you want to delete # %s?', $address['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__d('address', 'New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __d('address', 'Related Neighbourhoods'); ?></h3>
	<?php if (!empty($city['Neighbourhood'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __d('address', 'Id'); ?></th>
		<th><?php echo __d('address', 'City Id'); ?></th>
		<th><?php echo __d('address', 'Neighbourhood'); ?></th>
		<th class="actions"><?php echo __d('address', 'Actions'); ?></th>
	</tr>
	<?php foreach ($city['Neighbourhood'] as $neighbourhood): ?>
		<tr>
			<td><?php echo $neighbourhood['id']; ?></td>
			<td><?php echo $neighbourhood['city_id']; ?></td>
			<td><?php echo $neighbourhood['neighbourhood']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('address', 'View'), array('controller' => 'neighbourhoods', 'action' => 'view', $neighbourhood['id'])); ?>
				<?php echo $this->Html->link(__d('address', 'Edit'), array('controller' => 'neighbourhoods', 'action' => 'edit', $neighbourhood['id'])); ?>
				<?php echo $this->Form->postLink(__d('address', 'Delete'), array('controller' => 'neighbourhoods', 'action' => 'delete', $neighbourhood['id']), null, __d('address', 'Are you sure you want to delete # %s?', $neighbourhood['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('controller' => 'neighbourhoods', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
