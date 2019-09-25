(function() {
$(function() {

	//ページ内スクロール
	$(".scroll").click(function () {
		var i = $(".scroll").index(this)
		var p = $(".content").eq(i).offset().top;
		$('html,body').animate({ scrollTop: p }, 'fast');
		return false;
	});

});
})();