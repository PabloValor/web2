$(document).on('ready', function() {
    'use strict';

    var $ABMEmpleados       = $('.ABMEmpleados');
    var $btnEditarLista     = $('.btn-editar-lista');
    var $btnNuevoEmpleado   = $('.btn-nuevo-empleado');
    var $btnBajaEmpleado    = $('.btn-baja-empleado');
    // estos deberían ser clases no id -> hint: buscar por el partent al form
    var $formNuevoEmpleado  = $('#formNuevoEmpleado'); // estos deberían ser clases no id
    var $listaEmpleados     = $('#lista-empleados');

    //Vehiculos
    var $btnBajaVehiculo    = $('.btn-baja-vehiculo');
    var $btnEditarVehiculo  = $('.btn-editar-vehiculo');
    var $btnNuevoVehiculo   = $('.btn-nuevo-vehiculo');
    var $formNuevoVehiculo  = $('#formNuevoVehiculo'); // estos deberían ser clases no id
    var $listaVehiculos     = $('#lista-vehiculos');

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

    // Cargar formulario empleado (boton de lista)
    $('.btn-editar-lista').on('click', function() {

        var idUsuario = 'id=' + $(this).data('id');

        $.ajax({
            url: 'source/ABM/empleados/cargarEmpleadoEditarEnFormulario.php',
            method: 'post',
            data: idUsuario,
			dataType: 'html',
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
        // FALTAN CARGAR LOS RADIO DE SEXO (el problema debe ser que el id con algun otro)
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
                    }, function(){
                        $('#modalEditarEmpleado').closeModal();
                    });
                    cargarEmpleadosLista();
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al editar usuario',
                        type: 'error'
                    });
                }
            });
        });
    });

    // Carga de lista de empleados asincronica
    function cargarEmpleadosLista() {
        $.ajax({
            url: 'source/ABM/empleados/cargarEmpleadosLista.php',
            method: 'post',
            dataType: 'html',
            success: function(data){
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

    // Baja vehiculo
    $btnBajaVehiculo.on('click', function(e) {
        e.preventDefault();
        var $self = $(this);
        var DominioVehiculo = $self.data('id-eliminar');

        swal({
            title: '¿Está seguro que desea eliminar este Vehículo?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#039be5"
        }, function() {
            eliminarVehiculoPorDominio(DominioVehiculo);
        });        
    });

    function eliminarVehiculoPorDominio(dominio) {
        // TODO: validaciones del form con Validate.js
        var data = 'dominio=' + dominio;

        $.ajax({
            url: 'source/ABM/vehiculos/baja.php',
            method: 'POST',
            data: data,
            success: function(data){
                swal({
                    title: 'Vehiculo eliminado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al eliminar el vehículo',
                    type: 'error'
                });
            },
            done: function() {
                // TODO: ocultar loader
            }
        });
    }

    // Cargar formulario vehiculo
    $btnEditarVehiculo.on('click', function() {

        var dominioVehiculo = 'dominio=' + $(this).data('id');

        $.ajax({
            url: 'source/ABM/vehiculos/cargarVehiculoEditarEnFormulario.php',
            method: 'POST',
            data: dominioVehiculo,
            success: function(data){
                $('#modalEditarVehiculo .modal-content').html(data);
            },
            done: function() {
            }
        });
    });

    // Agregar Vehiculo
    $btnNuevoVehiculo.on('click', function(e) {
        e.preventDefault();
        var formData = $formNuevoVehiculo.serialize();
        $.ajax({
            url: 'source/ABM/vehiculos/nuevo.php',
            method: 'POST',
            data: formData,
            success: function(data){
                swal({
                    title: 'Vehiculo agregado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al agregar vehiculo',
                    type: 'error'
                });
            },
            done: function() {
                // TODO: ocultar loader
            }            
        });
    });

   // Editar Vehiculo
    // Espero a que las llamadas asincronicas esten listas y poder colgarme del dom
    $(document).ajaxSuccess(function() {
        // FALTAN CARGAR LOS RADIO DE SEXO
        // se cargan los combos que vinieron asincronicamente
        $('select').material_select();
        $('.btn-editar-vehiculo').on('click', function() {

            var formData = $('#formEditarVehiculo').serialize();

            // TODO: validaciones del form con Validate.js
            $.ajax({
                url: 'source/ABM/vehiculos/editar.php',
                method: 'POST',
                data: formData,
                success: function(data){
                    swal({
                        title: 'Vehiculo editado con éxito',
                        type: 'success'
                    });
                    cargarVehiculosLista();
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al editar vehiculo',
                        type: 'error'
                    });
                },
                done: function() {
                }
            });
        });
    });

    // Carga de lista de empleados asincronica
    function cargarVehiculosLista() {
        $.ajax({
            url: 'source/ABM/vehiculos/cargarVehiculoLista.php',
            method: 'post',
            success: function(data){
                debugger;
                $listaVehiculos.html(data);
            }
        });
    }
    console.info("DOM ready");
});