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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="/styles.css">
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
// var_dump($showList[0]);
// die();
?>

<body>
    <div class="h-screen grid grid-cols-1 place-items-center">
        <div class="w-[90%] border rounded-lg px-6 py-9 bg-white border-gray items-center">
            <div class="flex justify-between">
                <div>
                    <p class="text-2xl font-strong">Shows</p>
                    <p class="text-gray-600 text-sm mt-2">List of shows from the edition Fake Circ <?= $date ?></p>
                </div>
                <div class="flex h-full">
                    <div>
                        <button id="cratorShowsButton" class="border border-indigo-600 text-indigo-600 block px-3 py-2 rounded-md text-base font-medium mr-4"><?= $date ?></button>
                        <div id="cratorShowsDropdwon" hidden class="absolute right-50 z-10 mt-2 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <ul class="py-1 h-full text-sm text-gray-700" aria-labelledby="dropdownDefault">
                                <?php
                                for ($i = 0; $i < COUNT($showEditon); $i++) {
                                ?>
                                    <li>
                                        <a value="<?= date("Y", strtotime($showEditon[$i]["dia_inicio_edicion"])) ?>" class="block py-2 px-4 hover:bg-gray-100"><?= date("Y", strtotime($showEditon[$i]["dia_inicio_edicion"])) ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li>
                                    <a href="/creator/shows/addShow" class="block py-2 px-4 bg-gray-50 hover:bg-gray-100">Add Show</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div x-data="{ open: false }" @body-scroll="document.body.style.overflowY = open ? 'hidden' : ''">
                        <button id="addShow" @click="open = !open; $dispatch('body-scroll', {})" class="bg-indigo-600 text-white block px-3 py-2 rounded-md text-base font-medium">Add show</button>
                        <div x-show="open" x-cloak="" class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                            <div @click.away="open = false; $dispatch('body-scroll', {})" class="bg-white rounded shadow-lg p-8 relative w-1/2">
                                <form action="#" method="POST">
                                    <!-- INNER CONTAINER -->
                                    <div class="w-full">
                                        <!-- INFO CONTAINER -->
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <!-- TITLE -->
                                            <div class="flex space-betweeen w-full px-3 mb-6 md:mb-0">
                                                <input id='title_addShow' type="text" placeholder="Title" class="appearance-none block w-full text-gray-700 border border-gray-200 bg-gray-50 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600" />
                                                <p hidden class="text-red-500 text-xs italic">Please fill out this field.</p>
                                            </div>
                                        </div>
                                        <!-- SECOND -->
                                        <div class="flex flex-wrap -mx-3 mb-6 h-full">
                                            <!-- CLASS -->
                                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                <input id='class_addShow' type="text" placeholder="Class" class="appearance-none block w-full text-gray-700 border border-gray-200 bg-gray-50 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600" />
                                                <p hidden class="text-red-500 text-xs italic">Please fill out this field.</p>
                                            </div>
                                            <!-- FILE -->
                                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                <input id="banner_addShow" class="appearance-none block w-full text-gray-700 border border-gray-200 bg-gray-50 rounded-lg py-2.5 px-4 leading-tight focus:outline-none focus:border-indigo-600" aria-describedby="banner_<?= $showList[$i]["id_espectaculo"] ?>" type="file">
                                            </div>
                                        </div>
                                        <!-- DESCRIPTION-->
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3 mb-6 md:mb-0">
                                                <label for="description_addShow" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                                <textarea id="description_addShow" rows="4" class="appearance-none block w-full text-gray-700 border border-gray-200 bg-gray-50 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600 resize-none" placeholder="Some text in here..."></textarea>
                                            </div>
                                        </div>
                                        <!-- BUTTON CONTAINER -->
                                        <div class="flex justify-between">
                                            <button @click="open = false; $dispatch('body-scroll', {})" class="border border-indigo-600 text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">Discard</button>
                                            <button type="submit" id="submitSignup" class="bg-indigo-600 text-white block px-3 py-2 rounded-md text-base font-medium">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                        for ($i = 0; $i < COUNT($showList); $i++) {
                            if ($i == 0) {
                        ?>
                                <tr id="<?= $showList[$i]["id_espectaculo"] ?>" class="bg-white">
                                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap"><?= $showList[$i]["id_espectaculo"] ?></td>
                                    <td data-target="title" scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap"><?= $showList[$i]["nombre_espectaculo"] ?></td>
                                    <td data-target="type" scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap"><?= $showList[$i]["tipo_espectaculo"] ?></td>
                                    <td data-target="description" hidden><?= $showList[$i]["descripcion_espectaculo"] ?>"</td>
                                    <td data-target="banner" scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap">
                                        <a href="#" class="font-medium text-gray-600 border-gray rounded-md"><?= $showList[$i]["imagen_espectaculo"] ?></a>
                                    </td>
                                    <td scope="row" class="py-4 px-6 font-medium text-indigo-900 whitespace-nowrap">
                                        <a href="#" class="font-medium text-indigo-600 hover:underline">Votes</a>
                                    </td>
                                    <td scope="row" class="py-4 px-6 font-medium text-indigo-600 whitespace-nowrap">
                                        <a data-id="<?= $showList[$i]["id_espectaculo"] ?>" data-role="edit" class="cursor-pointer font-medium text-indigo-600 hover:underline">Edit</a>
                                        <!------------------->
                                        <div data-role="editModal" class="hidden" data-modal-backdrop="static" tabindex="-1">
                                            <div class="fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50">
                                                <div class="bg-white rounded shadow-lg p-8 relative w-1/2">
                                                    <form action="#" method="POST">
                                                        <!-- INNER CONTAINER -->
                                                        <div class="w-full">
                                                            <!-- INFO CONTAINER -->
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <!-- TITLE -->
                                                                <div class="flex space-betweeen w-full px-3 mb-6 md:mb-0">
                                                                    <div class="grid place-items-center">
                                                                        <span id="num" class="mr-5 text-lg"></span>
                                                                    </div>
                                                                    <input id='title' type="text" class="appearance-none block w-full text-gray-700 border border-gray-200 bg-gray-50 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600" />
                                                                    <p hidden class="text-red-500 text-xs italic">Please fill out this field.</p>
                                                                </div>
                                                            </div>
                                                            <!-- SECOND -->
                                                            <div class="flex flex-wrap -mx-3 mb-6 h-full">
                                                                <!-- TYPE -->
                                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                                    <input id='type' type="text" class="appearance-none block w-full text-gray-700 border border-gray-200 bg-gray-50 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600" />
                                                                    <p hidden class="text-red-500 text-xs italic">Please fill out this field.</p>
                                                                </div>
                                                                <!-- FILE -->
                                                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                                                    <input id="banner" class="appearance-none block w-full text-gray-700 border border-gray-200 bg-gray-50 rounded-lg py-2.5 px-4 leading-tight focus:outline-none focus:border-indigo-600" aria-describedby="banner_<?= $showList[$i]["id_espectaculo"] ?>" type="file">
                                                                </div>
                                                            </div>
                                                            <!-- DESCRIPTION-->
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3 mb-6 md:mb-0">
                                                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                                                                    <textarea id="description" rows="4" class="appearance-none block w-full text-gray-700 border border-gray-200 bg-gray-50 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600 resize-none" value="<?= $showList[$i]["descripcion_espectaculo"] ?>"></textarea>
                                                                </div>
                                                            </div>
                                                            <!--URL AND QR-->
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3 mb-6 md:mb-0">
                                                                    <div class="flex">
                                                                        <span id="hash" class="appearance-none block w-full text-gray-700 border border-gray-200 bg-gray-50 rounded-l-lg py-3 px-4"></span>
                                                                        <a id="qr" href="#" target="_blank" class="block text-gray-700 border border-gray-200 bg-gray-100 rounded-r-lg py-3 px-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- BUTTON CONTAINER -->
                                                            <div class="flex justify-between">
                                                                <a data-role="discardChanges" class="cursor-pointer border border-indigo-600 text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">Discard changes</a>
                                                                <button type="submit" class="bg-indigo-600 text-white block px-3 py-2 rounded-md text-base font-medium">Apply changes</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!------------------->
                                    </td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr class="bg-white border-t">
                                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap"><?= $showList[$i]["id_espectaculo"] ?></td>
                                    <td scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap"><?= $showList[$i]["nombre_espectaculo"] ?></td>
                                    <td scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap"><?= $showList[$i]["tipo_espectaculo"] ?></td>
                                    <td scope="row" class="py-4 px-6 font-medium text-gray-600 whitespace-nowrap">
                                        <a href="#" class="font-medium text-gray-600 border-gray rounded-md"><?= $showList[$i]["imagen_espectaculo"] ?></a>
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
        <div>

        </div>
        <div class="botBar">

        </div>
    </div>
    <script src="/js/bundle.js"></script>
</body>

</html>