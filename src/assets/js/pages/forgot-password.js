$(function () {
	formResetPassword();
});
function formResetPassword() {
	$("#formFPassword").validate({
		rules: {
			email: {
				required: true,
				email: true,
				maxlength: 120,
			},
		},
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			if (element.parent(".input-group").length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		highlight: function (element) {
			$(element).addClass("is-invalid").removeClass("is-valid");
		},
		unhighlight: function (element) {
			$(element).addClass("is-valid").removeClass("is-invalid");
		},
		submitHandler: function (form, event) {
			event.preventDefault();
			if (confirm("Are you sure you want to reset your password?")) {
				const formData = new FormData(form);
				handleResetPassword(formData);
				swalLoadingOpen();
			}
		},
	});
}

function handleResetPassword(formData) {
	let msg = "";
	$.ajax({
		type: "POST",
		url: baseUrl + "auth/send_f_password",
		data: formData,
		dataType: "json",
		processData: false,
		contentType: false,
		success: function (response) {
			let status = response.status;
			msg = response.message;
			swalLoadingClose();
			if (status == "OK") {
				let reloadPage = true;
				swal
					.fire({
						icon: "success",
						title: "Success",
						text: msg,
						showCloseButton: true,
						showCancelButton: false,
						showConfirmButton: false,
						allowOutsideClick: false,
						allowEscapeKey: false,
					})
					.then((res) => {
						if (res.isDismissed == true && reloadPage == true) {
							location.reload();
						}
					});
			} else {
				swal.fire({
					icon: "error",
					title: "Failed",
					text: msg,
					showCloseButton: true,
					showCancelButton: false,
					showConfirmButton: false,
					allowOutsideClick: false,
					allowEscapeKey: false,
				});
			}
		},
		error: function (xhr, status, error) {
			alert(msg);
		},
	});
}
