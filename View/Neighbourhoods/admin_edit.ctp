<div class="neighbourhoods form">
<?php echo $this->Form->create('Neighbourhood'); ?>
	<fieldset>
		<legend><?php echo __d('address', 'Admin Edit Neighbourhood'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('city_id', __d('address', 'City'));
		echo $this->Form->input('neighbourhood', __d('address', 'Neighbourhood'));
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $this->Form->value('Neighbourhood.id')), null, __d('address', 'Are you sure you want to delete # %s?', $this->Form->value('Neighbourhood.id'))); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List Neighbourhoods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
