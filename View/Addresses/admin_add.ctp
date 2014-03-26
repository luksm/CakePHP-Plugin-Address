<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
    <fieldset>
        <legend><?php echo __d('address', 'Admin Edit Address'); ?></legend>
    <?php
    
        echo $this->Form->input('zip', array("label" => __d('address', "Zip")));
        echo $this->Form->input('information', array("label" => __d('address', "Information")));
        echo $this->Form->input('address', array("label" => __d('address', "Address")));
        echo $this->Form->input('state_id', array("label" => __d('address', "City")));
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

    zip = zip.substr(0,5) + zip.substr(6,3);

    if(xhr && xhr.readystate != 4){
        xhr.abort();
    }

    xhr = $.ajax({
        url: "http://cep.correiocontrol.com.br/" + zip + ".json",
        dataType: "json"
    })
    .done(function(data) {
        console.log(data);
    });
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