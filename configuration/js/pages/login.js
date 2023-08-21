/*----------------------------------------------
	File Name: login
	For-Page: login
	Description: For Login Authentication.
	---------------------------------------------
	Project Name: SLTax
	Project Description: User Account Management and Login & Register Script
------------------------------------------------*/

(() => {
	'use strict'

	var forms = document.querySelectorAll('.login-validation');

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
			var username = document.querySelector('input[name="login-username"]').value;
			var password = document.querySelector('input[name="login-password"]').value;

			errorMessage.innerHTML = "";
			successMessage.innerHTML = "";
			xhr.open('POST', 'login', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var response = xhr.responseText;
					if(response === '10001') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a username.';
					} else if(response === '10002') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a password.';
					} else if(response === '10003') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> No account found matching this information.';
					} else if(response === '50000') {
						errorMessage.innerHTML = "";
						successMessage.style.display = 'block';
						document.getElementById('successmessage').innerHTML = '<i data-feather="check"></i> Login successful, you are being redirected...';
						setTimeout(function() {
							window.location.href = '2fa';
						}, 3000);
					} else if(response === '10000') {
						errorMessage.innerHTML = "";
						successMessage.style.display = 'block';
						document.getElementById('successmessage').innerHTML = '<i data-feather="check"></i> Login successful, you are being redirected...';
						setTimeout(function() {
							window.location.href = 'homepage';
						}, 3000);
					}
				};
			};
			var params = 'login-username=' + encodeURIComponent(username) + '&login-password=' + encodeURIComponent(password);
			xhr.send(params);

			event.preventDefault();
		});
	});

})();