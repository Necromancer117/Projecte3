<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="../css/leaflet.css">
    <!--<link rel="stylesheet" href="css/output.css">-->
    <title>Fake Circ</title>
</head>

<body>
    <?php include "../App/Views/navbar_user.php"; ?>
    <div class="bg-black text-center py-5">
        <p class="font-extrabold text-amber-200 text-5xl underline"><?php echo ($data['show']['nombre_espectaculo']) ?></p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 container mx-auto my-12">

        <div class="border-r-2 border-black">
            <img class="w-[400px] mx-auto" src="../img/shows/<?php echo ($data['show']['imagen_espectaculo']) ?>" alt="" srcset="">
        </div>
        <div class="flex text-center">
            <div class="mx-32 my-auto">
                <p><?php echo($data['show']['descripcion_espectaculo']) ?></p>
            </div>
        </div>
    </div>
    <div class="bg-black text-center py-5">
        <p class="font-extrabold text-amber-200 text-5xl underline">Locations</p>
    </div>
    <div id="map" class="h-[300px]" data-mapInfo='<?php echo($data['mapinfo'])?>'></div>
    <script src="../js/bundle.js"></script>
</body>

</html>