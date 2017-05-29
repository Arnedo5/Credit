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

//Forms login & register
$('.continue').click(function () {
    $('.transform').animate({
        height: "toggle",
        opacity: "toggle"
    }, "slow");
});

//Search in table
$(document).ready(function() {
    $('#table').DataTable({
      "language": {
            "sProcessing":     "Processant...",
            "sLengthMenu":     "Mostrar _MENU_ registres",
            "sZeroRecords":    "No s'han trobat registres",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrant registres del _START_ al _END_ del total de _TOTAL_ registres",
            "sInfoEmpty":      "Mostrant registres del 0 al 0 d'un total de 0 registres.'",
            "sInfoFiltered":   "(Filtrant un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primer",
                "sLast":     "Últim",
                "sNext":     "Següent",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
} );

//Select box - form
$(document).ready(function() {
    $('select').material_select();
});
    