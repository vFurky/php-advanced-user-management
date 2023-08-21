/*----------------------------------------------
	File Name: 2fa
	For-Page: 2fa
	Description: For 2FA Authentication.
	---------------------------------------------
	Project Name: SLTax
	Project Description: User Account Management and Login & Register Script
------------------------------------------------*/

(() => {
	'use strict'

	var forms = document.querySelectorAll('.twofactor-validation');

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
			var twofactor_code = document.getElementById('twofactorCdoe').value;

			errorMessage.innerHTML = "";
			successMessage.innerHTML = "";
			xhr.open('POST', '2fa', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.onreadystatechange = function() {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var response = xhr.responseText;
					if(response === '20000') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> You entered the wrong 2FA code.';
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
			var params = 'twofactor_code=' + encodeURIComponent(twofactor_code);
			xhr.send(params);

			event.preventDefault();
		});
	});

})();