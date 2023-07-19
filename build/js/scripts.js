$(function () {
    $("#mainNav").addClass("js-menu");
    $("#toggle-menu").click(function(e) {
        $(this).toggleClass("on");
        $("#main-nav").slideToggle();
        e.preventDefault();
    });
    // dropdowns
    $('#main-nav a:not(:only-child)').click(function(e) {
        $(this).parent().toggleClass('active').find('ul').slideToggle().parent().siblings().removeClass('active').find('ul').slideUp();
        e.preventDefault();
    });
    // date navigation
	$('.list-group.list-toggle li:not(:first-child) .show').hide();
	
	$('.list-group.list-toggle .toggle').click(function(e) {
		e.preventDefault();
		$(this).siblings('ul').toggleClass('show').slideToggle('fast').parent().siblings().find('ul').removeClass('show').slideUp('fast');
		
	});
});

var logo = document.querySelector(".header-logo");
logo.addEventListener("mouseenter", (e) => {
	logo.classList.add("play");
	setTimeout(function(){
      logo.classList.remove("play");
    }, 3000);
});
