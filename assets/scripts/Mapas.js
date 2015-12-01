var Mapas = function() {
	'use strict'; 

	this.graficarMapa = function() {

		$('.btn-mapa').on('click', function() {

			var mapa = new GMaps({
					div: '#contenedor-mapa',
					lat: -12.043333,
					lng: -77.028333
				});

			mapa.addMarker({
				lat: -12.043333,
				lng: -77.028333,
				title: 'Parada 1',
				click: function(e) {
				alert('Parada 1');
				}
			});

			mapa.addMarker({
				lat: -12.044350,
				lng: -77.029350,
				title: 'Parada 2',
				click: function(e) {
				alert('Parada 2');
				}
			});			

		});
	};

};