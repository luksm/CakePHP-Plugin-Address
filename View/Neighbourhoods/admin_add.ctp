<div class="neighbourhoods form">
	<h2><?php echo __d('address', 'Admin Add Neighbourhood'); ?></h2>
    <?php echo $this->Form->create('Neighbourhood'); ?>
    <fieldset>
	<?php
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
		<li><?php echo $this->Html->link(__d('address', 'New City')           , array("admin" => true, 'controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
