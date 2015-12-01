var Mapas = function() {
	'use strict'; 

	this.cargarEventos = function() {

		$('.btn-mapa').on('click', function() {

			var idViaje = "id=" + $(this).data('id');

            $.ajax({
                url: 'source/mapas/paradas-viajes.php',
                data: idViaje,
                method: 'post',
                dataType: 'json',
                success: function(data) {

                	var coordenadas = JSON.parse(data);

					var mapa = new GMaps({
							div: '#contenedor-mapa',
							lat: -36.0379662,
							lng: -63.3773687,
							zoom: 5
						});

					mapa.addMarker({
						lat: coordenadas.latitud1,
						lng: coordenadas.longitud1,
						title: 'Parada 1',
						click: function(e) {
						alert('Parada 1');
						}
					});

					mapa.addMarker({
						lat: coordenadas.latitud2,
						lng: coordenadas.longitud2,
						title: 'Parada 2',
						click: function(e) {
						alert('Parada 2');
						}
					});     
                }
            }).done(function() {    
                //componentesMaterialize.cargar();
                //cargarEventos();
                //ponerFocoEnEmpleadoEditar();
            });
		});
	};

};