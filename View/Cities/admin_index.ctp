<div class="cities index">
	<h2><?php echo __d('address', 'Cities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
            <th><?php echo $this->Paginator->sort('State.country_id', __d('address', 'Country')); ?></th>
            <th><?php echo $this->Paginator->sort('state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('capital'); ?></th>
			<th class="actions"><?php echo __d('address', 'Actions'); ?></th>
	</tr>
	<?php foreach ($cities as $city): ?>
	<tr>
        <td>
            <?php echo $this->Html->link($countries[$city['State']['country_id']], array('controller' => 'loc_countries', 'action' => 'view', $city['State']['country_id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($city['State']['state'], array('controller' => 'loc_states', 'action' => 'view', $city['State']['id'])); ?>
        </td>
		<td><?php echo h($city['City']['city']); ?>&nbsp;</td>
		<td><?php echo h(($city['City']['capital'])?__d('address', "Yes"):__d('address', "No")); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__d('address', 'View'), array('action' => 'view', $city['City']['id'])); ?>
			<?php echo $this->Html->link(__d('address', 'Edit'), array('action' => 'edit', $city['City']['id'])); ?>
			<?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $city['City']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $city['City']['id'])); ?>
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
		<li><?php echo $this->Html->link(__d('address', 'New City'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('controller' => 'loc_neighbourhoods', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__d('address', 'New State'), array('controller' => 'loc_states', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__d('address', 'New Address'), array('controller' => 'loc_addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
