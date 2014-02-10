<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
    <fieldset>
        <legend><?php echo __d('address', 'Admin Edit Address'); ?></legend>
    <?php
        echo $this->Form->input('information', array("label" => __d('address', "Information")));
        echo $this->Form->input('address', array("label" => __d('address', "Address")));
        echo $this->Form->input('zip', array("label" => __d('address', "Zip")));
        echo $this->Form->input('city_id', array("label" => __d('address', "City")));
        echo $this->Form->input('neighbourhood_id', array("label" => __d('address', "Neighbourhood")));
    ?>
    </fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __d('address', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('address', 'List Addresses'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__d('address', 'List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__d('address', 'New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__d('address', 'List Neighbourhoods'), array('controller' => 'neighbourhoods', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__d('address', 'New Neighbourhood'), array('controller' => 'neighbourhoods', 'action' => 'add')); ?> </li>
</div>
