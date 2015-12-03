var Mantenimientos = function () {
    'use strict';

    var componentesMaterialize = new ComponentesMaterialize();

    this.cargarLista = function() {
        cargarMantenimientosLista();
    };

    this.cargarAlarmas = function() {
        cargarAlarmas();
    };

    /* Métodos privados */

    function cargarAlarmas() {
        if(window.location.href.toString().toLowerCase().indexOf("login") > 0) return;
        
        $.ajax({
            url: 'source/ABM/mantenimientos/consultarAlarmas.php',
            method: 'post',
            dataType: 'json',
            success: function(data) {
                data = JSON.parse(data);

                $(data).map(function(index, elemento){
                    Materialize.toast("[Atención Service] dominio: " + elemento.dominio + " Comentario: " + elemento.comentario, 4000);
                });
            }
        });
    }

    function cargarMantenimientosLista() { 
        $.ajax({
            url: 'source/ABM/mantenimientos/cargarMantenimientosLista.php',
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('#lista-mantenimientos').html(data);
            }
        }).done(function() {    
            componentesMaterialize.cargar();
            cargarEventos();
        });
    }

    function cargarEventos() {
        btnMantenimientoNuevoLista();
        btnDatosMantenimiento();
        btnMantenimientoEditar();
        btnMantenimientoEditarLista();
        btnMantenimientoEliminarLista();
    };

    function btnMantenimientoNuevo() {
        $('#btn-nuevo-mantenimiento').on('click', function(e) {
            e.preventDefault();
            var formData = $('#formNuevoMantenimiento').serialize();
            $.ajax({
                url: 'source/ABM/mantenimientos/nuevo.php',
                method: 'POST',
                data: formData,
                success: function(data){
                    swal({
                        title: 'Mantenimiento agregado con éxito',
                        type: 'success'
                    });
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al agregar Mantenimiento',
                        type: 'error'
                    });
                }
            }).done(function(){
                $('#modalNuevoMantenimiento').closeModal();
                cargarMantenimientosLista();
            });
        });
    }

    function btnMantenimientoEditarLista() {
        // Se carga evento boton editar de lista
        $('.btn-editar-lista').on('click', function() {

            var IdMantenimiento  = 'id=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/mantenimientos/cargarMantenimientoEditarEnFormulario.php',
                method: 'post',
                data: IdMantenimiento,
                dataType: 'html',
                success: function(data){
                    $('#modalEditarMantenimiento .modal-content').html(data);
                }
            }).done(function(){
                btnMantenimientoEditar();
                componentesMaterialize.cargar();
            });
        });
    }    

    function btnMantenimientoEditar() {
        $('#btn-editar-mantenimiento').on('click', function() {

            var formData = $('#formEditarMantenimiento').serialize();
            // TODO: validaciones del form con Validate.js
            $.ajax({
                url: 'source/ABM/mantenimientos/editar.php',
                method: 'POST',
                data: formData,
                success: function(data){
                    swal({
                        title: 'Mantenimiento editado con éxito',
                        type: 'success'
                    }, function(){
                        $('#modalEditarMantenimiento').closeModal();
                    });
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al editar mantenimiento',
                        type: 'error'
                    });
                }
            }).done(function(){
                cargarMantenimientosLista();
            });
        });
    }    

    function btnMantenimientoNuevoLista() {
        // Se carga evento boton editar de lista
        $('#btn-nuevo-lista').on('click', function() {
            $.ajax({
                url: 'source/ABM/mantenimientos/cargarMantenimientoNuevoEnFormulario.php',
                method: 'post',
                dataType: 'html',
                success: function(data){
                    $('#modalNuevoMantenimiento .modal-content').html(data);
                }
            }).done(function(){
                componentesMaterialize.cargar();
                btnMantenimientoNuevo();
            });
        });
    }

    function btnMantenimientoNuevo() {
        $('#btn-nuevo-mantenimiento').on('click', function() {
            var formData = $('#formNuevoMantenimiento').serialize();
            // TODO: validaciones del form con Validate.js
            $.ajax({
                url: 'source/ABM/mantenimientos/nuevo.php',
                method: 'POST',
                data: formData,
                success: function(data){
                    swal({
                        title: 'Mantenimiento generado con éxito',
                        type: 'success'
                    }, function(){
                        $('#modalNuevoMantenimiento').closeModal();
                    });
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al dar alta a mantenimiento',
                        type: 'error'
                    });
                }
            }).done(function(){
                cargarMantenimientosLista();
            });
        });
    }    

    function btnDatosMantenimiento() {
        // Se carga evento boton ver Mantenimiento
        $('.btn-datos-mantenimiento').on('click', function() {

            var IdMantenimiento = 'id=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/mantenimientos/datosMantenimiento.php',
                method: 'post',
                data: IdMantenimiento,
                dataType: 'html',
                success: function(data){
                    $('#modalDatosMantenimiento .modal-content').html(data);
                }
            });
        });
    }    

    function btnMantenimientoEliminarLista() {
        // Baja Mantenimiento
        $('.btn-baja-mantenimiento').on('click', function(e) {
            e.preventDefault();
            var $self = $(this);
            var IdMantenimiento = $self.data('id-eliminar');

            swal({
                title: '¿Está seguro que desea eliminar este mantenimiento?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#039be5"
            }, function() {
                eliminarMantenimientoPorId(IdMantenimiento);
            });        
        });
    }

    function eliminarMantenimientoPorId(id) {
        // TODO: validaciones del form con Validate.js
        var data = 'id=' + id;

        $.ajax({
            url: 'source/ABM/mantenimientos/baja.php',
            method: 'POST',
            data: data,
            success: function(data) {
                swal({
                    title: 'Mantenimiento eliminado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al eliminar mantenimiento',
                    type: 'error'
                });
            }
        }).done(function(){
            cargarMantenimientosLista(); // Se vuelve a cargar la lista luego de confirmar borrar Mantenimiento
        });
    }                   
};
