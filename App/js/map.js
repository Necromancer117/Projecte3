import L from 'leaflet';
import $ from 'jquery';


export default function map() {
    if ($('#map').length != 0) {

        
        var icon = L.icon({
            iconUrl: '../../img/map_pointers/marker-icon.png',
            shadowUrl: '../../img/map_pointers/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 36],
            popupAnchor: [0, -28]
        });

        var infos = $('#map').data();



        var map = L.map('map').setView([42.2655066, 2.9581046], 10);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        
        //START FOR EACH MARKER
        //COMMENT THIS TO DISABLE MAP MARKERS IN CLIENT SIDE
        infos['mapinfo'].forEach(info => {

            const settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://nominatim.openstreetmap.org/reverse?lat="+info.latitud_espacio+"&lon="+info.longitud_espacio+"&format=geocodejson",
                "method": "GET"

            };
            
            $.ajax(settings).done(function (locations) {
                
                    //console.log(locations['features']['0']['properties']['geocoding']);
                
                
                L.marker([info.latitud_espacio, info.longitud_espacio], { icon: icon }).addTo(map).bindPopup("<b>Show: "+info.nombre_espectaculo+"</b><br>Event location:<br><b>Date: "+info.fecha_inicio_representacion+"</b><br>"+info.hora_inicio_representacion+" to "+info.hora_fin_representacion+"<br> On: "+locations['features']['0']['properties']['geocoding']['label']+"<br>"+locations['features']['0']['properties']['geocoding']['city']);

                $('#loc_'+info.id_representacion).children('div').text();
                $('#city_'+info.id_representacion).text();
                $('#loc_'+info.id_representacion).children('div').text(locations['features']['0']['properties']['geocoding']['label']);
                $('#city_'+info.id_representacion).text(locations['features']['0']['properties']['geocoding']['city']);
            });


        });
    }

}