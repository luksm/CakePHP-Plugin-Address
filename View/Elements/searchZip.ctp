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
var id = "{$id}";
var name = "{$name}";

function createField(data) {
	var div = document.getElementById("zipFinderResults");
	var total = data.length;
	var c = 0;

	// Get a reference to the parent element

	var theFirstChild = div.firstChild;

	for (c; c < total; c++) {
		var d = data[c];

		var input = document.createElement("input");
		var label = document.createElement("label");

		input.type = "radio";
		input.required = "required"
		input.value = d.Address.id;
		input.id = id + d.Address.id;
		input.name = name;

		label.htmlFor = id + d.Address.id;
		label.textContent = d.Address.information + " - " + d.Neighbourhood.neighbourhood + " - " + d.Neighbourhood.City.city + " - " + d.Neighbourhood.City.State.fu;

		// Insert the new element into the DOM before theFirstChild
		div.insertBefore(label, theFirstChild);
		div.insertBefore(input, label);
	}
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

<div id="zipFinderResults" class="input radio required">
	<span id="placeHolder"></span>
</div>
