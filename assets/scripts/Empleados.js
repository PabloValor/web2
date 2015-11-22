var Empleados = function () {
	'use strict';

	var componentesMaterialize = new ComponentesMaterialize();

    this.cargarLista = function() {
        cargarEmpleadosLista();
    };

    this.cargarEventoBtnFiltroEmpleado = function() {
        cargarEmpleadosListaFiltrada();
    } 

    /* Métodos privados */

    function cargarEmpleadosListaFiltrada() {
        $('#btn-lista-filtrada').on('click', function(e){
            e.preventDefault();
            var formData = $('#formularioListaFiltrada').serialize();
            $.ajax({
                url: 'source/ABM/empleados/cargarEmpleadosListaFiltrada.php',
                method: 'post',
                data: formData,
                dataType: 'html',
                success: function(data) {
                    $('#lista-empleados').html(data);
                }
            }).done(function() {    
                componentesMaterialize.cargar();
                cargarEventos();
                ponerFocoEnEmpleadoEditar();
            });
        });        
    }

	function cargarEmpleadosLista() { 
		$.ajax({
		    url: 'source/ABM/empleados/cargarEmpleadosLista.php',
		    method: 'post',
		    dataType: 'html',
		    success: function(data) {
		        $('#lista-empleados').html(data);
		    }
		}).done(function() {	
			componentesMaterialize.cargar();
			cargarEventos();
			ponerFocoEnEmpleadoEditar();
		});
	}

    function cargarEventos() {
        btnEmpleadoNuevoLista();
        cargarEmpleadosListaFiltrada();
        btnDatosEmpleado();
        btnEmpleadoEditarLista();
        btnEmpleadoEliminarLista();
    };

    function ponerFocoEnEmpleadoEditar() {
		// Se pone el foco en el primer campo del formulario de editar Empleado
		$('.btn-editar-lista').on('click', function(){
			$('#nombre').focus();
		});
    }

    function btnEmpleadoNuevo() {
        $('#btn-nuevo-empleado').on('click', function(e) {
            e.preventDefault();
            var formData = $('#formNuevoEmpleado').serialize();
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
                }
            }).done(function(){
            	$('#modalNuevoEmpleado').closeModal();
                cargarEmpleadosLista();
            });
        });
    }

    function btnEmpleadoEditarLista() {
        // Se carga evento boton editar de lista
        $('.btn-editar-lista').on('click', function() {

            var idUsuario = 'id=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/empleados/cargarEmpleadoEditarEnFormulario.php',
                method: 'post',
                data: idUsuario,
                dataType: 'html',
                success: function(data){
                    $('#modalEditarEmpleado .modal-content').html(data);
                }
            }).done(function(){
                btnEmpleadoEditar();
            });
        });
    }    

    function btnEmpleadoNuevoLista() {
        // Se carga evento boton editar de lista
        $('#btn-nuevo-lista').on('click', function() {
            $.ajax({
                url: 'source/ABM/empleados/cargarEmpleadoNuevoEnFormulario.php',
                method: 'post',
                dataType: 'html',
                success: function(data){
                    $('#modalNuevoEmpleado .modal-content').html(data);
                }
            }).done(function(){
                btnEmpleadoNuevo();
            });
        });
    }

    function btnEmpleadoNuevo() {
        $('#btn-nuevo-empleado').on('click', function() {
            var formData = $('#formNuevoEmpleado').serialize();
            // TODO: validaciones del form con Validate.js
            $.ajax({
                url: 'source/ABM/empleados/nuevo.php',
                method: 'POST',
                data: formData,
                success: function(data){
                    swal({
                        title: 'Usuario de alta con éxito',
                        type: 'success'
                    }, function(){
                        $('#modalNuevoEmpleado').closeModal();
                    });
                },
                error: function() {
                    swal({
                        title: 'Ocurrió un error al dar alta a usuario',
                        type: 'error'
                    });
                }
            }).done(function(){
                cargarEmpleadosLista();
            });
        });
    }    

    function btnDatosEmpleado() {
        // Se carga evento boton ver empleado
        $('.btn-datos-empleado').on('click', function() {

            var idUsuario = 'id=' + $(this).data('id');

            $.ajax({
                url: 'source/ABM/empleados/datosEmpleado.php',
                method: 'post',
                data: idUsuario,
                dataType: 'html',
                success: function(data){
                    $('#modalDatosEmpleado .modal-content').html(data);
                }
            });
        });
    }    

    function btnEmpleadoEditar() {
		$('#btn-editar-empleado').on('click', function() {

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
	            },
	            error: function() {
	                swal({
	                    title: 'Ocurrió un error al editar usuario',
	                    type: 'error'
	                });
	            }
	        }).done(function(){
	        	cargarEmpleadosLista();
	        });
		});
    }    

    function btnEmpleadoEliminarLista() {
        // Baja empleado
        $('.btn-baja-empleado').on('click', function(e) {
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
    }

    function eliminarEmpleadoPorId(id) {
        // TODO: validaciones del form con Validate.js
        var data = 'id=' + id;

        $.ajax({
            url: 'source/ABM/empleados/baja.php',
            method: 'POST',
            data: data,
            success: function(data) {
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
            }
        }).done(function(){
        	cargarEmpleadosLista(); // Se vuelve a cargar la lista luego de confirmar borrar usuario
        });
    }                   
};
