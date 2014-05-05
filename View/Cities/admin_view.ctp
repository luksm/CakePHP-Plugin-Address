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
<div class="related">
    <h3><?php echo __d('address', 'Related Neighbourhoods'); ?></h3>
    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('controller' => 'neighbourhoods', 'action' => 'add')); ?> </li>
        </ul>
    </div>

    <?php if (!empty($city['Neighbourhood'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __d('address', 'Neighbourhood'); ?></th>
        <th class="actions"><?php echo __d('address', 'Actions'); ?></th>
    </tr>
    <?php foreach ($city['Neighbourhood'] as $neighbourhood): ?>
        <tr>
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
</div>
</div>
<div class="actions">
    <?php echo $this->element('admin/menu'); ?>
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'Edit'), array('action' => 'edit', $city['City']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $city['City']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $city['City']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('controller' => 'neighbourhoods', 'action' => 'add')); ?> </li>
	</ul>
</div>
