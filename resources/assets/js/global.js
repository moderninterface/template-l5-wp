$(function() {
	$('#newsletter-form').submit(function(e) {
		e.preventDefault();

		var $form = $(this);
		var $button = $form.find('button[type=submit]');
		$button.attr('disabled', true);
		$.post($form.attr('action'), $form.serialize(), function(data) {
			if (data == 'fail') {
				alert('Could not send email!  Please ensure that PHP\'s mail() is properly configured.');
				$button.attr('disabled', false);
			} else if (data != 'success') {
				$form.find('.errors').html(data).show();
				$button.attr('disabled', false);
			} else {
				$form.find('.errors').hide();
				$form.find('.thanks').show();
			}
		});

		//ga('send', 'event', 'Newsletter Signup', 'Click', window.location.pathname);
	});
});
