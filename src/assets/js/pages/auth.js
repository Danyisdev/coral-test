$(function () {
	loadLoginValidation();
	$("#tpl").on("click", function () {
		const ip = $("#passwordLogin");
		const itp = $("#itp");
		togglePassword(ip, itp);
	});
});
function loadLoginValidation() {
	$("#formLogin").validate({
		rules: {
			emailLogin: {
				required: true,
			},
			passwordLogin: {
				required: true,
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
			const formData = new FormData(form);
			swalLoadingOpen();
			handleLogin(formData);
		},
	});
}
function handleLogin(formData) {
	$.ajax({
		type: "POST",
		url: baseUrl + "auth/do_login",
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
						showCloseButton: false,
						showCancelButton: false,
						showConfirmButton: true,
						allowOutsideClick: false,
						allowEscapeKey: false,
						timer: 3000,
					})
					.then((res) => {
						window.location = nextPage;
					});
			} else {
				swal.fire({
					icon: "error",
					title: "Failed",
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
			alert("An error occurred. Please contact the administrator.");
			console.error("AJAX Error:");
			console.error("Status Code: " + xhr.status);
			console.error("Status Text: " + xhr.statusText);
		},
	});
}
