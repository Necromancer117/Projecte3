import $ from "jquery";
export default function adminpanel() {
  $(function () {
    $("#usertarget").on('click', function () {
      //alert("2");
     $(".hideme").hide();
     $("#userstuff").show();
    });
  });

  $(function () {
    $("#editionstarget").on('click', function () {
      //alert("2");
     $(".hideme").hide();
     $("#editionsstuff").removeClass("invisible");
     $("#editionsstuff").show();
    });
  });
  $(function () {
    $("#showtarget").on('click', function () {
      //alert("2");
     $(".hideme").hide();
     $("#showstuff").removeClass("invisible");
     $("#showstuff").show();
    });
  });
  $(function () {
    $("#representationtarget").on('click', function () {
      //alert("3");
     $(".hideme").hide();
     $("#representationstuff").removeClass("invisible");
     $("#representationstuff").show();
    });
  });
  $(function () {
    $("#locationtarget").on('click', function () {
      //alert("3");
     $(".hideme").hide();
     $("#locationstuff").removeClass("invisible");
     $("#locationstuff").show();
    });
  });
  $(function () {
    $("#resulttarget").on('click', function () {
      //alert("3");
     $(".hideme").hide();
     $("#resultstuff").removeClass("invisible");
     $("#resultstuff").show();
    });
  });

}




