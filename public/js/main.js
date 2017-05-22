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
        $('header').animate({
            marginLeft: '0px'
        }, 500);

        $('main').animate({
            marginLeft: '0px'
        }, 500);

        $('footer').animate({
            marginLeft: '0px'
        }, 500);

        $('#slide-out').animate({
            marginLeft: '-300px'
        }, 500);
        open = false;
    } else {
        $('header').animate({
            marginLeft: '300px'
        }, 500);

        $('main').animate({
            marginLeft: '300px'
        }, 500);

        $('footer').animate({
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

    console.log("ID: " + id)
     console.log("href: " + href)
      console.log("quantity: " + quantity)

    window.location.href = href + "/" + quantity;
});

