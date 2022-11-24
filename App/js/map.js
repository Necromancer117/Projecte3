import L from 'leaflet';
import $ from 'jquery';


export default function map() {
    if ($('#map'.length)) {

        var icon = L.icon({
            iconUrl: '../../img/map_pointers/marker-icon.png',
            shadowUrl: '../../img/map_pointers/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 36],
            popupAnchor:  [0, -28]
        });

        var infos = $('#map').data();

       

        var map = L.map('map').setView([42.2655066, 2.9581046], 10);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        //START FOR EACH MARKER
        //UNCOMMENT THIS TO ENABLE MAP MARKERS IN CLIENT SIDE
        /*infos['mapinfo'].forEach(info => {

            const settings = {
                "async": true,
                "crossDomain": true,
                //"url": "https://address-from-to-latitude-longitude.p.rapidapi.com/geolocationapi?lat="+info.latitud_espacio+"&lng="+info.longitud_espacio,
                "method": "GET",
                "headers": {
                    "X-RapidAPI-Key": "d30e2b30cbmsh3aea9274d3cc96cp1f8dfcjsn3f2c415e7379",
                    "X-RapidAPI-Host": "address-from-to-latitude-longitude.p.rapidapi.com"
                }
            };
            
            $.ajax(settings).done(function (locations) {
                locations['Results'].forEach(location => {
                    console.log(location);
                    L.marker([info.latitud_espacio, info.longitud_espacio], { icon: icon }).addTo(map).bindPopup("Event location:<br><b>Date: "+info.fecha_inicio_representacion+"</b><br>"+info.hora_inicio_representacion+" to "+info.hora_fin_representacion+"<br> On: "+location.address+"<br>"+location.city);
                });
            });

            
        });*/
    }

}