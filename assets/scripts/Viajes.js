var Viajes = function() {
	'use strict';

	var componentesMaterialize = new ComponentesMaterialize();

    this.cargarLista = function() {
        cargarViajesLista();
    };

    this.cargarEventoBtnFiltroViajes = function() {
        cargarViajesListaFiltrada();
    }

    /* Métodos privados */

    function cargarViajesLista() {
		$.ajax({
		    url: 'source/ABM/viajes/cargarViajesLista.php',
		    method: 'post',
		    dataType: 'html',
		    success: function(data) {
		        $('#lista-viajes').html(data);
		    }
		}).done(function() {
			componentesMaterialize.cargar();
			cargarEventos();
			ponerFocoEnViajeEditar();
		});    	
    }

    function ponerFocoEnViajeEditar() {
		// Se pone el foco en el primer campo del formulario de editar Viaje
		$('.btn-editar-viaje-lista').on('click', function() { 
			//$('#nombre').focus(); TODO
		});
    }    

    function cargarEventos() {
        btnViajeNuevoLista();
        cargarViajesListaFiltrada();
        btnDatosViaje();
        btnViajeEditarLista();
        btnViajeEliminarLista();
    };

    function cargarViajesListaFiltrada() {
        $('#btn-lista-viajes-filtrada').on('click', function(e) {
            e.preventDefault();
            var formData = $('#formularioListaViajesFiltrada').serialize();
            $.ajax({
                url: 'source/ABM/viajes/cargarViajesListaFiltrada.php',
                method: 'post',
                data: formData,
                dataType: 'html',
                success: function(data) {
                    $('#lista-viajes').html(data);
                }
            }).done(function() {    
                componentesMaterialize.cargar();
                cargarEventos();
                ponerFocoEnViajeEditar();
            });
        });        
    }

    function btnViajeNuevoLista() {
        // Se carga evento boton editar de lista
        $('#btn-nuevo-viaje-lista').on('click', function() {
            $.ajax({
                url: 'source/ABM/viajes/cargarViajeNuevoEnFormulario.php',
                method: 'post',
                dataType: 'html',
                success: function(data){
                    $('#modalNuevoViaje .modal-content').html(data);
                }
            }).done(function(){
                componentesMaterialize.cargar();
                btnViajeNuevo();
            });
        });
    }

    function btnViajeNuevo() {
        $('#btn-nuevo-viaje').on('click', function() {

            var formData = $('#formNuevoViaje').serialize();
            
            // TODO: validaciones del form con Validate.js
            $.ajax({
                url: 'source/ABM/viajes/nuevo.php',
                method: 'POST',
                data: formData,
                success: function(data){
                    swal({
                        title: 'Viaje de alta con éxito',
                        type: 'success'
                    }, function(){
                        $('#modalNuevoViaje').closeModal();
                    });
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al dar alta viaje',
                        type: 'error'
                    });
                }
            }).done(function(){
                cargarViajesLista();
            });
        });
    }

    function btnDatosViaje() {
        // Se carga evento boton ver Viaje
        $('.btn-datos-viaje').on('click', function() {

            var idViaje = 'id=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/viajes/datosViaje.php',
                method: 'post',
                data: idViaje,
                dataType: 'html',
                success: function(data){
                    $('#modalDatosViaje .modal-content').html(data);
                }
            });
        });
    }

    function btnViajeEditarLista() {
        $('.btn-editar-viaje-lista').on('click', function() {
            var idViaje = 'id=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/viajes/cargarViajeEditarEnFormulario.php',
                method: 'post',
                data: idUsuario,
                dataType: 'html',
                success: function(data){
                    $('#modalEditarViaje .modal-content').html(data);
                }
            }).done(function(){
                btnViajeEditar();
                componentesMaterialize.cargar();
            });
        });
    }

    function btnViajeEliminarLista() {
        // Baja Viaje
        $('.btn-baja-viaje').on('click', function(e) {
            e.preventDefault();
            var idViaje = $(this).data('id-eliminar');

            swal({
                title: '¿Está seguro que desea eliminar este viaje?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#039be5"
            }, function() {
                eliminarViajePorId(idViaje);
            });        
        });
    }

    function eliminarViajePorId(id) {
        // TODO: validaciones del form con Validate.js
        var data = 'id=' + id;

        $.ajax({
            url: 'source/ABM/viajes/baja.php',
            method: 'POST',
            data: data,
            success: function(data) {
                swal({
                    title: 'Viaje eliminado con éxito',
                    type: 'success'
                });
            },
            error: function() {
                swal({
                    title: 'Ocurrió un error al eliminar viaje',
                    type: 'error'
                });
            }
        }).done(function(){
        	cargarViajesLista(); // Se vuelve a cargar la lista luego de confirmar borrar usuario
        });
    }             
};