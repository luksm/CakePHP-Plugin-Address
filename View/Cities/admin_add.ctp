<div class="cities form">
    <h2><?php echo __d('address', 'Admin Add City'); ?></h2>
    <?php echo $this->Form->create('City'); ?>
    <fieldset>
    <?php

        echo $this->Form->input('Country', array("label" => __d('address', "Country")));
        echo $this->Form->input('state_id', array("label" => __d('address', "State")));
        echo $this->Form->input('city', array("label" => __d('address', "City")));
        echo $this->Form->input('capital', array("label" => __d('address', "Capital")));
    ?>
    </fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('admin/menu'); ?>
    <h3><?php echo __d('address', 'Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__d('address', 'New State'), array('controller' => 'loc_states', 'action' => 'add')); ?> </li>
    </ul>
</div>

<?php

$js = <<<EOD
var webroot = "{$this->webroot}";
var stateObj = document.getElementById("CityStateId");

function setState(states) {
    removeChilds(stateObj);
    for (var id in states)
    {
        stateObj.appendChild(newElement("option", states[id].State.state, states[id].State.id, "State" + states[id].State.id));
    }
}

$( document ).ready(function() {
    $("#CityCountry").change(function() { state(this.value, setState); });
});
EOD;

/* Grab Google CDN's jQuery. fall back to local if necessary */
echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array('inline' => false));
echo $this->Html->scriptBlock("!window.jQuery && document.write(unescape('%3Cscript src=\"js/jquery-1.11.0.min.js\"%3E%3C/script%3E'))", array('inline' => false));
echo $this->Html->Script("Address.address", array('inline' => false));
echo $this->Html->ScriptBlock( $js, array('inline' => false, 'block' => "script"));
