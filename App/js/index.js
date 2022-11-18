import $ from "jquery";
import login from "./login.js";
import navbar from "./navbar.js"

$(document).ready(function() {
    console.log('Hello World');
    login();
    navbar();
});
