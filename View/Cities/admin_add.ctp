<div class="cities form">
<?php echo $this->Form->create('City'); ?>
	<fieldset>
		<legend><?php echo __d('address', 'Admin Add City'); ?></legend>
	<?php
        echo $this->Form->input('state_id', array("label" => __d('address', "State")));
        echo $this->Form->input('city', array("label" => __d('address', "City")));
        echo $this->Form->input('capital', array("label" => __d('address', "Capital")));
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__d('address', 'List Cities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Neighbourhoods'), array('controller' => 'neighbourhoods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('controller' => 'neighbourhoods', 'action' => 'add')); ?> </li>
	</ul>
</div>
