$(document).on('ready', function() {
    'use strict';

    var $ABMEmpleados       = $('.ABMEmpleados');
    var $btnEditarLista     = $('.btn-editar-lista');
    var $btnNuevoEmpleado   = $('.btn-nuevo-empleado');
    var $btnBajaEmpleado    = $('.btn-baja-empleado');
    // estos deberían ser clases no id -> hint: buscar por el partent al form
    var $formNuevoEmpleado  = $('#formNuevoEmpleado'); // estos deberían ser clases no id
    var $listaEmpleados     = $('#lista-empleados');

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

    // Cargar formulario empleado
    $btnEditarLista.on('click', function() {

        var idUsuario = 'id=' + $(this).data('id');

        $.ajax({
            url: 'source/ABM/empleados/cargarEmpleadoEditarEnFormulario.php',
            method: 'POST',
            data: idUsuario,
            success: function(data){
                $('#modalEditarEmpleado .modal-content').html(data);
            },
            done: function() {
            }
        });
    });

    // Editar Empleado
    // Espero a que las llamadas asincronicas esten listas y poder colgarme del dom
    $(document).ajaxSuccess(function() {
        // FALTAN CARGAR LOS RADIO DE SEXO
        // se cargan los combos que vinieron asincronicamente
        $('select').material_select();
        $('.btn-editar-empleado').on('click', function() {

            var formData = $('#formEditarEmpleado').serialize();

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
                    cargarEmpleadosLista();
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al editar usuario',
                        type: 'error'
                    });
                },
                done: function() {
                }
            });
        });
    });

    // Carga de lista de empleados asincronica
    function cargarEmpleadosLista() {
        $.ajax({
            url: 'source/ABM/empleados/cargarEmpleadosLista.php',
            method: 'post',
            success: function(data){
                debugger;
                $listaEmpleados.html(data);
            }
        });
    }

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
