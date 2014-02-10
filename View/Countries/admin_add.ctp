<div class="countries form">
<?php echo $this->Form->create('Country'); ?>
	<fieldset>
		<legend><?php echo __d('address', 'Admin Add Country'); ?></legend>
	<?php
		echo $this->Form->input('country', array("label" => __d('address', "Country")));
		echo $this->Form->input('abbr', array("label" => __d('address', "Abbr")));
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__d('address', 'List Countries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
