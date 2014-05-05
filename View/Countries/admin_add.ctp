<div class="countries form">
	<h2><?php echo __d('address', 'Admin Add Country'); ?></h2>
    <?php echo $this->Form->create('Country'); ?>
    <fieldset>
	<?php
		echo $this->Form->input('country', array("label" => __d('address', "Country")));
		echo $this->Form->input('abbr', array("label" => __d('address', "Abbr")));
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('admin/menu'); ?>
</div>
