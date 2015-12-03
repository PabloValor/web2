$(document).on('ready', function() {
    'use strict';

    var componentesMaterialize = new ComponentesMaterialize();
    componentesMaterialize.cargar();

    var empleados = new Empleados();
    empleados.cargarLista();
    empleados.cargarEventoBtnFiltroEmpleado();

    var viajes = new Viajes();
    viajes.cargarLista();

    var mapas = new Mapas();
    mapas.cargarEventos();

    var vehiculos = new Vehiculos();
    vehiculos.cargarLista();

    var mantenimientos = new Mantenimientos();
    mantenimientos.cargarLista();
    
    console.info("DOM ready");
});