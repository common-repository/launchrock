(function ($) {

	function data ($form) {
		var d = {};
		var e = {};
		$form.find('input[type=text],input[type=hidden]').each( function (index, item) {
			var i = $(item);
			var n = i.attr('name');
			if ( 'email' !== n && 'site_id' !== n ) {
				e[n] = i.val()
			} else {
				d[n] = i.val()
			}
		});

		d['extra_fields'] = JSON.stringify(e);
		return d;
	}

	function feedback(selector, form, message) {
		var fb = $(selector);

		if (0 === fb.length) {
			return alert(fallbackMessage);
		}

		fb
			.html( $(selector + '-template').html().replace(/{message}/gi, message) )
			.show();
		$(form).hide();
	}

	window.launchrock = function (form) {
		$.ajax('http://platform.launchrock.com/v1/createSiteUser', {
			data: data($(form)),
			error: function(xhr, status, error) {
				feedback('.launchrock.failure', form, 'LaunchRock didn\'t like this request, try again later!');
			},
			success: function(data, status, xhr) {

				var r = data[0].response;
				switch ( r.status ) {
					case 'OK':
						feedback('.launchrock.success', form, 'Thanks, you\'re on!');
						break;

					default:
						feedback('.launchrock.failure', form, r.error.error_message);
				}
			}
		});
	};
})(jQuery)