function goUrl(page) {
	window.location.href = baseUrl + page;
}

function loadActiveSidebar() {
	var currentUrl = window.location.href;

	$(".nav-sidebar a.nav-link").each(function () {
		var menuItemUrl = $(this).attr("href");
		if (currentUrl.indexOf(menuItemUrl) !== -1) {
			var parentNavHead = $(this).closest("li.navHead");
			if (parentNavHead.length > 0) {
				var navTitle = parentNavHead.find(".navLinkHead");
				parentNavHead.addClass("menu-is-opening menu-open");
				navTitle.addClass("active");
				$(this).closest("a.nav-link").addClass("active");
			}
			$(this).addClass("active");
		}
	});
}

function swalLoadingOpen() {
	swal.fire({
		didOpen: function () {
			swal.showLoading();
		},
		allowOutsideClick: false,
		allowEscapeKey: false,
	});
}

function swalLoadingClose() {
	swal.close();
}

function togglePassword(inputField, iconElement) {
	if (inputField.attr("type") === "password") {
		iconElement.removeClass("fas fa-eye");
		iconElement.addClass("fas fa-eye-slash");
		inputField.attr("type", "text");
	} else {
		iconElement.removeClass("fas fa-eye-slash");
		iconElement.addClass("fas fa-eye");
		inputField.attr("type", "password");
	}
}
