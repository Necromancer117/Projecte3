<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Tailwind CSS -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="/css/styles.css">
    <title>Document</title>
</head>

<body>
    <?php include "../App/Views/navbar_user.php"; ?>
    <!-- MAIN CONTENT -->
    <div class="min-h-screen flex flex-col justify-start">
        <div class="text-center bg-black font-black text-amber-200 text-5xl underline">
            <div class="mx-auto py-4">
                <h1 class=" text-5xl">Rate our Show</h1>
            </div>
        </div>
        <div class="text-center border-b border-black my-5">
            <h2 class="text-4xl font-extrabold"><?php echo ($show['nombre_espectaculo']) ?></h2>
        </div>
        <div class="mx-auto w-[300px]">
            <img src="/img/shows/<?php echo ($show['imagen_espectaculo']) ?>" alt="">
        </div>
        <!-- RATING -->
        <?php if (!$voted) { ?>


            <div id="setRate" class="border-lg flex gap-1 flex-col items-center mt-6">
                <div class="bg-black text-white bg-opacity-60 border rounded-lg border-black px-28 py-4">
                    <div class="text-center flex flex-col gap-3">
                        <p id="emoji" class="text-4xl">&#10024</p>
                        <p id="rating" class="text-3xl font-thin">Rating</p>
                    </div>
                    <div class="flex text-4xl text-yellow-400">
                        <div class="star" id="star-1" data-rate="1">
                            <i class=" bi bi-star"></i>
                            <p class="text-white text-xl text-center">1</p>
                        </div>
                        <div class="star" id="star-2" data-rate="2">
                            <i class=" bi bi-star"></i>
                            <p class="text-white text-xl text-center">2</p>
                        </div>
                        <div class="star" id="star-3" data-rate="3">
                            <i class=" bi bi-star"></i>
                            <p class="text-white text-xl text-center">3</p>
                        </div>
                        <div class="star" id="star-4" data-rate="4">
                            <i class=" bi bi-star"></i>
                            <p class="text-white text-xl text-center">4</p>
                        </div>
                        <div class="star" id="star-5" data-rate="5">
                            <i class=" bi bi-star"></i>
                            <p class="text-white text-xl text-center">5</p>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="text-4xl mx-auto lg:w-1/2 mt-3 mb-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    You have already voted !
                </div>
            <?php } ?>
            </div>

            <div id="thankYou" class="mx-auto opacity-0 hidden">
                <img class="w-[300px]" src="/img/thank-you-6.gif" alt="">
            </div>
            <div id="vote_send" class="opacity-0 text-center my-5">
                <button class="bg-red-600 text-white text-lg py-2 px-6 border rounded-lg" data-show_id="<?php echo ($show['id_espectaculo']) ?>">Send</button>
            </div>
    </div>

    <!-- END RATING -->
    <!-- END MAIN CONTENT -->
    <?php include '../App/Views/footer.php' ?>
    <script src="/js/bundle.js"></script>
</body>

</html>