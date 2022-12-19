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
  $(function(){
    $("#rnd-btn").on('click',function(){
      event.preventDefault();
      $.ajax({
        url: 'https://randomuser.me/api/',
        dataType: 'json',
        success: function(data) {
          //console.log(data);
          const decoded=Object.values(data);
          //console.log(decoded);
          const layer2=Object.values(decoded[0]);
          //console.log(layer2);
          const layer3=Object.values(layer2[0]);
          const mail=layer3[3];
          console.log(layer3);
          console.log(mail);
          const nameprops=Object.values(layer3[1]);
          const name=nameprops[1];
          const surename=nameprops[2];
          const pwdprops=Object.values(layer3[4]);
          const pwd=pwdprops[1];
          const avatar="defaultAvatar.jpg";
          //console.log(pwdprops);
          $('input[name="insertusername"]').val(name);
          $('input[name="insertusersurename"]').val(surename);
          $('input[name="insertusermail"]').val(mail);
          $('input[name="insertuserpassword"]').val(pwd);
          
          $('input[name="insertuseravatar"]').val(avatar);
          
        }
      });
  });
  });

}




