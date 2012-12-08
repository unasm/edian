window.onload=init;
function init () {
	beaut();
}
function beaut () {
	$("#visitor li").mouseenter(function () {
		$(this).find('div').fadeOut();
	});
	$("#visitor li").mouseleave(function (event) {
		$(this).find('div').fadeIn();
	});
}

