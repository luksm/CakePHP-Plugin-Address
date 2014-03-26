<div class="states form">
<?php echo $this->Form->create('State'); ?>
	<fieldset>
		<legend><?php echo __d('address', 'Admin Edit State'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('country_id');
		echo $this->Form->input('state');
		echo $this->Form->input('fu');
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $this->Form->value('State.id')), null, __d('address', 'Are you sure you want to delete # %s?', $this->Form->value('State.id'))); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List States'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__d('address', 'List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('address', 'New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>
