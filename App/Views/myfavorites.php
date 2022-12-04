<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <?php include "../App/Views/navbar_user.php"; ?>
    <div class=" w-full h-screen bg-gray-200 flex justify-center">
        <div class="py-10 px-10">
            <div class="mb-10">
                <div class="font-bold text-3xl">
                    My Favorites
                </div>
                <div>
                    Manage your favorites
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                <!--FAVORITE INFO-->
                <?php foreach ($shows as $show) { ?>
                    <?php if ($fav[$show['id_espectaculo']]) { ?>

                        <div id="favorite_card-<?php echo($show['id_espectaculo']) ?>" class="bg-white flex flex-col items-center shadow-xl shadow-gray-500">
                            <div class="grid grid-cols-2 grid-row-1 border-b-[1px] border-black">
                                <div>
                                    <img class="h-[300px]" src="/img/shows/<?php echo ($show['imagen_espectaculo']) ?>" alt="" srcset="">
                                </div>
                                <div class="py-4">
                                    <div>
                                        <b><?php echo ($show['nombre_espectaculo']) ?></b>
                                    </div>
                                    <br>
                                    <div>
                                        <?php echo ($show['descripcion_espectaculo']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-3 py-3">
                                <button id="<?php echo ($show['id_espectaculo']) ?>" class="remove text-white bg-red-600 rounded border-[1px] border-red-600 py-1 px-1 transition ease-in duration-300 hover:bg-white hover:text-red-600">
                                    <i class="bi bi-trash-fill"></i> Remove
                                </button>
                                <div class="bg-blue-600 p-1 text-white rounded border-[1px] border-blue-600 transition ease-in duration-300 hover:bg-white hover:text-blue-600">
                                    <a href="/show/id=<?php echo ($show['id_espectaculo']) ?>"><i class="bi bi-info-circle-fill"></i> More info</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <!--END FAVORITE INFO-->
            </div>
        </div>
    </div>
    </div>
    <script src="/js/bundle.js"></script>
</body>

</html>