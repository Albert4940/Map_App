(function($){
	var user = "";
	function htmlSingUpContent(){
		$('h1').text('SIGN UP');

		$('#signin-form').hide();
		$('#signup-form').show();

		$('#signin-link').show();
		$('#signup-link').hide();

	}

	function htmlSingInContent(){
		$('h1').text('SIGN IN');

		$('#signin-form').show();
		$('#signup-form').hide();

		$('#signin-link').hide();
		$('#signup-link').show();

	}

	$('#signin-link').on('click', function(e){
		e.preventDefault();
		htmlSingInContent();
	});
	$('#signup-link').on('click', function(e){
		e.preventDefault();
		htmlSingUpContent();
	});

	/*$('#signin-form').on('submit', function(e){
		e.preventDefault();
		var username = $('#signin-form input:eq(0)').val();
		var pass = $('#signin-form input:eq(1)').val();
		user = getUser(username,pass);
	    alert(user.userName +'-'+user.pass);

	});
	$('#signup-form').on('submit', function(e){
		e.preventDefault();
		let fullName = $('#signup-form input:eq(0)').val();
		let username = $('#signup-form input:eq(1)').val();
		let pass = $('#signup-form input:eq(2)').val();

		user = addUser(fullName,username,pass);

		//setCookie("username", user.userName, 365);
		//alert(user.userName);
	});*/

})(jQuery)