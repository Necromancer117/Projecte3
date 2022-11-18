<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <!--<link rel="stylesheet" href="css/output.css">-->
  <title>Document</title>
</head>

<body>
  <div class="py-3 flex flex-row underline decoration-white text-white font-bold bg-red-600">

    <div class=" text-[50px] ml-6">
      <a href="#"><img class="w-[100px]" src="img/logo.png" alt="" srcset=""></a>
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
          <div>
            <button><img id="avatar" name='avatar' class="w-12 border-2 rounded-full transition duration-400 hover:border-blue-600 ml-4" src="img/defaultAvatar.jpg" alt="" srcset=""></button>
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
        </div>
      </div>
    </div>
  </div>
  <script src="js/bundle.js"></script>
</body>

</html>