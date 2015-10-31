$(document).on('ready', function() {
    'use strict';

    var $ABMEmpleados = $('.ABMEmpleados');

    // Se inicializa navbar
     $(".button-collapse").sideNav();

    // Se inicializa ventanas modales
    $('.modal-trigger').leanModal();

    // Se inicializa combo
    $('select').material_select();

        var IdEmpleado = $(this).data('id');
        // Se carga el empleado en el modal
        cargarEmpleado(IdEmpleado);
    function cargarEmpleado(IdEmpleado) {
        $.ajax({
            url: 'source/ABM/empleados/cargarEmpleadoModal.php',
            method: 'GET',
            data: IdEmpleado,
            success: function(data){
                
            },
            error: function() {
            },
            done: function() {
                // TODO: ocultar loader
            }
        });        
    }

    // Se inicializa tooltip
     $('.tooltipped').tooltip({delay: 50});

     // ABM Empleados
    $ABMEmpleados.on('click', function(e) {
        
        //TODO: Mostrar loader
    	e.preventDefault();

    	var idUsuario = $(this).data('id');
        var accion = $(this).data('accion');
        e.preventDefault();

        var IdEmpleado = $(this).data('id');
        // se appendea el id del empleado
        formData + '&id=' + IdEmpleado;

        // TODO: validaciones del form con Validate.js
        $.ajax({
            url: 'source/ABM/empleados/editar.php',
            method: 'POST',
            data: formData,
            success: function(data){
                swal({
                    title: 'Usuario editado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al editar usuario',
                    type: 'error'
                });
            },
            done: function() {
                // TODO: ocultar loader
            }
        });
        //return false;
    });

    // Baja empleado
    $btnBajaEmpleado.on('click', function(e) {
        e.preventDefault();
        var $self = $(this);
        var IdEmpleado = $self.data('id-eliminar');

        swal({
            title: '¿Está seguro que desea eliminar este usuario?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#039be5"
        }, function() {
            eliminarEmpleadoPorId(IdEmpleado);
        });        
    });
    
    function eliminarEmpleadoPorId(id) {
        // TODO: validaciones del form con Validate.js
        var data = 'id=' + id;

        $.ajax({
            url: 'source/ABM/empleados/baja.php',
            method: 'POST',
            data: data,
            success: function(data){
                swal({
                    title: 'Usuario eliminado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al eliminar usuario',
                    type: 'error'
                });
            },
            done: function() {
                // TODO: ocultar loader
            }
        });
    }

    console.info("DOM ready");
});
