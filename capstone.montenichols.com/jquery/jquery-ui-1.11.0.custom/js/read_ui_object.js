//var objects = new Array();
var debug = true;

$.getJSON( "weapon_1_ui.json", function( data ) {
	
	//placeholder
	var tab = "";
	//the title of the object
	var title = "weapon_ui_object";	
	//Add the weapon to the objects array
	//objects.push(title);	
	//Add the title for the dialogBox
	addTitle(title);
	//addComponents(title);	
	var prefix = 'data';
	//recursively go through the object
	data = data.data.weapon_object;
	iterate(data, tab, title, prefix);
	//console.log(objects);
	//This sets up the accoridan for all objects
	// for ( i = 0; i < objects.length; i++) { 
	// 	console.log(objects[i]);
	// 	createAccordian(objects[i]);
	// }

	//Add submit button
	//addSubmitButton(title);

	//Called to give the accordian property to all objects
	// function createAccordian(objectName) {
	// 	$( "#"+ objectName + "-components" ).accordion({
	// 		collapsible: true,
	// 		heightStyle: "content"
	// 	});
	// }
	
	//Put everything we made into a box
	createDialog(title);
	// allowSubmit();	
});

//Recursively travel a JSON object and make a bunch of fancy divs
function iterate(data, t, title, id) {
	//Simple for loop
	for (var key in data) {
		//Go through each property of the object
		if(data.hasOwnProperty(key)) {
			//If it is a object, we add it in the objects[] buffer for later and we recursively go deeper
			//If it is an array, we don't accordian the array values
			if(typeof(data[key]) == 'object') {
				console.log(key + " ->");
				addDynamicContent('<p class="'+t+'">' + key + " : " + typeof(data[key]) +  " =>" + '</p>');
				addLabel(key, title, id + '-' + title + '-' + key);
				//addComponent(key, typeof(data[key]), "", title, title);
				if(data[key][0] == null)
				{
					//console.log(data[key][0]);
					//objects.push(key);
					//console.log(objects);
				}
				//recrusively call this function
				iterate(data[key], (t+"indent"), key, id + '-' + title + '-' + key);
			} else {
				console.log(key + " -> " + data[key]);
				//If value of an array we just add it to the panel
				//else: we add an accordian header and value selector 
				if(!isNaN(key)) {
					addDynamicContent('<p>gotcha!</p>');
					//addValue(key, typeof(data[key]), data[key], title);
				} else {
					addDynamicContent('<p id="' + id + '-' + key + '"class="'+t+'">' + key + " : " + typeof(data[key]) + " => " + data[key] + '</p>');
					//addComponent(key, typeof(data[key]), data[key], title, prefix + '[' + title + ']' + '[' + key + ']', prefix + '-' + title + '-' + key);
				}
			}
		}
	}
}

function addDynamicContent(s) {
	if(debug) {
		var div = $("#dynamic-object");
		div.append(s);
	}
}

function addTitle(s) {
	var div = $("#dynamic-object");
	div.append( '<div id="' + s + '" title="' + s + '"></div>');
}

function addLabel(property, title, id) {
	var div = $("#"+title);
	div.append('<div id="'+id+'">\
		<label for="' + id + '-value">' + property + ':</label>\n\
		</div>');
}

function addData(property, title, id) {
	var div = $("#"+title);
	div.append('<div id="'+id+'">\
		<label for="' + id + '-value">' + property + ':</label>\n\
		</div>');
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