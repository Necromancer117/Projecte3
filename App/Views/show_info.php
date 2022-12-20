<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> -->
    <link rel="stylesheet" href="/css/leaflet.css">
    <link rel="stylesheet" href="/css/styles.css">
    <!--<link rel="stylesheet" href="css/output.css">-->
    <title>Fake Circ</title>
</head>

<body>
    <?php include "../App/Views/navbar_user.php"; ?>
    <!-- SHOW INFO -->
    <div class="bg-black text-center py-5">
        <p class="font-extrabold text-amber-200 text-5xl underline"><?php echo ($data['show']['nombre_espectaculo']) ?></p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 container mx-auto my-12 border-black">

        <div class="border-b-2 lg:border-b-0 lg:border-r-2 border-black">
            <img class="w-[400px] mx-auto" src="/img/shows/<?php echo ($data['show']['imagen_espectaculo']) ?>" alt="" srcset="">
        </div>
        <div class="flex text-center mt-10 lg:mt-0">
            <div class="mx-32 my-auto">
                <p><?php echo ($data['show']['descripcion_espectaculo']) ?></p>
            </div>
        </div>
    </div>
    <!-- END SHOW INFO -->
    <?php if (!empty($data['mapinfo'])) { ?>
    <!-- TABLE -->
    <div class="py-12 flex flex-col justify-center overflow-x-auto px-10">
    <input aria-label="search table" class="border border-black rounded-lg mb-3 w-1/2 p-2" type="text" id="search_city"  placeholder="Search your city..">
        <table id="show_list" class="overflow-hidden border-spacing-6 table-auto border w-full shadow-xl rounded-lg">
            <thead class="text-white bg-slate-800">
                <tr id="header" class="">
                    <th class="py-3">Show name</th>
                    <th>Date</th>
                    <th>Hour start</th>
                    <th>Hour end</th>
                    <th>Location</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody class="text-center ">
                <?php foreach ($data['mapinfo'] as $info) { ?>
                    <tr class="border-y-2">
                        <td><?php echo ($data['show']['nombre_espectaculo']) ?></td>
                        <td><?php echo ($info['fecha_inicio_representacion']) ?></td>
                        <td><?php echo ($info['hora_inicio_representacion']) ?></td>
                        <td><?php echo ($info['hora_fin_representacion']) ?></td>
                        <td class="overflow-y-auto w-60" id="loc_<?php echo ($info['id_representacion']) ?>">
                        <div class="w-full h-16 overflow-y-auto "><img class="w-[150px]" src="/img/loading.gif" alt=""></div>
                        </td>
                        <td id="city_<?php echo ($info['id_representacion']) ?>"><img class="w-[150px]" src="/img/loading.gif" alt=""></td>
                    </tr>
                <?php } ?>
            </tbody>


        </table>
    </div>
    <!-- END TABLE -->
    <?php } ?>
    <!-- MAP -->
    <div class="bg-black text-center py-5">
        <p class="font-extrabold text-amber-200 text-5xl underline">Locations</p>
    </div>
    <div id="map" class="h-[300px]" data-mapInfo='<?php echo (json_encode($data['mapinfo'])) ?>'></div>
    <!-- END MAP -->
    <script src="/js/bundle.js"></script>
</body>

</html>