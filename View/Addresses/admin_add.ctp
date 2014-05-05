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
        echo $this->Form->input('state_id', array("label" => __d('address', "State")));
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

<?php
echo $this->Html->Script(
    "//code.jquery.com/jquery-1.10.2.min.js",
    array('inline' => false)
);

$webroot = $this->webroot;

$js = <<<EOD
var xhr;
var webroot = "{$webroot}" + "address/";

function zip(zip) {

    zip = zip.substr(0,5) + zip.substr(6,3);

    if(xhr && xhr.readystate != 4){
        xhr.abort();
    }

    xhr = $.ajax({
        url: "http://cep.correiocontrol.com.br/" + zip + ".json",
        dataType: "json"
    })
    .done(function(data) {

        // Change the state
        var states = document.getElementById("AddressStateId");
        for(var opt in states) {
            if(states[opt].value == data.uf) {
                states.selectedIndex = opt;
                break;
            }
        }

        // Change the city
        loadCities(document.getElementById("AddressCityId"), data.uf, data.localidade);

        // Change the Neighbourhood
        loadHoods(document.getElementById("AddressNeighbourhoodId"), data.uf, data.localidade, data.bairro);

        document.getElementById("AddressAddress").value = data.logradouro;
        document.getElementById("AddressInformation").value = data.logradouro;

        document.getElementById("result").textContent = data.logradouro + " - " + data.bairro + " - " + data.localidade + " - " + data.uf;
    });
}

function loadCities(dest, uf, select = false) {
    xhr = $.ajax({
        url: webroot + "cities/byState/" + uf,
        dataType: "json"
    })
    .done(function(data) {
        var sel = dest;
        while (sel.firstChild) {
            sel.removeChild(sel.firstChild);
        }
        for (var i in data) {

            var option = document.createElement('option');
            option.value = i;
            option.textContent = data[i];

            if (select == data[i]) {
                option.defaultSelected = "selected";
            }

            sel.appendChild(option);
        }
    });
}

function loadHoods(dest, uf, city, select = false) {
    xhr = $.ajax({
        url: webroot + "neighbourhoods/byStateCity/" + uf + '-' + city,
        dataType: "json"
    })
    .done(function(data) {
        var sel = dest;
        while (sel.firstChild) {
            sel.removeChild(sel.firstChild);
        }
        for (var i in data) {
            var option = document.createElement('option');
            option.value = i;
            option.textContent = data[i];

            if (select == data[i]) {
                option.defaultSelected = "selected";
            }

            sel.appendChild(option);
        }
    });
}

function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)
        return null;

    return elt.options[elt.selectedIndex].text;
}


$( document ).ready(function() {
    var lastZip = "";
    var states = document.getElementById("AddressStateId");
    var cities = document.getElementById("AddressCityId");
    var hoods  = document.getElementById("AddressNeighbourhoodId");

    $("#AddressZip").keyup(function() {
        if (lastZip != this.value) {
            lastZip = this.value;
            zip(this.value);
        }
    });

    $("#AddressStateId").change(function() {
        loadCities(cities, this.value);
    });

    $("#AddressCityId").change(function() {
        loadHoods(hoods, states.value, getSelectedText(this.id));
    });
});

EOD;

echo $this->Html->ScriptBlock(
    $js,
    array(
        'inline' => false,
        'block' => "script"
    )
);

if (!empty($zip)) {
    echo $this->Html->ScriptBlock(
        '$( document ).ready(function() { $( "#AddressZip" ).trigger( "keyup" ); });',
        array(
            'inline' => false,
            'block' => "script"
        )
    );
}

?>
