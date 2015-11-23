var Vehiculos = function () {
    'use strict';

    var componentesMaterialize = new ComponentesMaterialize();

    this.cargarLista = function() {
        cargarVehiculosLista();
    };

    /* Métodos privados */

    function cargarVehiculosLista() { 
        $.ajax({
            url: 'source/ABM/vehiculos/cargarVehiculosLista.php',
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('#lista-vehiculos').html(data);
            }
        }).done(function() {    
            componentesMaterialize.cargar();
            cargarEventos();
            ponerFocoEnVehiculoEditar();
        });
    }

    function cargarEventos() {
        btnVehiculoNuevo();
        btnDatosVehiculo();
        btnVehiculoEditarLista();
        btnVehiculoEliminarLista();
    };

    function ponerFocoEnVehiculoEditar() {
        // Se pone el foco en el primer campo del formulario de editar Vehiculo
        $('.btn-editar-vehiculo').on('click', function(){
            $('#dominio').focus();
        });
    }

    function btnVehiculoNuevo() {
        $('#btn-nuevo-vehiculo').on('click', function(e) {
            e.preventDefault();
            var formData = $('#formNuevoVehiculo').serialize();
            $.ajax({
                url: 'source/ABM/vehiculos/nuevo.php',
                method: 'POST',
                data: formData,
                success: function(data){
                    swal({
                        title: 'Vehículo agregado con éxito',
                        type: 'success'
                    });
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al agregar vehiculo',
                        type: 'error'
                    });
                }
            }).done(function(){
                $('#modalNuevoVehiculo').closeModal();
            });
        });
    }

    function btnVehiculoEditarLista() {
        // Se carga evento boton editar de lista
        $('.btn-editar-lista').on('click', function() {

            var dominioVehiculo = 'dominio=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/Vehiculos/cargarVehiculoEditarEnFormulario.php',
                method: 'post',
                data: dominioVehiculo,
                dataType: 'html',
                success: function(data){
                    $('#modalEditarVehiculo .modal-content').html(data);
                }
            }).done(function(){
                btnVehiculoEditar();
            });
        });
    }

    function btnDatosVehiculo() {
        // Se carga evento boton ver Vehiculo
        $('.btn-datos-vehiculo').on('click', function() {

            var dominiovehiculo = 'dominio=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/vehiculos/datosVehiculo.php',
                method: 'post',
                data: dominiovehiculo,
                dataType: 'html',
                success: function(data){
                    $('#modalDatosVehiculo .modal-content').html(data);
                }
            });
        });
    }    

    function btnVehiculoEditar() {
        $('#btn-editar-vehiculo').on('click', function() {

            var formData = $('#formEditarVehiculo').serialize();
            // TODO: validaciones del form con Validate.js
            $.ajax({
                url: 'source/ABM/vehiculos/editar.php',
                method: 'POST',
                data: formData,
                success: function(data){
                    swal({
                        title: 'Vehículo editado con éxito',
                        type: 'success'
                    }, function(){
                        $('#modalEditarVehiculo').closeModal();
                    });
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al editar vehiculo',
                        type: 'error'
                    });
                }
            }).done(function(){
                cargarVehiculosLista();
            });
        });
    }    

    function btnVehiculoEliminarLista() {
        // Baja Vehiculo
        $('.btn-baja-vehiculo').on('click', function(e) {
            e.preventDefault();
            var $self = $(this);
            var dominiovehiculo = $self.data('id-eliminar');

            swal({
                title: '¿Está seguro que desea eliminar este vehículo?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#039be5"
            }, function() {
                eliminarVehiculoPorDominio(dominiovehiculo);
            });        
        });
    }

    function eliminarVehiculoPorDominio(dominio) {
        // TODO: validaciones del form con Validate.js
        var data = 'dominio=' + dominio;

        $.ajax({
            url: 'source/ABM/Vehiculos/baja.php',
            method: 'POST',
            data: data,
            success: function(data) {
                swal({
                    title: 'vehiculo eliminado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al eliminar vehiculo',
                    type: 'error'
                });
            }
        }).done(function(){
            cargarVehiculosLista(); // Se vuelve a cargar la lista luego de confirmar borrar vehiculo
        });
    }                   
};
