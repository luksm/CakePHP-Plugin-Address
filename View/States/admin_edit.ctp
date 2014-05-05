<div class="states form">
	<h2><?php echo __d('address', 'Admin Edit State'); ?></h2>
    <?php echo $this->Form->create('State'); ?>
    <fieldset>
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
    <?php echo $this->element('admin/menu'); ?>
	<h3><?php echo __d('address', 'Actions'); ?></h3>
    <ul>
		<li><?php echo $this->Html->link(__d('address', 'View'), array('action' => 'index', $this->Form->value('State.id'))); ?></li>
        <li><?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $this->Form->value('State.id')), null, __d('address', 'Are you sure you want to delete # %s?', $this->Form->value('State.id'))); ?></li>
	</ul>
</div>
