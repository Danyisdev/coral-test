$(function () {
	$("#tpl").on("click", function () {
		const ip = $("#password");
		const itp = $("#itp");
		togglePassword(ip, itp);
	});

	$("#tplc").on("click", function () {
		const ipc = $("#passwordConfirm");
		const itpc = $("#itpc");
		togglePassword(ipc, itpc);
	});

	changePasswordValidation();
});

function changePasswordValidation() {
	$("#resetPassword").validate({
		rules: {
			password: {
				required: true,
				minlength: 6,
				maxlength: 8,
			},
			confirm_password: {
				required: true,
				equalTo: "#password",
			},
		},
		messages: {
			confirm_password: {
				equalTo: "Passwords don't match",
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
			} else {
				return false;
			}
			const formData = new FormData(form);
			handleChangePassword(formData);
		},
	});
}

function handleChangePassword(formData) {
	swalLoadingOpen();
	$.ajax({
		type: "POST",
		url: baseUrl + "auth/update_password",
		data: formData,
		dataType: "json",
		processData: false,
		contentType: false,
		success: function (response) {
			const status = response.status;
			const message = response.message;
			const nextPage = response.nextPage;
			swalLoadingClose();
			if (status == "OK") {
				swal
					.fire({
						icon: "success",
						title: "Success",
						text: message,
						showConfirmButton: true,
						allowOutsideClick: false,
						allowEscapeKey: false,
						confirmButtonText: "Back to login",
					})
					.then((res) => {
						if (res.isConfirmed) {
							window.location = nextPage;
						}
					});
			} else if (status == "error") {
				swal.fire({
					icon: "error",
					title: "An Error Occured",
					text: message,
					showCloseButton: true,
					showCancelButton: false,
					showConfirmButton: false,
					allowOutsideClick: false,
					allowEscapeKey: false,
				});
			}
		},
		error: function (error, xhr) {
			swalLoadingClose();
			alert("An error occurred. Please check your connection and try again.");
			console.error("AJAX Error:");
			console.error("Status Code: " + xhr.status);
			console.error("Status Text: " + xhr.statusText);
		},
	});
}
