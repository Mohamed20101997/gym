(function ($) {
    "use strict"


    //Hide navbar menu on mobile view on link click
    $(window).on('resize', function () {
        if (window.matchMedia("(max-width: 991px)").matches) {
            $('#collapsibleNavbar a').on('click', function (e) {
                $('#collapsibleNavbar').collapse('toggle');
            });
        }
    });


    // Initilizing LightBox library for gallery view
    $("#lightgallery").lightGallery({
        download: false
    });


    // Class Active on Hover
    $("#collapsibleNavbar a").on('click', function () {
        //Removing All Active Classes
        $("#collapsibleNavbar a").removeClass("active");
        //Add class active on clicked navlink
        $(this).addClass('active');
    });


    // On Click Change Website Color
    $(".color").on('click', function () {
        var value = $(this).attr('value');
        document.getElementById("color-change").setAttribute('href', value);
        //$("#color-change").setAttribute('href', value);
    });


    // When the user scrolls down 80px from the top of the document, resize the navbar's padding
    window.onload = $(".line-thick").addClass('load');
    window.onscroll = function () {
        scrollFunction()
    };
    window.onload = function () {
        scrollFunction()
    };

    function scrollFunction() {
        var headerNav = $("#navbar")[0];
        var navbarBrand = $("#navbar-brand");

        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            headerNav.style.padding = "10px 10px";
            headerNav.style.background = "#1f1f1f";
            navbarBrand.removeClass('nav-not-scroll');
            navbarBrand.addClass('nav-scroll');
        } else {
            headerNav.style.padding = "6px 6px";
            headerNav.style.background = "";
            // navbarBrand.style.fontSize = "30px";
            navbarBrand.removeClass('nav-scroll');
            navbarBrand.addClass('nav-not-scroll');
        }
    }
})(jQuery);
