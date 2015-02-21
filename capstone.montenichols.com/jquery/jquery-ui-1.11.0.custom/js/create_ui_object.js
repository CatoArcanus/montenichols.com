var objects = new Array();
var debug = true;

$.getJSON( "weapon_1.json", function( data ) {
	
	//placeholder
	var tab = "";
	//the title of the object
	var title = "weapon_object";	
	//Add the weapon to the objects array
	objects.push(title);	
	
	//Add the title for the dialogBox
	addTitle(title);
	addComponents(title);	
	var prefix = 'data';
	//recursively go through the object
	iter(data, tab, title, prefix, prefix);
	console.log(objects);
	//This sets up the accoridan for all objects
	for ( i = 0; i < objects.length; i++) { 
		console.log(objects[i]);
		createAccordian(objects[i]);
	}

	//Add submit button
	//addSubmitButton(title);

	//Called to give the accordian property to all objects
	function createAccordian(objectName) {
		$( "#"+ objectName + "-components" ).accordion({
			collapsible: true,
			heightStyle: "content"
		});
	}
	
	//Put everything we made into a box
	createDialog(title);
	allowSubmit();	
});

//Recursively travel a JSON object and make a bunch of fancy divs
function iter(data, t, title, prefix, id) {
	//Simple for loop
	for (var key in data) {
		//Go through each property of the object
		if(data.hasOwnProperty(key)) {
			//If it is a object, we add it in the objects[] buffer for later and we recursively go deeper
			//If it is an array, we don't accordian the array values
			if(typeof(data[key]) == 'object') {
				console.log(key + " ->");
				addDynamicContent('<p class="'+t+'">' + key + " : " + typeof(data[key]) +  " =>" + '</p>');
				addComponent(key, typeof(data[key]), "", title, title);
				if(data[key][0] == null)
				{
					console.log(data[key][0]);
					objects.push(key);
					console.log(objects);
				}
				//recrusively call this function
				iter(data[key], (t+"indent"), key, prefix + '[' + title + ']', prefix + '-' + title);
			} else {
				console.log(key + " -> " + data[key]);
				//If value of an array we just add it to the panel
				//else: we add an accordian header and value selector 
				if(!isNaN(key)) {
					addDynamicContent('<p>gotcha!</p>');
					addValue(key, typeof(data[key]), data[key], title);
				} else {
					addDynamicContent('<p class="'+t+'">' + key + " : " + typeof(data[key]) + " => " + data[key] + '</p>');
					addComponent(key, typeof(data[key]), data[key], title, prefix + '[' + title + ']' + '[' + key + ']', prefix + '-' + title + '-' + key);
				}
			}
		}
	}
}

function createDialog(s) {
	$( "#"+s ).dialog({
		/*open: function(event, ui) {
			var dlg = $(event.target).parent();
		var container = $('#containment-wrapper');
		dlg.draggable("option", "containment", container).appendTo(container);
		$(this).dialog("option", "position", "center");
		},   			
		height: 400,*/
		width: 600
	})
}

function addDynamicContent(s) {
	if(debug) {
		var div = $("#dynamic-object");
		div.append(s);
	}
}

function addDynamicSuperContent(s) {
	var div = $("#dynamic-object");
	div.append(s);
}

function addTitle(s) {
	var div = $("#dynamic-object");
	div.append(
		'<form action="" method="post" id="' + s + '" title="' + s + '">\n\n\
			<input type="submit" id="' + s + '-submit" title="' + s + '"> submit ' + s + '</input>\n\n\
		</form>');
}

function allowSubmit() {
    $('#weapon_object').submit(function() {
        //$('#result').text(JSON.stringify($('#weapon_object').serializeObject()));
        //$('#result').text($('#weapon_object').serializeArray());
        $('#result').text($('#weapon_object').serializeJSON());
        return false;
    });
}

/*function addSubmitButton(s) {
	var div = $("#dynamic-object");
	div.append('<button id="' + s + '-submit" title="' + s + '"> submit ' + s + '</button>');
}*/

function addComponents(s) {
	var div = $("#" + s);
	div.append('<div id="' + s + '-components">\n\n</div>');
}

function addValue(property, type, value, title) {
	var div = $("#" + title + "-components");
	div.append('<p id="' + title + '-' + property + '">' + property + ' : ' + type + ' = ' + value +'</p>\n');				
}

function addComponent(property, type, value, title, prefix , id) {
	console.log(property +','+ type +',' + value + ',' + title + ',' + prefix);
	var div = $("#" + title + "-components");
	
	//div.append($dynalabel);
	//var $dynaInput = $('<input type="text" name="user_name_' + 1 + '" id="id_' + 1 + '"/>');
	//div.append($dynaInput);
	var dynamicContent = "";
	var textFields = [
		{
			label: id + "-min",
			text: "min",
			defaultValue: 0
		}, 
		{
			label: id + "-max",
			text: "max",
			defaultValue: (value * 2)
		}, 
		{
			label: id + "-step",
			text: "step",
			defaultValue: 1
		}, 
		{
			label: id + "-segments",
			text: "segments",
			defaultValue: (value * 2)
		}
	];
	
	var check = [
		{
			text : "bValue_as_textfield", 
			type : "checkbox", 
			name : "bValue_as_textfield", 
			label : id + "-bValue_as_textfield",
			fields : [
				false,	//min
				false,	//max
				false,	//step
				false	//segments
			] 
		},
		{ 
			text : "bSpinner", 
			type : "checkbox", 
			name : "bSpinner", 
			label : id + "-bSpinner",
			fields : [
				true,	//min
				true,	//max
				true,	//step
				false	//segments
			]  
		},
		{ 
			text : "slider", 
			type : "radio", 
			name : "barType", 
			label : id + "-spinner",
			fields : [
				true,	//min
				true,	//max
				true,	//step
				false	//segments
			]  
		},
		{ 
			text : "progressBar",
			type : "radio",
			name : "barType",
			label : id + "-progressBar",
			fields : [
				false,	//min
				true,	//max
				true,	//step
				false	//segments
			]   
		},
		{ 
			text : "segmentedBar",
		 	type : "radio", 
		 	name : "barType",
		 	label : id + "-segmentedBar",
			fields : [
				false,	//min
				true,	//max
				true,	//step
				true	//segments
			] 
		}
	];
	
	var maxName = "max";
	var displayEqual = "";
	if (type != "object") {
		displayEqual = ' = ';
		
		dynamicContent += '<input type="hidden" value="' + value + '" id="'+ id + '-value" name="' + prefix + '[value]"></input>';
		dynamicContent += '<input type="hidden" value="' + type + '" id="'+ id + '-type" name="' + prefix + '[type]"></input>';
		
		for ( i = 0; i < textFields.length; i++) { 
			var label = textFields[i].label;
			var text = textFields[i].text;
			var defaultValue = textFields[i].defaultValue;
			dynamicContent += '<label for="' + label + '"> ' + text + ': </label>';
			dynamicContent += '<input type="text" value="' + defaultValue + '" id="'+ label + '" class="style-input" name="' + prefix + '[' + text + ']"></input>';
		}

		for ( i = 0; i < check.length; i++) { 
			var label = check[i].label;
			var inputType = check[i].type;
			var checkName = check[i].name;
			var text = check[i].text;
			if(inputType === 'checkbox') {
				dynamicContent += '<br><input type="' + inputType +'" value="true" id="' + label + '" name="' + prefix + '[' + checkName + ']"></input>';
			} else {
				dynamicContent += '<br><input type="' + inputType +'" value="'+ text + '" id="' + label + '" name="' + prefix + '[' + checkName + ']"></input>';
			}
				dynamicContent += '<label for="' + label + '"> ' + text + '</label>';
		}
	}

	div.append('<h3>' + property + ' : ' + type + displayEqual + value +'</h3>\n\
					<div>\n'+ dynamicContent +'\
						<div id="' + property + '-components">\n\
						</div>\n\
					</div>');
	
	if (type != "object") {
		//setUpMiniMax(check, id, textFields);
	}
}

/*
 * This shit doesn't work.
 * Basically, I can't set up objects like this, it just derps
 * Need to find another way for these things to work.
 * or, just fuck it, everything needs min, max, step, and segments
 */

function setUpMiniMax( check, id, textFields ) {
	for ( i = 1; i < /*check.length*/2; i++) { 
		var label = check[i].label;
		var inputType = check[i].type;
		var checkName = check[i].name;
		var text = check[i].text;
		console.log('#' + label);
		console.log($('#' + label).length);
		$( '#' + label).change(function() {
			console.log(check);
			console.log(check[i]);
			console.log(check[i].fields);
			console.log('#' + label);
			console.log("change");
			if( $( "#" + label ).prop('checked')) {
				console.log("check_now");
				console.log(check);
				console.log(check[i]);
				console.log(check[i].fields);
				$('#' + label).attr('checked','checked');
				for( j = 0; j < check[i].fields.length; j++) {
					console.log(textFields[j].label);
					console.log(check[i].fields[j]);
					if(check[i].fields[j]) {
						$('#' + textFields[j].label).removeAttr('disabled');
					}
				} 
			} else {
				console.log("uncheck_now");
				$('#' + label).removeAttr('checked');
				for( j = 0; j < check[i].fields.length; j++) {
					console.log(textFields[j].label);
					console.log(check[i].fields[j]);
					if(check[i].fields[j]) {
						$('#' + textFields[j].label).attr('disabled', 'disabled');
					}
				}
			}
		});
	}
}