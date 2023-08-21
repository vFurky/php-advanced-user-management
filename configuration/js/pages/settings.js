/*----------------------------------------------
	File Name: settings
	For-Page: settings
	Description: For Settings Authentication.
	---------------------------------------------
	Project Name: SLTax
	Project Description: User Account Management and Login & Register Script
------------------------------------------------*/

(() => {
	'use strict';

	var forms = document.querySelectorAll('.settings-validation');

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

			var firstname = document.getElementById("userFirstName").value;
			var lastname = document.getElementById("userLastName").value;
			var orgname = document.getElementById("userOrgName").value;
			var location = document.getElementById("userLocation").value;
			var telephone = document.getElementById("userPhone").value;
			var gender = document.getElementById("userGender").value;
			var bio = document.getElementById("userBio").value;
			var language = document.getElementById("userLanguage").value;

			errorMessage.innerHTML = "";
			successMessage.innerHTML = "";
			xhr.open('POST', 'settings', true);
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.onreadystatechange = function () {
				if (xhr.readyState === 4 && xhr.status === 200) {
					var response = xhr.responseText;
					if (response === '20001') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a first name.';
					} else if(response === '20002') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a last name.';
					} else if(response === '20004') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a location.';
					} else if(response === '20005') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a valid telephone number, max 10 digits.';
					} else if(response === '20006') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please select a valid gender.';
					} else if(response === '20007') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please enter a biography.';
					} else if(response === '20008') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Please select a valid language.';
					} else if(response === '90000') {
						errorMessage.style.display = 'block';
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> An oops has occurred in the database.';
					} else if(response === '10000') {
						errorMessage.innerHTML = "";
						successMessage.style.display = 'block';
						document.getElementById('successmessage').innerHTML = '<i data-feather="check"></i> Your changes have been successfully updated!';
					} else {
						errorMessage.innerHTML = "";
						document.getElementById('errormessage').innerHTML = '<i data-feather="x"></i> Unknown error..';
					}
				};
			};
			var params = 'firstname=' + encodeURIComponent(firstname) + '&lastname=' + encodeURIComponent(lastname) + '&orgname=' + encodeURIComponent(orgname) + '&location=' + encodeURIComponent(location) + '&telephone=' + encodeURIComponent(telephone) + '&gender=' + encodeURIComponent(gender) + '&bio=' + encodeURIComponent(bio) + '&language=' + encodeURIComponent(language);
			xhr.send(params);

			event.preventDefault();
		});
	});
	
})();