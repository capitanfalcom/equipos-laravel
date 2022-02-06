$(document).ready(function() {


    function validacionDatos() {

        if ($('#team_name').val() != '' && $('#cantIntegrantes').val() != '' && $('input[type=radio]:checked').val() != undefined) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url_global + "/guardar",
                success: function(response) {
                    swal('equipo agregado');
                    document.getElementById("guardarEquipo").submit();
                }
            });
        }

    };
    /* click agrega un equipo */
    $('#btnEnviar').on('click', function(e) {
        validacionDatos();
    });

    /* click borra un equipo */
    $('.trashEquipo').on('click', function(e) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url_global + "/borrar",
            data: {
                id: $(this).data('target')
            },
            success: function() {

                swal('equipo borrado');
                window.location.href = url_global;

            }
        });
    });


    /* click abre modal */




});