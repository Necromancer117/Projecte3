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
  <link rel="stylesheet" href="/styles.css">
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
        <?php if (isset($user)) { ?>
          <div>
            <a class="rounded p-2 transition bg-white duration-200 ease-in hover:bg-black hover:text-white" href="/user/favorites">My Favorites</a>
          </div>
        <?php } ?>
        <div class="ml-6">
          <!--CHECK IF USER IS LOG-->
          <?php if (isset($user)) { ?>
            <div class="relative my-auto mt-[-20px] mr-[-30px] inline-block text-left">
              <div>
                <button><img id="avatar" name='avatar' class="w-16 border-2 rounded-full transition duration-400 hover:border-blue-600 ml-4" src="img/<?php echo ($avatar) ?>" alt="" srcset=""></button>
                </button>
              </div>

              <div class=" opacity-0 h-0 w-0 absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" id="user_options">
                <div class="py-1" role="none">
                  <span class="text-sm font-bold px-4 py-3"><?= $user ?></span>
                  <a href="/account/settings" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
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

        <div class="relative group">
          <a href="/show/id=<?php echo ($show['id_espectaculo']) ?>">
            <img class="object-fill h-full w-full poster" src="img/shows/<?php echo ($show['imagen_espectaculo']) ?>" alt="" srcset="">
            <div class='img__overlay absolute top-0 left-0 w-full h-full bg-black opacity-0 bg-opacity-60 flex flex-col items-center justify-center transition duration-200 ease-in group-hover:opacity-100'>
              <div class="overlay__title transition duration-200 ease-in group-hover:translate-y-0 translate-y-10 text-white text-center text-4xl font-bold hover:text-amber-500"><?php echo ($show['nombre_espectaculo']) ?></div>
              <p class="overlay__description transition duration-200 ease-in group-hover:translate-y-0 translate-y-10 text-white text-center mt-4">
                Click for more info here!
              </p>
            </div>
          </a>
          <?php if (isset($user)) { ?>
            <div class="opacity-0 absolute top-6 left-6 group-hover:opacity-100 transition-all duration-200 hover:scale-125">
              <button class="favorite <?php if ($fav[$show['id_espectaculo']]) {
                                        echo ('active');
                                      } ?>" id="<?php echo ($show['id_espectaculo']) ?>" style="z-index: 100;">
                <i class="bi bi-heart-fill <?php if ($fav[$show['id_espectaculo']]) {
                                              echo ('text-red-600');
                                            } else {
                                              echo ('text-white');
                                            } ?>  stroke-1 text-opacity-100 text-3xl transition duration-200 ease-in hover:text-red-600"></i></button>
            </div>
          <?php } ?>
        </div>

      <?php } ?>

    </div>
    <div class="bg-black text-center py-5 ">
      <span class="font-extrabold text-transparent text-7xl bg-clip-text bg-gradient-to-r from-[#BF953F] via-[#FCF6BA] to-[#B38728]">Locations</span>
    </div>
    <!--END SHOWS LIST-->
    <!--MAP-->
    <div class="grid grid-cols-1">
      <div id="map" class="h-[300px]" data-mapInfo='<?php echo (json_encode($data['mapinfo'])) ?>'></div>
      <div name='proxima_edicion'></div>
    </div>
    <!--END MAP-->
    <!--MESSAGE FORM-->
    <?php if (isset($user)) { ?>


      <div class="bg-black text-center py-5 ">
        <span class="font-extrabold text-transparent text-7xl bg-clip-text bg-gradient-to-r from-[#BF953F] via-[#FCF6BA] to-[#B38728]">Send us a message</span>
      </div>

      <div class="min-h-[300px] bg-center bg-no-repeat bg-cover relative" style="background-image:url(/img/bg_form.jpg);">
        <div class="relative top-0 left-0 bg-black w-full min-h-[300px] bg-opacity-60 py-10 px-5 flex flex-col">
          <div class="flex flex-col items-center">
            <label class="text-white" for="select">Message category: </label>
            <select class="w-1/2 bg-red-900 py-3 pl-2 rounded-lg text-white" name="message_category" id="select_message">
              <option disabled selected><i class="bi bi-question-diamond-fill"></i> Select an option</option>
              <option value="question">Question</option>
              <option value="incident">Incident</option>
            </select>
          </div>
          <div id="if_question" class="hidden flex flex-col items-center my-5">
            <div class="w-1/2">
              <textarea class="resize-none border w-full border-black p-2" name="question" id="question" rows="5" placeholder="Type your question here"></textarea>
            </div>
            <div>
              <button id="question_submit" class="hidden bg-red-600 text-white font-semibold border-2 border-red-600 rounded-md py-0.5 px-3 hover:bg-white hover:text-red-600 transition duration-300 ease-in">Submit</button>
            </div>
          </div>
          <div id="if_incident" class="hidden flex flex-col gap-3 items-center my-5 w-1/2 mx-auto">
            <div class="grid grid-cols-1 gap-3 w-full">
              <select class="w-full pl-2 bg-red-900 py-3 rounded-lg text-white" name="incidence_show" id="incidence_show">
                <option disabled selected><i class="bi bi-question-diamond-fill"></i>What show ?</option>
                <?php foreach ($shows as $show) { ?>
                  <option value="<?php echo ($show['nombre_espectaculo']) ?>"><?php echo ($show['nombre_espectaculo']) ?></option>
                <?php } ?>
              </select>
              <select class="w-full pl-2 bg-red-900 py-3 rounded-lg text-white" name="incidence_show" id="incidence_location">
                <option disabled selected><i class="bi bi-question-diamond-fill"></i>Where ?</option>
                <?php foreach ($data['mapinfo'] as $location) { ?>
                  <option value="<?php echo ($location['nombre_espacio']) ?>"><?php echo ($location['nombre_espacio']) ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="w-full">
              <textarea class="resize-none border w-full border-black p-2" name="incidence" id="incidence" rows="5" placeholder="Type your message here"></textarea>
            </div>
            <div>
              <button id="incidence_submit" class="hidden bg-red-600 text-white font-semibold border-2 border-red-600 rounded-md py-0.5 px-3 hover:bg-white hover:text-red-600 transition duration-300 ease-in">Submit</button>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <!--END MESSAGE FORM-->
    <?php
    include "../App/Views/footer.php";
    ?>

    <script src="./js/bundle.js"></script>
</body>

</html>