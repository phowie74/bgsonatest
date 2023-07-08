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
});

var logo = document.querySelector(".header-logo");
logo.addEventListener("mouseenter", (e) => {
	logo.classList.add("play");
	setTimeout(function(){
      logo.classList.remove("play");
    }, 3000);
});
