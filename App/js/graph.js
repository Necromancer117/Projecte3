import $ from "jquery";
import Chart from 'chart.js/auto';

var canvas = document.getElementById('results');


var config = {
    type: "bar",
    data: {labels: ['test1','test2','test3','test4','test5'],
    datasets:[{label:'Number of votes', data:[5,3,10,12,4]}]
}
};

var chart = new Chart(canvas,config);