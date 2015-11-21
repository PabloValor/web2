$(document).on('ready', function() {
    'use strict';

    //Vehiculos
    var $btnBajaVehiculo    = $('.btn-baja-vehiculo');
    var $btnEditarVehiculo  = $('.btn-editar-vehiculo');
    var $btnNuevoVehiculo   = $('.btn-nuevo-vehiculo');
    var $formNuevoVehiculo  = $('#formNuevoVehiculo'); // estos deberían ser clases no id
    var $listaVehiculos     = $('#lista-vehiculos');

    var componentesMaterialize = new ComponentesMaterialize();
    componentesMaterialize.cargar();

    var empleados = new Empleados();
    empleados.cargarLista();


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