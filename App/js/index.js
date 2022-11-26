import $ from "jquery";
import login from "./login.js";
import navbar from "./navbar.js"
import map from './map.js'
import account from "./accountSettings";


$(document).ready(function() {
    login();
    navbar();
    map();
});
