import $ from "jquery";
import login from "./login.js";
import navbar from "./navbar.js"
import map from './map.js'
import account from "./accountSettings";
import favorites from "./favorites.js";
import adminpanel from './adminpanel.js'
import rate from "./rate.js";
import portada_form from "./portada_form";
import search from "./search_table";
import search_table from "./search_table";

$(document).ready(function() {
    login();
    navbar();
    adminpanel();
    map();
    rate();
    portada_form()
    search_table();
});
