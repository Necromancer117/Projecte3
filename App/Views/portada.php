<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--Bootstrap icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./css/leaflet.css">


  <title>Fake circ</title>
</head>

<body>
  <div class="bg-cover bg-center bg-no-repeat" style="background-image: url(img/portada-bg.jpg)">
    <div class="flex flex-row underline decoration-white text-white font-bold bg-black bg-opacity-20">
      <div class=" text-[50px] my-4 ml-6">
        <a href="#"><img class="w-[200px]" src="img/logo.png" alt="" srcset=""></a>
      </div>
      <div class="flex flex-row gap-12 text-end justify-self-end ml-auto mr-20 mt-10 text-2xl text-black">
        <div>
          <a class="rounded p-2 transition bg-white duration-200 ease-in hover:bg-black hover:text-white" href="#">FakeCirc 2023</a>
        </div>
        <div>
          <a class="rounded p-2 transition bg-white duration-200 ease-in hover:bg-black hover:text-white" href="#">Old Circ</a>
        </div>
        <div class="ml-6">
          <!--CHECK IF USER IS LOG-->
          <?php if ($user != '') { ?>
            <div class="relative my-auto mt-[-20px] mr-[-30px] inline-block text-left">
              <div>
                <button><img id="avatar" name='avatar' class="w-16 border-2 rounded-full transition duration-400 hover:border-blue-600 ml-4" src="img/defaultAvatar.jpg" alt="" srcset=""></button>
                </button>
              </div>

              <div class=" opacity-0 h-0 w-0 absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" id="user_options">
                <div class="py-1" role="none">
                  <span class="text-sm font-bold px-4 py-3"><?= $user ?></span>
                  <a href="#" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
                  <a href="#" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
                  <a href="#" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-2">log out</a>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <a class="rounded p-2 transition bg-white duration-200 ease-in hover:bg-black hover:text-white" href="/login">Sign In</a>
          <?php } ?>
          <!--END CHECK-->
        </div>
      </div>
    </div>
    <div class="h-[90vh] flex">
      <div class="xl:w-[500px] md:w-[450px]  rounded text-white ml-10 h-[90%] font-bold text-center my-auto bg-black bg-gradient-to-r p-[6px] from-[#BF953F] via-[#FCF6BA] to-[#B38728]">
        <div class="flex flex-col justify-between h-full bg-black text-white rounded-lg p-4">
          <span class="font-extrabold my-auto text-transparent lg:text-7xl md:text-6xl bg-clip-text bg-gradient-to-r from-[#BF953F] via-[#FCF6BA] to-[#B38728]">THE GREATEST SHOW OF EUROPE!</span>
        </div>
      </div>
    </div>
    <div class="bg-white">

    </div>
  </div>
  <div>
    <!--START SHOWS LIST-->
    <div class="bg-black text-center py-5 ">
      <span class="font-extrabold text-transparent text-7xl bg-clip-text bg-gradient-to-r from-[#BF953F] via-[#FCF6BA] to-[#B38728]">Our shows</span>
    </div>
    <div class="grid gap-1 grid-cols-3">
      <?php foreach ($shows as $show) { ?>

        <div class="relative">
          <a href="/show/id=<?php echo ($show['id_espectaculo']) ?>">
            <img class="object-fill h-full w-full" src="img/shows/<?php echo ($show['imagen_espectaculo']) ?>" alt="" srcset="">
            <div class='img__overlay group absolute top-0 left-0 w-full h-full bg-black opacity-0 bg-opacity-60 flex flex-col items-center justify-center transition duration-200 ease-in hover:opacity-100'>
              <div class="overlay__title transition duration-200 ease-in group-hover:translate-y-0 translate-y-10 text-white text-center text-4xl font-bold hover:text-amber-500"><?php echo ($show['nombre_espectaculo']) ?></div>
              <p class="overlay__description transition duration-200 ease-in group-hover:translate-y-0 translate-y-10 text-white text-center mt-4">
                Click for more info here!
              </p>
            </div>
          </a>

        </div>

      <?php } ?>

    </div>
    <div class="bg-black text-white text-4xl text-center py-5 font-bold"></div>
    <!--END SHOWS LIST-->
    <div class="grid grid-cols-2">
      <div id="map" class="h-[300px]" data-mapInfo='<?php echo (json_encode($data['mapinfo'])) ?>'></div>
      <div name='proxima_edicion'></div>
    </div>

    <?php
    include "../App/Views/footer.php";
    ?>

    <script src="./js/bundle.js"></script>
</body>

</html>