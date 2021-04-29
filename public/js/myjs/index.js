var slideIndex = 1;
const items = document.querySelectorAll('.nav-text-style');
const background = "#007cba";
const color = "white";
const btn_xem_them = document.getElementById("dropdownMenuButton");
var view_more = document.getElementById("xemthem");
let view = document.getElementById("product-category");
const id_staff = document.querySelectorAll('#staff-id');

showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

function handleIndicator(el) {
    items.forEach(function (item) {
        item.classList.remove('is-active');
        item.removeAttribute('style');
    });
    el.classList.add('is-active');
    el.style.background = background;
    el.style.color = color;
}


items.forEach(function (item) {
    item.addEventListener('click', function (e) {
        handleIndicator(e.target);
    });
    item.classList.contains('is-active') && handleIndicator(item);
});

document.querySelectorAll('.nav-text-style-1').forEach((item) => {
    item.addEventListener('click', (e) => {
        handleIndicator(e.target.closest('.dropdown').previousElementSibling);
    })
});

btn_xem_them.addEventListener('click', function () {
    if (!view_more.classList.contains("show")) {
        view_more.classList.add('show');
    } else {
        view_more.classList.remove('show');
    }

});

function GET_PRODUCE(id) {
    console.log(id);
    $.ajax({
        url: 'controller/GetPost.php',
        type: 'GET',
        data: {
            "take": id
        },
        success: function (response) {
            view.innerHTML = response;
        }
    });
}

function getMailCustomer() {
    let email = document.getElementById('email').value;
    let name = document.getElementById('name').value;
    let phone = document.getElementById('phone').value;
    let content = document.getElementById('content').value;
    const dataGet = {
        "email": email,
        "name": name,
        "phone": phone,
        "content": content,
    };

    $.ajax({
        url: '../../models/SendMailCustomer.php',
        dataType: 'text', // what to expect back from the PHP script, if anything
        data: dataGet,
        type: 'post',
        success: function (element) {
        }
    });
}

id_staff.forEach(element => {
    element.addEventListener('click', function () {
        id_staff.forEach(id => {
            if (element != id) {
                id.style.width = "50px";
                id.style.height = "50px";
            } else {

                id.style.width = "100px";
                id.style.height = "100px";
            }
        });
    });
});

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