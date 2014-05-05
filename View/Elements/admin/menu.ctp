<h3><?php echo __d("address", "Menu"); ?></h3>
<ul>
    <li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?>
    <li><?php echo $this->Html->link(__('List Neighbourhoods'), array('controller' => 'neighbourhoods', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?></li>
</ul>
