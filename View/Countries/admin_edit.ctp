<div class="countries form">
<?php echo $this->Form->create('Country'); ?>
	<fieldset>
		<legend><?php echo __d('address', 'Admin Edit Country'); ?></legend>
	<?php
		echo $this->Form->input('id');
        echo $this->Form->input('country', array("label" => __d('address', "Country")));
        echo $this->Form->input('abbr', array("label" => __d('address', "Abbr")));
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $this->Form->value('Country.id')), null, __d('address', 'Are you sure you want to delete # %s?', $this->Form->value('Country.id'))); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List Countries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
	</ul>
</div>
