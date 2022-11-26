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
            <div class="border-r-2 flex flex-col gap-4 pt-5 px-4">
                <div id="account_step1" class="text-blue-400 underline">
                    <button class="flex flex-row gap-2">
                        <i class="text-lg font-bolder bi bi-person"></i>
                        <p class="pt-1">Account</p>
                    </button>
                </div>
                
                <div id="account_step2">
                    <button class="flex flex-row gap-2">
                        <i class="text-lg font-bolder bi bi-lock"></i>
                        <p class="pt-1">Password</p>
                    </button>
                </div>
            </div>
            <div class="pt-10 pb-5 px-4 flex flex-col w-full">
                <div id="account__account" class="">
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
                            <input class="border-2 border-gray-400 rounded-md py-0.5 outline-blue-500" type="email" name="mail">
                        </div>
                        <div class="flex flex-col mr-14">
                            <label class="text-gray-500" for="file">Change avatar</label>
                            <input class=" py-0.5" type="file" name="file">
                        </div>
                    </div>
                </div>
                <div id="account__password" class="hidden">
                    <div class="text-xl font-bold">
                        <h2>Change password</h2>
                    </div>
                    <div id="account_password_error" class="opacity-0 hidden mx-auto lg:w-1/2 mt-3 mb-3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                        
                    </div>
                    <div class="grid grid-cols-1 h-full md:w-1/2 mx-auto">
                        <div class="flex flex-col mr-14">
                            <label class="text-gray-500" for="current_password">Current password</label>
                            <input class="border-2 border-gray-400 rounded-md py-0.5 outline-blue-500" type="password" name="current_password">
                        </div>

                        <div class="flex flex-col mr-14">
                            <label class="text-gray-500" for="new_password">New password</label>
                            <input class="border-2 border-gray-400 rounded-md py-0.5 outline-blue-500" type="password" name="new_password">
                        </div>
                        <div class="flex flex-col mr-14">
                            <label class="text-gray-500" for="repeat_password">Repeat password</label>
                            <input class="border-2 border-gray-400 rounded-md py-0.5 outline-blue-500" type="password" name="repeat_password">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mr-14 mt-10">
                    <button id="settings_submit" class="bg-red-600 text-white font-semibold border-2 border-red-600 rounded-md py-0.5 px-3 hover:bg-white hover:text-red-600 transition duration-300 ease-in">Submit</button>
                </div>
            </div>
        </div>
        <form action="" method="post">

        </form>
    </div>
    
    
    <script src="/js/bundle.js"></script>
</body>

</html>