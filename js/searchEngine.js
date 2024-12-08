/**
 * Project: JMark
 * Script: Create HTML out of JSON file.
 * Author: adriannowak.net
 * 
 **/

// Settings
var delayInMilliseconds = 1000; //1 second

// Engine - Get data from json file and present is in HTML
setTimeout(function() {
	$.getJSON('data.json', function(data) {
		var output = '';
		
		$.each(data, function(key, val) {
			output += '<a class="" href="';
			output += val.URL;
			output += '"><div class="rounded-3 bookmark"><p class="info">';
			output +=  val.title;
			output +=  ' | ';
			output +=  val.info;
			output += '</p><p class="small link">'
			output += val.category;
			output += ' | '
			output += val.URL;
			output += '</p></div></a>'	
		});
		if (output == '') {
			output = 'No Results';
		};

		//Hide loading animation and show results.
		$('#update').hide().html(output).fadeIn('slow');

	}); //get JSON
}, delayInMilliseconds);

// Engine - Change HTML on search input.
$('#search').keyup(function() {
	var searchField = $('#search').val();
	var myExp = new RegExp(searchField, "i");
	$.getJSON('data.json', function(data) {
		var output = '';
		
		$.each(data, function(key, val) {
			if ((val.title.search(myExp) != -1) || (val.info.search(myExp) != -1) || (val.category.search(myExp) != -1)) {

				output += '<a class="" href="';
				output += val.URL;
				output += '"><div class="rounded-3 bookmark"><p class="info">';
				output +=  val.title;
				output +=  ' | ';
				output +=  val.info;
				output += '</p><p class="small link">'
				output += val.category;
				output += ' | '
				output += val.URL;
				output += '</p></div></a>'
			}
		});
		if (output == '') {
			output = '<p class="text-align:center;">No Results</p>';
		};
		output += '';
		$('#update').html(output);
	}); //get JSON
});
