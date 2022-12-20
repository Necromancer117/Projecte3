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

</head>

<body>
    <div hidden id="num"><?= $id ?></div>
    <div class="h-screen grid grid-cols-1 place-items-center">
        <div class="w-[90%] border rounded-lg px-6 py-9 bg-white border-gray items-center">
            <div class="grid grid-cols-1 place-items-center">
                <h1 id="title" class="text-3xl align-center"><?= $title ?></h1>
            </div>
            <div>
                <label for="description" class="px-3 text-sm">Description:</label>
                <p id="description" class="border rounded-lg p-3"><?= $description ?></p>
            </div>
            <div class="grid grid-cols-1 place-items-center">
                <canvas id="qr" width="200" height="200"> </canvas>
            </div>
        </div>
    </div>
    <script src="/js/bundle.js"></script>
</body>

</html>