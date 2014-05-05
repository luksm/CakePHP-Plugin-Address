<div class="neighbourhoods form">
	<h2><?php echo __d('address', 'Admin Add Neighbourhood'); ?></h2>
    <?php echo $this->Form->create('Neighbourhood'); ?>
    <fieldset>
	<?php
	
        echo $this->Form->input('Country', array("label" => __d('address', "Country")));
        echo $this->Form->input('State', array("label" => __d('address', "State")));
    	echo $this->Form->input('city_id', array("label" => __d('address', "City")));
		echo $this->Form->input('neighbourhood', array("label" => __d('address', "Neighbourhoods")));
	?>
	</fieldset>
<?php echo $this->Form->end(__d('address', 'Submit')); ?>
</div>
<div class="actions">
    <?php echo $this->element('admin/menu'); ?>
	<h3><?php echo __d('address', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('address', 'New City')           , array("admin" => true, 'controller' => 'cities', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php

$js = <<<EOD
var webroot = "{$this->webroot}";
var stateObj;
var cityObj;

function setState(states) {
    removeChilds(stateObj);
    removeChilds(cityObj);    
    for (var id in states)
    {
        stateObj.appendChild(newElement("option", states[id].State.state, states[id].State.fu, "State" + states[id].State.id));
    }
    $( "#NeighbourhoodState" ).trigger( "change" );
}

function setCity(cities) {
    removeChilds(cityObj);
    for (var id in cities)
    {
        cityObj.appendChild(newElement("option", cities[id].City.city, cities[id].City.id, "City" + cities[id].City.id));
    }
}

$( document ).ready(function() {
    stateObj = document.getElementById("NeighbourhoodState");
    cityObj = document.getElementById("NeighbourhoodCityId");
    $("#NeighbourhoodCountry").change(function() { state(this.value, setState); });
    $("#NeighbourhoodState").change(function() { city(this.value, setCity); });
});
EOD;

/* Grab Google CDN's jQuery. fall back to local if necessary */
echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array('inline' => false));
echo $this->Html->scriptBlock("!window.jQuery && document.write(unescape('%3Cscript src=\"js/jquery-1.11.0.min.js\"%3E%3C/script%3E'))", array('inline' => false));
echo $this->Html->Script("Address.address", array('inline' => false));
echo $this->Html->ScriptBlock( $js, array('inline' => false, 'block' => "script"));
