$(document).on('ready', function() {
    'use strict';

    var $ABMEmpleados       = $('.ABMEmpleados');
    var $salir              = $('#salir');
    var $btnEditarLista     = $('.btn-editar-lista');
    var $btnEditarEmpleado  = $('.btn-editar-empleado');
    var $btnNuevoEmpleado   = $('.btn-nuevo-empleado');
    var $btnBajaEmpleado    = $('.btn-baja-empleado');
    var $formEditarEmpleado = $('#formEditarEmpleado'); // estos deberían ser clases no id
    var $formNuevoEmpleado  = $('#formNuevoEmpleado'); // estos deberían ser clases no id

    // Se inicializa navbar
     $(".button-collapse").sideNav();

    // Se inicializa ventanas modales
    $('.modal-trigger').leanModal();

    // Se inicializa combo
    $('select').material_select();

    // Se inicializan Datepickers
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 100
    });

    // Se pone el foco en el primer campo del formulario de editar Empleado
    $btnEditarLista.on('click', function(){
        $('#nombre').focus();
    });

    // Se inicializa tooltip
     $('.tooltipped').tooltip({delay: 20});

    $salir.on('click', function(e) {
        e.preventDefault();
        swal({
            title: '¿Deseas salir?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#039be5"
        });
    });

    // Agregar Empleado
    $btnNuevoEmpleado.on('click', function(e) {
        e.preventDefault();
        var formData = $formNuevoEmpleado.serialize();

        $.ajax({
            url: 'source/ABM/empleados/nuevo.php',
            method: 'POST',
            data: formData,
            success: function(data){
                swal({
                    title: 'Usuario agregado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al agregar usuario',
                    type: 'error'
                });
            },
            done: function() {
                // TODO: ocultar loader
            }            
        });
    });

    // Editar Empleado
    $btnEditarEmpleado.on('click', function(e) {

        var formData = $formEditarEmpleado.serialize();

        e.preventDefault();

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
                debugger;
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
