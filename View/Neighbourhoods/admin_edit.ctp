<div class="neighbourhoods form">
	<h2><?php echo __d('address', 'Admin Edit Neighbourhood'); ?></h2>
    <?php echo $this->Form->create('Neighbourhood'); ?>
    <fieldset>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('city_id', array("label" => __d('address', "City")));
		echo $this->Form->input('neighbourhood', array("label" => __d('address', "Neighbourhoods")));
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('admin/menu'); ?>
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
