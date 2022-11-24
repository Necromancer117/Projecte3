import $ from "jquery";
export default function adminpanel() {
  $(function () {
    $("#usertarget").on('click', function () {
      alert("2");
     $(".hideme").hide();
     $("#userstuff").show();
    });
  });
}




