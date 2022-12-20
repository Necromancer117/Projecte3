import $ from "jquery";
import Chart from 'chart.js/auto';

if ($('#results').length != 0) {
var canvas = document.getElementById('results');

//Get data from votes and labels
var data = $('#results').data();
var names = [];
var votes = [];
var cont = 0;
//Divide data into 2 arrays : names and votes from each show
$.each(data['votes'],function (key,value) {
    names [cont] = key;
    votes [cont] = value;
    cont++;
}) 
//console.log(names);
//Config for Chartjs
var config = {
    type: "bar",
    data: {labels: names,
    datasets:[{label:'Average valoration of each show (current edition)', data:votes}],
}
};
//Create a new graph
var chart = new Chart(canvas,config);
}