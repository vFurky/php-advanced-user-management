/*----------------------------------------------
	File Name: register
	For-Page: register
	Description: For Register Authentication.
	---------------------------------------------
	Project Name: SLTax
	Project Description: User Account Management and Login & Register Script
------------------------------------------------*/

(() => {
	'use strict'

	var forms = document.querySelectorAll('.register-validation')

	Array.from(forms).forEach(form => {
		form.addEventListener('submit', e => {
			if (!form.checkValidity()) {
				e.preventDefault();
				e.stopPropagation();
			};

			form.classList.add('was-validated');
		}, false);
	})

	forms.forEach(function(form) {
		form.addEventListener('submit', function(event) {
			var xhr = new XMLHttpRequest();
			var errorMessage = document.getElementById('errormessage');
			var successMessage = document.getElementById('successmessage');
			var username = document.querySelector('input[name="register-username"]').value;
			var email = document.querySelector('input[name="register-email"]').value;
			var password = document.querySelector('input[name="register-password"]').value;
			var repassword = document.querySelector('input[name="register-repassword"]').value;

			errorMessage.innerHTML = "";
			successMessage.innerHTML = "";
			xhr.open('POST', 'register', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var response = xhr.responseText;
					if(response === '10001') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a username.';
					} else if(response === '10011') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> This username is already registered.';
					} else if(response === '10004') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter an E-Mail address.';
					} else if(response === '10024') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a valid E-Mail address.';
					} else if(response === '10014') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> This e-mail address is already registered.';
					} else if(response === '10002') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter the password.';
					} else if(response === '10012') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a password longer than 6 digits.';
					} else if(response === '10102') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please re-enter the password.';
					} else if(response === '10112') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Passwords do not match.';
					} else if(response === '90077') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> An oops has occurred in the database.';
					} else if(response === '90078') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Multiple oops has occurred in the database.';
					} else if(response === '10000') {
						errorMessage.innerHTML = "";
						successMessage.style.display = 'block';
						document.getElementById('successmessage').innerHTML = '<i data-feather="check"></i> Register successful, you are being redirected...';
						setTimeout(function() {
							window.location.href = 'login';
						}, 3000);
					}
				};
			};
			var params = 'register-username=' + encodeURIComponent(username) + '&register-email=' + encodeURIComponent(email) + '&register-password=' + encodeURIComponent(password) + '&register-repassword=' + encodeURIComponent(repassword);
			xhr.send(params);

			event.preventDefault();
		});
	});
	
})();