$(function () {
    $("#mainNav").addClass("js-menu");
    $("#toggle-menu").click(function(e) {
        $(this).toggleClass("on");
        $("#main-nav").slideToggle();
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
