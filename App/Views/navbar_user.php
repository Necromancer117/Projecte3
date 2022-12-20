  <div class="py-3 flex flex-col md:flex-row underline decoration-white text-white font-bold bg-red-600 z-10">

    <div class=" text-[50px] ml-6 flex flex-row justify-center md:justify-start">
      <a href="/"><img class="w-[130px]" src="/img/logo.png" alt="logo" srcset=""></a>
    </div>
    <div class="flex flex-row gap-12 text-end items-center justify-self-end mx-auto mt-6 md:mt-0 md:ml-auto md:mr-6 text-lg text-yellow-400">
      <!-- <div>
        <a class=" transition duration-200 ease-in hover:text-white" href="#">FakeCirc 2023</a>
      </div> -->
      <?php if ($loged) { ?>
        <div>
          <a class=" transition duration-200 ease-in hover:text-white" href="/user/favorites">My favorites</a>
        </div>
        <div class="flex items-center">

          <div class="relative inline-block text-left block">
            <!-- AVATAR -->
            <?php if ($loged) { ?>
              <div>
                <button aria-label="settings"><img id="avatar" name='avatar' class="w-12 border-2 rounded-full transition duration-400 hover:border-blue-600 ml-4" src="/img/<?php echo ($avatar) ?>" alt="" srcset=""></button>
                </button>
              </div>
            <?php } ?>
            <!-- DROPDOWN -->
            <div class="user_options hidden opacity-0 h-0 w-0 absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" id="">
              <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <span class="text-sm font-bold px-4 py-3">Hi: <?= $user ?></span>
                <a href="/account/settings" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
                <a href="#" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
                <a href="/logout" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-2">log out</a>
              </div>
            </div>
          <?php } else { ?>
            <!-- END AVATAR -->
            <a class=" transition duration-200 ease-in hover:text-white" href="/login">Sign In</a>
          <?php } ?>
          </div>
        </div>
    </div>
  </div>