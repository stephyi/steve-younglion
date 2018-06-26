$(function() {
    $(window).resize(function() {
        var width = $(window).width();
        if (width <= 640) {
            $(".image").hide();
        }
    })

})