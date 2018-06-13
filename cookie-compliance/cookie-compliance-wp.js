(function($) {
	
	$(document).ready(function() {

		var strCookieName = "cookie-compliance";
		var strApprovedVal = "approved";
	
		var cookieVal = readCookie(strCookieName);
		var displayMsg = $('#cookieMessageWrapper');
	
		if (cookieVal != strApprovedVal) {
			setTimeout(function() { displayMsg.slideDown(200); }, 200);
			toggleCookieClasses('add');
		} else if (!displayMsg.is(':hidden')) {
			displayMsg.slideUp();
			toggleCookieClasses('remove');
		};
	
		$('#cookieClose').click(function() {
			displayMsg.slideUp();
			toggleCookieClasses('remove');
			createCookie(strCookieName, strApprovedVal, 365);
		});
	});
	
	//Site Specific Classes to Toggle
	function toggleCookieClasses(flag) {
		$('#module-fixed-header-overlay')[flag + 'Class']('top-extra-space');
		$('#responsive-bar')[flag + 'Class']('top-extra-space');
		$('.responsive-menu')[flag + 'Class']('menu-top-extra');
	}

	//Cookie functions
	function createCookie(name, value, days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
		}
		else var expires = "";
		document.cookie = name + "=" + value + expires + "; path=/";
	}
	
	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}
	
	function eraseCookie(name) {
		createCookie(name, "", -1);
	}
	
})(jQuery);