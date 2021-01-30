$(function(){
	$.validator.addMethod(
		'strongPassword', 
		function(value, element) {
		return this.optional(element) || value.length >= 8 && /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(value);
	}, "Password can't be empty, minimum eight characters, at least one letter, one number.");
jQuery.validator.addMethod("noSpace", function(value, element) { 
  return value.indexOf(" ") < 0 && value != ""; 
}, "No space please and don't leave it empty");

	$("#edit-form").validate({
		rules: {
			name: {
				required: true
			},
			username: {
				required: true,
			},
			password: {
				required: true,
				strongPassword: true
			},
			number_phone: {
				required: true
			},
			email: {
				email: true
			},
			address: {
				required: true
			}
		},
		messages: {
			name: {
				required: 'Name is incorrect'
			},
			email: {
				email: 'Please enter a <em>valid</em> mail address'
			},
			username: {
				required: 'Username field is required'
			},
			password: {
				required: 'Password field is required'
			},
			number_phone: {
				required: 'Number Phone field is required'
			},
			address: {
				required: 'Address field is required'
			}
		}
	});
});