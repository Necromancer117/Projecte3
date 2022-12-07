import $ from "jquery";
import login from "./login.js";
import navbar from "./navbar.js"
import map from './map.js'
<<<<<<< HEAD


$(document).ready(function() {
    login();
    navbar();
    map();
});
=======
import adminpanel from './adminpanel.js'


$(function() {
    login();
    navbar();
    adminpanel();
    //map();
});

//$("body").load(adminpanel);
>>>>>>> c96b473 (just pray)
