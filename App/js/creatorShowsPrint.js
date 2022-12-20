import $ from "jquery";
import QRCode from 'qrcode';

export default function creatorPrintPage() {

    console.log("s");

    //on canvas with id qr 
    var id = document.getElementById("num");
    var hash = btoa("show_"+id);
    var url = "http://fakecirc.psoual.me/vote/"+hash;

    var canvas = document.getElementById("qr");
    QRCode.toCanvas(canvas,url,{
        color: {
            dark: '#00f',  // Blue dots
            light: '#0000' // Transparent background
        }
    });
}