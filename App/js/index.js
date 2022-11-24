import $ from "jquery";
import login from "./login.js";
import navbar from "./navbar.js"
import map from './map.js'
import adminpanel from './adminpanel.js'


$(function() {
    login();
    navbar();
    adminpanel();
    //map();
});

//$("body").load(adminpanel);