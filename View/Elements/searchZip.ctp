<?php
echo $this->Html->Script(
    "//code.jquery.com/jquery-1.10.2.min.js", 
    array('inline' => false)
);

$url = $this->Html->url(array("admin" => false , "plugin" => 'address', 'controller' => 'addresses', 'action' => 'zip')) . DS;

$th = array(
    "zip"     => __d('address', "Zip"),
    "address" => __d('address', "Address"),
    "hood"    => __d('address', "Neighbourhood"),
    "city"    => __d('address', "City")
);


$js = <<<EOD
var xhr;

function zip(zip) {

    if(xhr && xhr.readystate != 4){
        xhr.abort();
    }

    xhr = $.ajax({
        url: "{$url}" + zip,
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
    th.textContent = "{$th['zip']}";
    tr.appendChild(th);

    var th = document.createElement("th");
    th.textContent = "{$th['address']}";
    tr.appendChild(th);

    var th = document.createElement("th");
    th.textContent = "{$th['hood']}";
    tr.appendChild(th);

    var th = document.createElement("th");
    th.textContent = "{$th['city']}";
    tr.appendChild(th);

    table.appendChild(tr);

    $.each(data, function( index, value ) {
        console.log(value);
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
        td.textContent = value.Neighbourhood.City.city + ' - '+ value.Neighbourhood.City.State.fu;
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

<?php
    echo $this->Form->input('zip', array("value" => $zip,  "autocomplete" => "off"));
?>

<div id="results">
</div>
