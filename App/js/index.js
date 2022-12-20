import $ from "jquery";
import login from "./login.js";
import navbar from "./navbar.js"
import map from './map.js'
import account from "./accountSettings.js";
import favorites from "./favorites.js";
import adminpanel from './adminpanel.js'
import rate from "./rate.js";
import portada_form from "./portada_form.js";
import search from "./search_table.js";
import search_table from "./search_table.js";
import graph from "./graph.js"
import creatorNavBar from "./creatorNavbar.js"
import creatorShowsDropdwon from "./creatorShows.js"

$(document).ready(function () {
    login();
    navbar();
    adminpanel();
    map();
    rate();
    portada_form();
    search_table();
    creatorNavBar();
    creatorShowsDropdwon();
});