$(function () {
	loadRegistValidation();
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
});

function loadRegistValidation() {
	$("#formRegist").validate({
		rules: {
			username: {
				required: true,
				maxlength: 50,
			},
			email: {
				required: true,
				email: true,
				maxlength: 120,
			},
			password: {
				required: true,
				minlength: 6,
				maxlength: 8,
			},
			confirm_password: {
				required: true,
				equalTo: "#password",
			},
			profile_picture: {
				required: true,
				fileSize: 3097152, //byte
				accept: "image/png,image/jpeg,image/jpg",
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
			} else if (element.attr("type") == "file") {
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
			if (confirm("Confirm ?")) {
				const formData = new FormData(form);
				swalLoadingOpen();
				handleRegistration(formData);
			}
		},
	});
	$.validator.addMethod(
		"fileSize",
		function (value, element, param) {
			let maxSizeInBytes = parseInt(param);

			for (let i = 0; i < element.files.length; i++) {
				let file = element.files[i];
				console.log(file);
				console.log(maxSizeInBytes);
				if (file.size > maxSizeInBytes) {
					return false;
				}
			}

			return true;
		},
		function (param, element) {
			let maxSizeInMegabytes = parseInt(param) / (1024 * 1024); // Convert ke MB
			return (
				"File size cannot exceed " + maxSizeInMegabytes.toFixed(0) + " MB."
			);
		}
	);
}

function handleRegistration(formData) {
	$.ajax({
		type: "POST",
		url: baseUrl + "auth/save_regist",
		data: formData,
		dataType: "json",
		processData: false,
		contentType: false,
		success: function (response) {
			let status = response.status;
			msg = response.message;
			const email = response.email;
			swalLoadingClose();
			if (status == "OK") {
				let reloadPage = true;
				swal
					.fire({
						icon: "success",
						title: "Registration Success",
						html: `
						<p class="mb-1">Your registration was successful!</p>
						<p class="mb-1">Please check your email inbox or spam to verify your registration.</p>
						<p class="mb-3">If you haven't received the email.</p>
						<button id="resendLink" class="btn btn-primary btn-sm" data-email="${email}">Resend Verification Link</button>
					`,
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
				$("#resendLink").on("click", function (e) {
					const email = $(this).data("email");
					$(this).prop("disabled", true);
					$.ajax({
						type: "POST",
						url: baseUrl + "auth/re_verify",
						data: { email: email },
						dataType: "json",
					}).done((res) => {
						let message = res.message;
						reloadPage == false;
						alert(message);
						$(this).prop("disabled", false);
					});
				});
			} else {
				swal.fire({
					icon: "error",
					title: "Registration Failed",
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
