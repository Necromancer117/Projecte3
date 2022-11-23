import L from 'leaflet';
import $ from 'jquery';


export  default function map() {
    var info = $('#map').data('mapInfo');
    console.log(info);
var map = L.map('map').setView([42.2655066, 2.9581046], 10);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
}