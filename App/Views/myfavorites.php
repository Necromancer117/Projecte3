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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white flex flex-col items-center shadow-xl shadow-gray-500">
                    <div class="grid grid-cols-2 grid-row-1 border-b-[1px] border-black">
                        <div>
                            <img class="object-fill h-full" src="/img/shows/show1.png" alt="" srcset="">
                        </div>
                        <div class="py-4">
                            <div>
                                <b>Description:</b>
                            </div>
                            <br>
                            <div>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, velit doloremque saepe est nihil quod minus quaerat necessitatibus omnis beatae dolore neque ad facilis odio. Quaerat delectus optio nisi alias?
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-3 py-3">
                        <button class="text-white bg-red-600 rounded border-[1px] border-red-600 py-1 px-1 transition ease-in duration-300 hover:bg-white hover:text-red-600">
                            <i class="bi bi-trash-fill"></i> Remove
                        </button>
                        <div class="bg-blue-600 p-1 text-white rounded border-[1px] border-blue-600 transition ease-in duration-300 hover:bg-white hover:text-blue-600">
                            <a href="/show/id=1"><i class="bi bi-info-circle-fill"></i> More info</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="/js/bundle.js"></script>
</body>

</html>