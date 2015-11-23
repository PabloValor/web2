$(document).on('ready', function() {
    'use strict';

    var componentesMaterialize = new ComponentesMaterialize();
    componentesMaterialize.cargar();

    var empleados = new Empleados();
    empleados.cargarLista();
    empleados.cargarEventoBtnFiltroEmpleado();

    var vehiculos = new Vehiculos();
    vehiculos.cargarLista();
    
    console.info("DOM ready");
});