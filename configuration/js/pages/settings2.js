(() => {
	'use strict'

	var form = $('.validate-form'),
	accountUploadImg = $('#account-upload-img'),
	accountUploadBtn = $('#account-upload'),
	accountUserImage = $('.uploadedAvatar'),
	accountResetBtn = $('#account-reset');

	if (accountUserImage) {
		var resetImage = accountUserImage.attr('src');
		accountUploadBtn.on('change', function (e) {
			var reader = new FileReader(),
			files = e.target.files;
			reader.onload = function () {
				if (accountUploadImg) {
					accountUploadImg.attr('src', reader.result);
				}
			};
			reader.readAsDataURL(files[0]);
		});

		accountResetBtn.on('click', function () {
			accountUserImage.attr('src', resetImage);
		});
	}

})();