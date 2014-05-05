<div class="addresses form">
    <h2><?php echo __d('address', 'Admin Edit Address'); ?></h2>
    <?php echo $this->Form->create('Address'); ?>
    <fieldset>
    <?php
        echo $this->Form->input('zip', array("label" => __d('address', "Zip")));
    ?>
    <div id="result">
    </div>
    <?php
        echo $this->Form->input('information', array("label" => __d('address', "Information")));
        echo $this->Form->input('address', array("label" => __d('address', "Address")));
        echo $this->Form->input('Country', array("label" => __d('address', "Country")));
        echo $this->Form->input('State', array("label" => __d('address', "State")));
        echo $this->Form->input('City', array("label" => __d('address', "City")));
        echo $this->Form->input('city_id', array("type" => 'text'));
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

<?php

$js = <<<EOD
var webroot = "{$this->webroot}";
var stateObj;
var cityObj;
var hoodsObj;

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
        cityObj.appendChild(newElement("option", cities[id].City.city, cities[id].City.slug, "City" + cities[id].City.id));
    }
    $( "#" + cityObj.id ).trigger( "change" );

}

function setHoods(hoods) {
    removeChilds(hoodsObj);
    for (var id in hoods)
    {
        hoodsObj.appendChild(newElement("option", hoods[id].Neighbourhood.neighbourhood, hoods[id].Neighbourhood.id, "Neighbourhood" + hoods[id].Neighbourhood.id));
    }
    document.getElementById("AddressCityId").value = hoods[id].Neighbourhood.city_id;
}


function externalZip(zip) {

    zip = zip.substr(0,5) + zip.substr(6,3);

    if(xhr && xhr.readystate != 4){
        xhr.abort();
    }

    xhr = $.ajax({
        url: "http://cep.correiocontrol.com.br/" + zip + ".json",
        dataType: "json"
    })
    .done(function(data) {

        $("#AddressCountry").val("BR");
        $("#AddressCountry").trigger("change");
        $("#AddressState").val(data.uf);

        document.getElementById("AddressAddress").value = data.logradouro;
        document.getElementById("AddressInformation").value = data.logradouro;

        document.getElementById("result").textContent = data.logradouro + " - " + data.bairro + " - " + data.localidade + " - " + data.uf;
    });
}

$( document ).ready(function() {
    stateObj = document.getElementById("AddressState");
    cityObj = document.getElementById("AddressCity");
    hoodsObj = document.getElementById("AddressNeighbourhoodId");

    $("#AddressCountry").change(function() { state(this.value, setState); });
    $("#AddressState").change(function() { city(this.value, setCity); });
    $("#AddressCity").change(function() { neighbourhood(stateObj.value+"|"+this.value, setHoods);});

    var lastZip = "";

    $("#AddressZip").keyup(function() {
        if (lastZip != this.value) {
            lastZip = this.value;
            externalZip(this.value);
        }
    });

});
EOD;

/* Grab Google CDN's jQuery. fall back to local if necessary */
echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array('inline' => false));
echo $this->Html->scriptBlock("!window.jQuery && document.write(unescape('%3Cscript src=\"js/jquery-1.11.0.min.js\"%3E%3C/script%3E'))", array('inline' => false));
echo $this->Html->Script("Address.address", array('inline' => false));
echo $this->Html->ScriptBlock( $js, array('inline' => false, 'block' => "script"));
