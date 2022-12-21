import $ from "jquery";
import QRCode from "qrcode";

export default function creatorPrintPage() {
  $("#qrButton").on("click", function () {
    $("#qrButton").addClass("hidden");

    //on canvas with id qr
    var id = document.getElementById("num");
    var hash = btoa("show_" + id);
    var url = "http://fakecirc.psoual.me/vote/" + hash;

    //on canvas with id qr
    var id = document.getElementById("num").textContent;
    var hash = btoa("show_" + id);
    var url = "http://projecte3.local/vote/" + hash;

    var canvas = document.getElementById("qrPrint");
    QRCode.toCanvas(canvas, url, {
      color: {
        dark: "#00f", // Blue dots
        light: "#0000", // Transparent background
      },
    });
  });
}
