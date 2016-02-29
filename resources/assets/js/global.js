//$(document).foundation();
$(function() {

	//smooth scrolling:
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
			|| location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 500);
				return false;
			}
		}
	});

	// Form
	$('#contactform').submit(function(e) {

		var theformc = $(this);
		var subbtnc = theformc.find('button[type=submit]');
		e.preventDefault();
		var datac = theformc.serialize();
		subbtnc.attr("disabled", true);
		$.post('http://sugarstreetportland.com/contact', datac, function(data) {
			if (data == 'fail') {
				alert('Could not send email!  Please ensure that PHP\'s mail() is properly configured.');
				subbtnc.attr("disabled", false);
			} else if (data != 'success' && data != 201) {
				theformc.find('.errors').html(data).show();
				subbtnc.attr("disabled", false);
			} else {
				theformc.find('.errors').hide();
				theformc.find('.thanks').show();
			}
		});

		ga('send', 'event', 'Submit Form', 'Click', window.location.pathname);
	});

	// Newsletter
	$('#newsletter').submit(function(e) {
		var theform = $(this);
		var subbtn = theform.find('button[type=submit]');
		e.preventDefault();
		var data = theform.serialize();
		subbtn.attr("disabled", true);
		$.post('http://sugarstreetportland.com/newsletter', data, function(data) {
			if (data == 'fail') {
				alert('Could not send email!  Please ensure that PHP\'s mail() is properly configured.');
				subbtn.attr("disabled", false);
			} else if (data != 'success') {
				theform.find('.errors').html(data).show();
				subbtn.attr("disabled", false);
			} else {
				theform.find('.errors').hide();
				theform.find('.thanks').show();
			}
		});

		ga('send', 'event', 'Newsletter Signup', 'Click', window.location.pathname);
	});


// Event Tracking Google

// Phone
	$('.gaphone').click(function() {
		ga('send', 'event', 'Phone', 'Click', window.location.pathname);
	});
// Map (and address)
	$('.gamap').click(function() {
		ga('send', 'event', 'Map', 'Click', window.location.pathname);
	});
// Email click
	$('.gaemail').click(function() {
		ga('send', 'event', 'Email', 'Click', window.location.pathname);
	});

});

// GA
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-XXXXX', 'auto');
ga('send', 'pageview');
