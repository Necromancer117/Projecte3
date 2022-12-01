import $ from "jquery";
import login from "./login.js";
import navbar from "./navbar.js"
import map from './map.js'
import account from "./accountSettings";
import favorites from "./favorites.js";


$(document).ready(function() {
    login();
    navbar();
    map();
});
