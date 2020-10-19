require('easy-autocomplete')

var options = {
	
	url: function(phrase) {
		return easyroute
	},
	
	getValue: function(element) {
		return element.text;
	},
	
	ajaxSettings: {
		dataType: "json",
		method: "POST",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		data: {
			dataType: "json"
		}
	},
	
	preparePostData: function(data) {
		data.phrase = $('[name="search"]').val();
		return data;
	},

	/*template: {
		type: "description",
		fields: {
			description: "titleC"
		}
	},*/
	template: {
		type: "links",
		fields: {
			link: `link`,
		}
	},
	
	requestDelay: 400
};

$('[name="search"]').easyAutocomplete(options);