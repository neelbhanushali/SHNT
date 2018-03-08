/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

$.fn.extend({
	loading: function() {
		var form = $(this);
		$(form).find('fieldset.form-fieldset').attr('disabled', 'disabled');
		$(form).find('button[type=submit]').append('<i class="material-icons loading right">refresh</i>');
	},
	done: function() {
		var form = $(this);
		$(form).find('fieldset.form-fieldset').removeAttr('disabled');
		$(form).find('button[type=submit] i.material-icons.loading').remove();
		$(form)[0].reset();
	}
});