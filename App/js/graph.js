import $ from "jquery";
import Chart from 'chart.js/auto';

if ($('#results').length != 0) {
var canvas = document.getElementById('results');

var data = $('#results').data();
var names = [];
var votes = [];
var cont = 0;
$.each(data['votes'],function (key,value) {
    names [cont] = key;
    votes [cont] = value;
    cont++;
}) 
console.log(names);
var config = {
    type: "bar",
    data: {labels: names,
    datasets:[{label:'Average valoration of each show (current edition)', data:votes}],
}
};

var chart = new Chart(canvas,config);
}