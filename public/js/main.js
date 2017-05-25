//Zoom image
$(document).ready(function () {
    $('.materialboxed').materialbox();

});

//Slider
$(document).ready(function () {
    $('.slider').slider();
    $('.indicators').css('zIndex', '100');
    $('.indicators').css('marginBottom', '40px');

});

/* Change position buttons bottom */
$('.indicators').css('zIndex', '100');
$('.indicators').css('marginBottom', '50px');

//Lateral Menu
var open = true;

$("#menu").click(function () {
    if (open) {
        $('header, main, footer').animate({
            marginLeft: '0px'
        }, 500);

        $('#slide-out').animate({
            marginLeft: '-300px'
        }, 500);
        open = false;
    } else {
        $('header, main, footer').animate({
            marginLeft: '300px'
        }, 500);

        $('#slide-out').animate({
            marginLeft: '0px'
        }, 500);
        open = true;
    }
});


// Update item cart
$(".btn-update-item").on('click', function (e) {
    e.preventDefault();

    var id = $(this).data('id');
    var href = $(this).data('href');
    var quantity = $("#product_" + id).val();

    window.location.href = href + "/" + quantity;
});

//Error - Noty
function createNoty(type,position,message,time) {
    new Noty({
        type: type,
        layout: position,
        theme: 'relax',
        text: message,
        timeout: time,
        progressBar: true,
        closeWith: ['click', 'button'],
        animation: {
            open: 'noty_effects_open',
            close: 'noty_effects_close'
        }
    }).show()
}

function redirect() {
    location.href = "logout";
}

//Forms login & register
$('.continue').click(function () {
    $('.transform').animate({
        height: "toggle",
        opacity: "toggle"
    }, "slow");
});


