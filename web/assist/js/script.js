$(document).ready(function () {
    $("#slider").owlCarousel({
        loop: true,
        margin: 5,
        // navSpeed:30,
        // animateIn:true,
        // nav:true,
        smartSpeed:700,
        // stagePadding:200,
        rtl: true,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $("#slider2").owlCarousel({
        loop: true,
        margin: 5,
        // navSpeed:30,
        // animateIn:true,
        // nav:true,
        smartSpeed:700,
        // stagePadding:200,
        rtl: true,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 5
            }
        }
    });
    $("#slider3").owlCarousel({
        loop: true,
        // margin: 10,
        // navSpeed:30,
        // animateIn:true,
        // nav:true,
        smartSpeed:700,
        // stagePadding:200,
        rtl: true,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
    $("#slider4").owlCarousel({
        loop: true,
        // margin: 10,
        // navSpeed:30,
        // animateIn:true,
        // nav:true,
        smartSpeed:700,
        // stagePadding:200,
        rtl: true,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
    $("#slider5").owlCarousel({
        loop: true,
        // margin: 10,
        // navSpeed:30,
        // animateIn:true,
        // nav:true,
        smartSpeed:700,
        // stagePadding:200,
        rtl: true,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
    // $(".menujs").hover(function(){
    //     $(".megamenu").removeclass("d-none");
    // })

});
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
 
  // mini icon and megamenu
  document.querySelectorAll('.menujs').forEach(btn => {
    btn.addEventListener('click', e => {
        document.querySelector(".menu").classList.add('active');
        document.querySelector(".megamenu").classList.remove('d-none');
    });
    document.querySelector(".menujs").addEventListener('mouseover', e => {
        document.querySelector(".menu").classList.remove('active');
        document.querySelector(".megamenu").classList.add('d-none');
    });

});

