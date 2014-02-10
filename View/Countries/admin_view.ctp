<div class="countries view">
<h2><?php echo __d('address', 'Country'); ?></h2>
	<dl>
		<dt><?php echo __d('address', 'Id'); ?></dt>
		<dd>
			<?php echo h($country['Country']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Country'); ?></dt>
		<dd>
			<?php echo h($country['Country']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Abbr'); ?></dt>
		<dd>
			<?php echo h($country['Country']['abbr']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'Edit Country'), array('action' => 'edit', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('address', 'Delete Country'), array('action' => 'delete', $country['Country']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Countries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Country'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __d('address', 'Related States'); ?></h3>
	<?php if (!empty($country['State'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __d('address', 'Id'); ?></th>
		<th><?php echo __d('address', 'Country Id'); ?></th>
		<th><?php echo __d('address', 'State'); ?></th>
		<th><?php echo __d('address', 'Fu'); ?></th>
		<th class="actions"><?php echo __d('address', 'Actions'); ?></th>
	</tr>
	<?php foreach ($country['State'] as $state): ?>
		<tr>
			<td><?php echo $state['id']; ?></td>
			<td><?php echo $state['country_id']; ?></td>
			<td><?php echo $state['state']; ?></td>
			<td><?php echo $state['fu']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('address', 'View'), array('controller' => 'states', 'action' => 'view', $state['id'])); ?>
				<?php echo $this->Html->link(__d('address', 'Edit'), array('controller' => 'states', 'action' => 'edit', $state['id'])); ?>
				<?php echo $this->Form->postLink(__d('address', 'Delete'), array('controller' => 'states', 'action' => 'delete', $state['id']), null, __d('address', 'Are you sure you want to delete # %s?', $state['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__d('address', 'New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
