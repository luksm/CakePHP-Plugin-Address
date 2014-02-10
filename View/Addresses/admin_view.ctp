<div class="addresses view">
<h2><?php echo __d('address', 'Address'); ?></h2>
	<dl>
		<dt><?php echo __d('address', 'Id'); ?></dt>
		<dd>
			<?php echo h($address['Address']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Information'); ?></dt>
		<dd>
			<?php echo h($address['Address']['information']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Address'); ?></dt>
		<dd>
			<?php echo h($address['Address']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Zip'); ?></dt>
		<dd>
			<?php echo h($address['Address']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'City'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['City']['city'], array('controller' => 'cities', 'action' => 'view', $address['City']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('address', 'Neighbourhood'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['Neighbourhood']['neighbourhood'], array('controller' => 'neighbourhoods', 'action' => 'view', $address['Neighbourhood']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'Edit Address'), array('action' => 'edit', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('address', 'Delete Address'), array('action' => 'delete', $address['Address']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Addresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Address'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Neighbourhoods'), array('controller' => 'neighbourhoods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('controller' => 'neighbourhoods', 'action' => 'add')); ?> </li>
	</ul>
</div>
