/*----------------------------------------------
	File Name: security
	For-Page: security
	Description: For Security Authentication.
	---------------------------------------------
	Project Name: SLTax
	Project Description: User Account Management and Login & Register Script
------------------------------------------------*/

(() => {
	'use strict';

	var forms = document.querySelectorAll('.security-validation');
	var deleteCheckbox = document.getElementById('checkboxConfirm');
	var deleteButton = document.getElementById('deleteAccount');
	var twofactor_button = document.getElementById('twofactorButton');

	Array.from(forms).forEach(form => {
		form.addEventListener('submit', e => {
			if (!form.checkValidity()) {
				e.preventDefault();
				e.stopPropagation();
			}

			form.classList.add('was-validated');
		}, false);
	});

	forms.forEach(function (form) {
		form.addEventListener('submit', function (event) {
			var xhr = new XMLHttpRequest();
			var errorMessage = document.getElementById('errormessage');
			var successMessage = document.getElementById('successmessage');

			var currentpassword = document.getElementById("userCurrentPassword").value;
			var newpassword = document.getElementById("userNewPassword").value;
			var newrepassword = document.getElementById("userNewRepassword").value;

			errorMessage.innerHTML = "";
			successMessage.innerHTML = "";
			xhr.open('POST', 'security', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var response = xhr.responseText;
					if (response === '20000') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a current password.';
					} else if(response === '20001') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Your current password is not correct.';
					} else if(response === '20002') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a new password.';
					} else if(response === '20003') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a password longer than 6 digits.';
					} else if(response === '20004') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please re-enter the password.';
					} else if(response === '20005') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Passwords don\'t match.';
					} else if(response === '90000') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> An oops has occurred in the database.';
					} else if(response === '10000') {
						errorMessage.innerHTML = "";
						successMessage.style.display = 'block';
						document.getElementById('successmessage').innerHTML = '<i data-feather="check"></i> Your password has been successfully changed and your session has been terminated.';
						setTimeout(function() {
							window.location.href = 'logout';
						}, 5000);
					} else {
						errorMessage.innerHTML = "";
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Unknown error..';
					}
				};
			};
			var params = 'currentpassword=' + encodeURIComponent(currentpassword) + '&newpassword=' + encodeURIComponent(newpassword) + '&newrepassword=' + encodeURIComponent(newrepassword);
			xhr.send(params);

			event.preventDefault();
		});
	});

	deleteCheckbox.addEventListener('change', function() {
		if (this.checked) {
			deleteButton.disabled = false;
		} else {
			deleteButton.disabled = true;
		}
	});

	deleteButton.addEventListener('click', function() {
		Swal.fire({
			title: 'Warning',
			text: 'Are you sure you want to delete your account? This process is irreversible!',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes',
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "./delete-account.php",
					type: "POST",
					success: function (response) {
						Swal.fire({
							title: "Process completed!",
							text: "Your account has been successfully deleted.",
							icon: "success",
							timer: 5000,
							confirmButtonText: 'Ok'
						}).then(() => {
							window.location.href = 'logout';
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			}
		})
	});

	twofactor_button.addEventListener('click', function() {
		Swal.fire({
			title: 'Warning',
			text: 'Are you sure you want to change the 2-factor authentication status?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes',
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "./change-2fa.php",
					type: "POST",
					success: function (response) {
						Swal.fire({
							title: "Process completed!",
							text: "The 2-factor authentication status has been successfully changed.",
							icon: "success",
							timer: 5000,
							confirmButtonText: 'Ok'
						}).then(() => {
							window.location.reload();
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			}
		})
	});

	
})();