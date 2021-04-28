$(document).ready(function () {
    $('.carousel').carousel({
        pause: true,
        interval: false
    });
});




$(document).ready(function () {
    $(".col-md-3 ").mouseenter(function () {
        $(this).find(".col-img-responsive02").show(200);
    });


    $(".col-md-3").mouseleave(function () {
        $(this).find(".col-img-responsive02").hide();
    });
});
// Logo

$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });
});