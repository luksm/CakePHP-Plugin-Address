<div class="states view">
<h2><?php echo __d('address', 'State'); ?></h2>
	<dl>
		<dt><?php echo __d('address', 'Id'); ?></dt>
		<dd>
			<?php echo h($state['State']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($state['Country']['country'], array('controller' => 'countries', 'action' => 'view', $state['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'State'); ?></dt>
		<dd>
			<?php echo h($state['State']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Fu'); ?></dt>
		<dd>
			<?php echo h($state['State']['fu']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'Edit State'), array('action' => 'edit', $state['State']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('address', 'Delete State'), array('action' => 'delete', $state['State']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $state['State']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List States'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New State'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __d('address', 'Related Cities'); ?></h3>
	<?php if (!empty($state['City'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __d('address', 'Id'); ?></th>
		<th><?php echo __d('address', 'State Id'); ?></th>
		<th><?php echo __d('address', 'City'); ?></th>
		<th><?php echo __d('address', 'Capital'); ?></th>
		<th class="actions"><?php echo __d('address', 'Actions'); ?></th>
	</tr>
	<?php foreach ($state['City'] as $city): ?>
		<tr>
			<td><?php echo $city['id']; ?></td>
			<td><?php echo $city['state_id']; ?></td>
			<td><?php echo $city['city']; ?></td>
			<td><?php echo $city['capital']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('address', 'View'), array('controller' => 'cities', 'action' => 'view', $city['id'])); ?>
				<?php echo $this->Html->link(__d('address', 'Edit'), array('controller' => 'cities', 'action' => 'edit', $city['id'])); ?>
				<?php echo $this->Form->postLink(__d('address', 'Delete'), array('controller' => 'cities', 'action' => 'delete', $city['id']), null, __d('address', 'Are you sure you want to delete # %s?', $city['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__d('address', 'New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
