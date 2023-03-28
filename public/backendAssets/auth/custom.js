$(document).ready(function(e) {
	//
});

// AJAX RUN
var runAjax = (function (i = null, ii = null, type = 'POST'){
	if(i == ''){ return; }
	ii.append('visit_from', 'web');
	ii.append('_token', token);
	var ob = jQuery.ajax({
		url: i,
		type: type,
		enctype: 'multipart/form-data',
		contentType: 'application/json; charset=UTF-8',
		processData: false,
		contentType: false,
		data: ii,
		cache: false,
		async: false,
		success: function (response) {
		},
	}).responseText;
	return jQuery.parseJSON(ob);
});


// REGISTRATION
function registerUser(){
	var data = new FormData();
	data.append('name', $('.registration-form #name').val());
	data.append('email', $('.registration-form #email').val());
	data.append('phone_number', $('.registration-form #phone_number').val());
	data.append('password', $('.registration-form #password').val());
	data.append('confirm_password', $('.registration-form #confirm_password').val());
	var response = runAjax(SITE_URL + '/register-user', data);
	if(response.status == '200'){
		swal.fire({ 
			type: 'success',
			title: response.message,
			html: response.data.html,
			onClose: function () {
				window.location.href = SITE_URL + '/login';
			}
		});
		
	}else if(response.status == '422'){
		$('.validation-div').text('');
		$.each(response.error, function( index, value ) {
			$('#val-'+index).text(value);
		});
		
	} else if(response.status == '201'){
		$('.validation-div').text('');
		swal.fire({title: response.message,type: 'error'});
	}
}

// LOGIN
function loginUser(){
	var data = new FormData();
	data.append('email', $('.ai-signin #exampleEmail').val());
	data.append('password', $('.ai-signin #examplePassword').val());
	var response = runAjax(lgnurl, data);
	if(response.status == '200'){
		swal.fire({ type: 'success', title: response.message, showConfirmButton: false, timer: 1500 });
		setTimeout(function(){ location.reload(); }, 2000);
	}else if(response.status == '422'){
		$('.validation-div').text('');
		$.each(response.error, function( index, value ) {
			$('#val-'+index).text(value);
		});
	} else if(response.status == '201'){
		$('.validation-div').text('');
		swal.fire({title: response.message,type: 'error'});
	}else{
		setTimeout(function(){ location.reload(); }, 2000);
	}
}