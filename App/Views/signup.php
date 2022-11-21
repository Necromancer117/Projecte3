<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/styles.css">

    <title>Sign Up </title>
    <!--Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/bundle.js"></script>
</head>

<body class="grid place-items-center h-screen bg-cover bg-center bg-no-repeat" style="background-image: url(img/login-bg.jpg)">
    <!-- CONTAINER -->
    <div class="flex place-content-center">
        <!-- BOX -->
        <div class="rounded-lg p-8 grid bg-white border border-black">
            <!-- HEADER -->
            <div class="my-4">
                <img src="./img/logo.png" class="h-12">
            </div>
            <!-- TITLE -->
            <div class="my-6 font-semibold text-xl">Create your Fake Circus account
            </div>
            <!-- FORM -->
            <form id="signupForm" action="/signup" method="POST" class="">
                <!-- INNER CONTAINER -->
                <div class="w-full max-w-lg">
                    <!-- INFO CONTAINER -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <!-- NAME -->
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <input id='nameSignup' name="firstName" ype="text" placeholder="Name" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-400" />
                            <p hidden id="fillName" class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                        <!-- LAST NAME -->
                        <div class="w-full md:w-1/2 px-3">
                            <input id='lastSignup' name="secondName" type="text" placeholder="Last Name" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-400">
                            <p hidden id="fillLast" class=" text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                    </div>
                    <!-- EMAIL CONTAINER -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input id='emailSignup' name="email" type="email" name="email" placeholder="Email" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-400">
                            <p hidden id="fillEmail" class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                    </div>
                    <!-- PASSWORD CONTAINER -->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <!-- PASSWORD -->
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <input type="password" name="password" placeholder="Password" id="input_pass" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-400">
                            <p hidden id="fillPasword" class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                        <!-- CONFIRM -->
                        <div class="w-full md:w-1/2 px-3">
                            <input type="password" placeholder="Confirm" id="confirmPass" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-400">
                        </div>
                        <div hidden class="w-full px-3" id=alertPassword>
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Incorrect password.</strong>
                                <span class="block sm:inline">Passwords do not match.</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- BUTTON SHOW PASSWORD -->
                    <div class="-mx-3 mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <input class="w-4 h-4" type="checkbox" name="showPassword" id="show_pass">
                            <label for="showPassword">Show Password</label>
                        </div>
                    </div>
                    <!-- BUTTON CONTAINER -->
                    <div class="flex justify-between">
                        <a href="/login" class="text-blue-500 hover:text-blue-700 self-center duration-200"> Sign in instead</a>
                        <button type="submit" id="submitSignup" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded duration-200">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>