<?php
echo $this->Html->Script(
    "//code.jquery.com/jquery-1.10.2.min.js", 
    array('inline' => false)
);

$js = <<<EOD
function zip(zip) {
    $.ajax({
        url: "/address/addresses/zip/" + zip,
        dataType: "json"
    })
    .done(function(data) {
        printResult(data);
    });
}

function printResult(data) {

    var table = document.createElement("table");

    var tr = document.createElement("tr");

    var th = document.createElement("th");
    th.textContent = "#";
    tr.appendChild(th);

    var th = document.createElement("th");
    th.textContent = "zip";
    tr.appendChild(th);

    var th = document.createElement("th");
    th.textContent = "address";
    tr.appendChild(th);

    var th = document.createElement("th");
    th.textContent = "neighbourhood";
    tr.appendChild(th);

    var th = document.createElement("th");
    th.textContent = "city";
    tr.appendChild(th);

    table.appendChild(tr);

    $.each(data, function( index, value ) {
        var tr = document.createElement("tr");

        var td = document.createElement("td");
        td.textContent = value.Address.id;
        tr.appendChild(td);

        var td = document.createElement("td");
        td.textContent = value.Address.zip;
        tr.appendChild(td);

        var td = document.createElement("td");
        td.textContent = value.Address.information;
        tr.appendChild(td);

        var td = document.createElement("td");
        td.textContent = value.Neighbourhood.neighbourhood;
        tr.appendChild(td);

        var td = document.createElement("td");
        td.textContent = value.City.city;
        tr.appendChild(td);

        table.appendChild(tr);
    });

    var result = document.getElementById("results");
    while (result.firstChild) {
        result.removeChild(result.firstChild);
    }

    result.appendChild(table);
}

$( document ).ready(function() {
    var lastZip = "";

    $("#AddressZip").keyup(function() {
        if (lastZip != this.value) {
            lastZip = this.value;

            zip(this.value);
        }
    });

    $("#AddressZip").keyup(function() {
        if (lastZip != this.value) {
            lastZip = this.value;

            zip(this.value);
        }
    });
});

EOD;

echo $this->Html->ScriptBlock(
    $js, 
    array(
        'inline' => false,
        'block' => "scriptBlock"
    )
);

if (!empty($zip)) {
    echo $this->Html->ScriptBlock(
        '$( document ).ready(function() { $( "#AddressZip" ).trigger( "keyup" ); });', 
        array(
            'inline' => false,
            'block' => "scriptBlock"
        )
    );
}

?><div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
    <fieldset>
        <legend><?php echo __('Admin Find Zip'); ?></legend>
    <?php
        echo $this->Form->input('zip', array("value" => $zip,  "autocomplete" => "off"));
    ?>
    </fieldset>

    <div id="results">
    </div>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Address'), array('admin' => true, 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Cities'), array('admin' => true, 'controller' => 'cities', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New City'), array('admin' => true, 'controller' => 'cities', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Neighbourhoods'), array('admin' => true, 'controller' => 'neighbourhoods', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Neighbourhood'), array('admin' => true, 'controller' => 'neighbourhoods', 'action' => 'add')); ?> </li>
    </ul>
</div>
