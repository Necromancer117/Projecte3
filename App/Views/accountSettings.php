<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <title>Document</title>
</head>

<body class="bg-gray-100">
    <?php include "../App/Views/navbar_user.php"; ?>
    <div class="flex flex-col place-items-center my-auto">
        <div class="w-[80%] flex-col gap-6 my-7">
            <div>
                <h1 class="text-3xl font-bold">Account Settings</h1>
            </div>
            <div>
                <p class="text-lg text-gray-600">Change your profile and account settings</p>
            </div>
        </div>
        <div class="w-[80%] rounded shadow-lg mx-auto border-2 bg-white flex">
            <div class="border-r-2 flex flex-col gap-4 py-10 px-4">
                <div>
                    <p><i class="text-lg font-bolder bi bi-person"></i> Account</p>
                </div>
                <div>
                    <p><i class="text-lg font-bolder bi bi-lock"></i> Password</p>
                </div>
            </div>
            <form class="py-10 px-4 flex flex-col w-full" action="" method="post">
                <div>
                    <h2 class="text-xl font-bold">General info</h2>
                </div>
                <div class="grid grid-cols-1 grid-rows-4 md:grid-cols-2 md:grid-rows-2 h-full">
                    <div class="flex flex-col mr-14">
                        <label class="text-gray-500" for="first_name">First name</label>
                        <input class="border-2 border-gray-400 rounded-md py-0.5 outline-blue-500" type="text" name="first_name">
                    </div>
                    <div class="flex flex-col mr-14">
                        <label class="text-gray-500" for="last_name">Last name</label>
                        <input class="border-2 border-gray-400 rounded-md py-0.5 outline-blue-500" type="text" name="last_name">
                    </div>
                    <div class="flex flex-col mr-14">
                        <label class="text-gray-500" for="mail">E-mail</label>
                        <input class="border-2 border-gray-400 rounded-md py-0.5 outline-blue-500" type="text" name="mail">
                    </div>
                    <div class="flex flex-col mr-14">
                        <label class="text-gray-500" for="file">Change avatar</label>
                        <input class=" py-0.5" type="file" name="file">
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="/js/bundle.js"></script>
</body>

</html>