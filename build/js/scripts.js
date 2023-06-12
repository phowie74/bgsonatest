$(function () {
    $("#mainNav").addClass("js-menu");
    $("#toggle-menu").click(function(e) {
        $(this).toggleClass("on");
        $("#main-nav").slideToggle();
        e.preventDefault();
    });
});
