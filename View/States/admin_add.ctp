<div class="states form">
	<h2><?php echo __d('address', 'Admin Add State'); ?></h2>
    <?php echo $this->Form->create('State'); ?>
    <fieldset>
	<?php
		echo $this->Form->input('country_id');
		echo $this->Form->input('state');
		echo $this->Form->input('fu');
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('admin/menu'); ?>
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'New Country'), array('controller' => 'loc_countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
