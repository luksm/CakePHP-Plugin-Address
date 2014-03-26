<?php
echo $this->Html->Script(
    "//code.jquery.com/jquery-1.10.2.min.js",
    array('inline' => false)
);
echo $this->Html->Script(
    "Address.address",
    array('inline' => false)
);

$js = <<<EOD
var webroot = "{$this->webroot}";
var lastZip = "";

function createField(data) {
    var div = document.getElementById("zipFinderResults");

    console.log(data);
    // div.textNode = ;
}

$( document ).ready(function() {
    $("#zipFinder").keyup(function() {
        if (lastZip != this.value) {
            lastZip = this.value;
            zip(this.value, createField);
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

echo $this->Form->input('zip', array("id" => "zipFinder",  "autocomplete" => "off"));
?>

<div id="zipFinderResults">
</div>
