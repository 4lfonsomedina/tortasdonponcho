$(document).ready(function() {// inicio ready

$(document).on('click','.nav-link', function(){
    $('.navbar-toggler').trigger( "click" ); //bootstrap 4.x
});

});//fin ready


function showImages(el) {
    var windowHeight = jQuery( window ).height();
    $(el).each(function(){
        var thisPos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
        if (topOfWindow + windowHeight - 200 > thisPos ) {
            $(this).addClass("fadeIn");
        }
    });
}

// if the image in the window of browser when the page is loaded, show that image
$(document).ready(function(){
        showImages('.star');
});

// if the image in the window of browser when scrolling the page, show that image
$(window).scroll(function() {
        showImages('.star');
});