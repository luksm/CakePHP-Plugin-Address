<div class="neighbourhoods view">
    <h2><?php echo __d('address', 'Neighbourhood'); ?></h2>
	<dl>
		<dt><?php echo __d('address', 'Id'); ?></dt>
		<dd>
			<?php echo h($neighbourhood['Neighbourhood']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($neighbourhood['City']['city'], array('controller' => 'cities', 'action' => 'view', $neighbourhood['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Neighbourhood'); ?></dt>
		<dd>
			<?php echo h($neighbourhood['Neighbourhood']['neighbourhood']); ?>
			&nbsp;
		</dd>
	</dl>
<div class="related">
	<h3><?php echo __d('address', 'Related Addresses'); ?></h3>
	<?php if (!empty($neighbourhood['Address'])): ?>
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
	<?php foreach ($neighbourhood['Address'] as $address): ?>
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
</div>
<div class="actions">
    <?php echo $this->element('admin/menu'); ?>
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'Edit'), array('action' => 'edit', $neighbourhood['Neighbourhood']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $neighbourhood['Neighbourhood']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $neighbourhood['Neighbourhood']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
