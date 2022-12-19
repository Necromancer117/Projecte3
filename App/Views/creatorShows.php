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
    <script src="js/bundle.js"></script>

    <title></title>

</head>

<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                        <!--
                        Icon when menu is closed.
            
                        Heroicon name: outline/bars-3
            
                        Menu open: "hidden", Menu closed: "block"
                        -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                        <!--
                        Icon when menu is open.
            
                        Heroicon name: outline/x-mark
            
                        Menu open: "block", Menu closed: "hidden"
                        -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <img class="block h-8 w-auto lg:hidden" src="/img/logo.png" alt="Fake Circ logo">
                    <img class="hidden h-8 w-auto lg:block" src="/img/logo.png" alt="Fake Circ logo">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="/creator/dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>

                        <a href="/creator/shows" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Shows</a>

                        <a href="/creator/representations" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Representations</a>

                        <a href="/creator/locations" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Locations</a>
                    </div>
                </div>
            </div>
            
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div class="relative ml-3">
                    <div>
                        <button type="button" id="profileImage" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img name='avatar' class="h-8 w-8 rounded-full" src="/img/<?php echo ($avatar) ?>" alt="" srcset="">
                        </button>
                    </div>

                    <div id="creatorDropDown" hidden class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Support</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="/creator/dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>

            <a href="/creator/shows" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Shows</a>

            <a href="/creator/representations" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Representations</a>

            <a href="/creator/locations" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Locations</a>
        </div>
    </div>
</nav>
<?php
var_dump($showList);
die();
?>


<body>
<div class="h-screen grid grid-cols-1 place-items-center">
        <div class="w-[90%] border rounded-lg px-6 py-9 bg-white border-gray items-center">
            <div class="flex justify-between">
                <div>
                    <p class="text-2xl font-strong">Shows</p>
                    <p class="text-gray-600 text-sm mt-2">List of shows from the edition Fake Circ <?=$edition?></p>
                </div>
                <div class="flex h-full">
                    <div>
                        <button class="border border-indigo-600 text-indigo-600 block px-3 py-2 rounded-md text-base font-medium mr-4"><?=$edition?></button>
                        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                <?php
                                    for ($i=0; $i < COUNT($showEditon); $i++) { 
                                        ?>
                                        <li>
                                            <a href="/creator/shows/<?=date("Y", strtotime($showEditon[$i]["dia_inicio_edicion"]))?>" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><?= date("Y", strtotime($showEditon[$i]["dia_inicio_edicion"]))?></a>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <a href="#" class="bg-indigo-600 text-white block px-3 py-2 rounded-md text-base font-medium">Add show</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-900 mt-10">
                    <thead class="bg-white border-b border-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">#</th>
                            <th scope="col" class="py-3 px-6">Title</th>
                            <th scope="col" class="py-3 px-6">Class</th>
                            <th scope="col" class="py-3 px-6">Banner</th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Votes</span>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i=0; $i < 10; $i++) { 
                                if ($i == 0) {
                                    ?>
                                    <tr class="bg-white" >
                                        <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">1</td>
                                        <td scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap">Cownon</td>
                                        <td scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap">Bufet</td>
                                        <td scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap">
                                            <a href="#" class="font-medium text-gray-600 border-gray rounded-md">cownon.png</a>
                                        </td>
                                        <td scope="row" class="py-4 px-6 font-medium text-indigo-900 whitespace-nowrap">
                                            <a href="#" class="font-medium text-indigo-600 hover:underline">Votes</a>
                                        </td>
                                        <td scope="row" class="py-4 px-6 font-medium text-indigo-600 whitespace-nowrap">
                                            <a href="#" class="font-medium text-indigo-600 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                else {
                                    ?>
                                    <tr class="bg-white border-t" >
                                        <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">2</td>
                                        <td scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap">Cownon</td>
                                        <td scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap">Bufet</td>
                                        <td scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap">
                                            <a href="#" class="font-medium text-gray-600 border-gray rounded-md">cownon.png</a>
                                        </td>
                                        <td scope="row" class="py-4 px-6 font-medium text-indigo-900 whitespace-nowrap">
                                            <a href="#" class="font-medium text-indigo-600 hover:underline">Votes</a>
                                        </td>
                                        <td scope="row" class="py-4 px-6 font-medium text-indigo-600 whitespace-nowrap">
                                            <a href="#" class="font-medium text-indigo-600 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="botBar">

        </div>
    </div>
</body>

</html>