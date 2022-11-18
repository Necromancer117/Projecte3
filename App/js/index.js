import $ from "jquery";
import login from "./login.js";
import navbar from "./navbar.js"
import map from './map.js'


$(document).ready(function() {
    console.log('Hello World');
    login();
    navbar();
    map();
});
