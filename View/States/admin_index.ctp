<div class="states index">
    <h2><?php echo __d('address', 'States'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
            <th><?php echo $this->Paginator->sort('country_id'); ?></th>
            <th><?php echo $this->Paginator->sort('fu'); ?></th>
            <th><?php echo $this->Paginator->sort('state'); ?></th>
            <th class="actions"><?php echo __d('address', 'Actions'); ?></th>
    </tr>
    <?php foreach ($states as $state): ?>
    <tr>
        <td>
            <?php echo $this->Html->link($state['Country']['country'], array('controller' => 'loc_countries', 'action' => 'view', $state['Country']['id'])); ?>
        </td>
        <td><?php echo h($state['State']['fu']); ?>&nbsp;</td>
        <td><?php echo h($state['State']['state']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__d('address', 'View'), array('action' => 'view', $state['State']['id'])); ?>
            <?php echo $this->Html->link(__d('address', 'Edit'), array('action' => 'edit', $state['State']['id'])); ?>
            <?php echo $this->Form->postLink(__d('address', 'Delete'), array('action' => 'delete', $state['State']['id']), null, __d('address', 'Are you sure you want to delete # %s?', $state['State']['id'])); ?>
        </td>
    </tr>
<?php endforeach; ?>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
    'format' => __d('address', 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>  </p>
    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __d('address', 'previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__d('address', 'next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>
<div class="actions">
    <?php echo $this->element('admin/menu'); ?>
    <h3><?php echo __d('address', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('address', 'New State'), array('action' => 'add')); ?></li>
    </ul>
</div>
