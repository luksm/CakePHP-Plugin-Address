<div class="neighbourhoods form">
<?php echo $this->Form->create('Neighbourhood'); ?>
	<fieldset>
		<legend><?php echo __d('address', 'Admin Add Neighbourhood'); ?></legend>
	<?php
		echo $this->Form->input('city_id', __d('address', 'City'));
		echo $this->Form->input('neighbourhood', __d('address', 'Neighbourhoods'));
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__d('address', 'List Neighbourhoods'), array("admin" => true, 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List Cities')        , array("admin" => true, 'controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New City')           , array("admin" => true, 'controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Addresses')     , array("admin" => true, 'controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Address')        , array("admin" => true, 'controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
