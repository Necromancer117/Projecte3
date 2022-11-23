  <div class="py-3 flex flex-row underline decoration-white text-white font-bold bg-red-600">

    <div class=" text-[50px] ml-6">
      <a href="/"><img class="w-[130px]" src="../img/logo.png" alt="" srcset=""></a>
    </div>
    <div class="flex flex-row gap-12 text-end items-center justify-self-end ml-auto mr-20 text-lg text-yellow-400">
      <div>
        <a class=" transition duration-200 ease-in hover:text-white" href="#">FakeCirc 2023</a>
      </div>
      <div>
        <a class=" transition duration-200 ease-in hover:text-white" href="#">Old Circ</a>
      </div>
      <div class="flex items-center">

        <div class="relative inline-block text-left">
          <?php if ($loged) { ?>
            <div>
            <button><img id="avatar" name='avatar' class="w-12 border-2 rounded-full transition duration-400 hover:border-blue-600 ml-4" src="../img/defaultAvatar.jpg" alt="" srcset=""></button>
            </button>
          </div>

          <div class=" opacity-0 h-0 w-0 absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" id="user_options">
            <div class="py-1" role="none">
              <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
              <a href="#" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
              <a href="#" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
              <a href="#" class="item text-gray-700 block px-4 py-2 text-sm hover:bg-gray-200" role="menuitem" tabindex="-1" id="menu-item-2">log out</a>
            </div>
          </div>
         <?php }else { ?>
          <a class=" transition duration-200 ease-in hover:text-white" href="/login">Sign In</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

