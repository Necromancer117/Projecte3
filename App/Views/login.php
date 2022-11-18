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
  <link rel="stylesheet" href="/styles.css">

  <title>Fake circ Login</title>
</head>

<body>
  <div class="bg-cover bg-center bg-no-repeat" style="background-image: url(img/login-bg.jpg)">
    <div class="h-screen grid grid-cols-1 place-items-center">
      <div class="w-[30%]">
        <div class="border-2 rounded px-12 py-10 bg-white border-black">
          <div class=" items-center">
            <div class="text-center text-5xl font-semibold mb-10">
              Sign In
            </div>
            <div class="text-center text-lg mb-5">
              Enter to your Fake Circ account
            </div>
            <div class="flex flex-col gap-3 mb-5">
              <div class="border rounded">
                <input class="text-lg bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none" type="text" name="email" placeholder="Email">
              </div>
              <div>
                <input id="input_pass" class="text-lg bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none" type="password" name="pass" placeholder="Password">
              </div>
            </div>
            <div class="flex items-center mb-5">
              <div>
                <input class="w-5 h-5" type="checkbox" name="show_pass" id="show_pass">
              </div>
              <div class="ml-2">
                <label for="show_pass">Show password</label>
              </div>
            </div>
            <div class="grid grid-cols-2">
              <div>
                <a class="text-sky-600 underline hover:text-sky-500" href="#">Create account</a>
              </div>
              <div class="justify-self-end">
                <button class="border-lg py-2 px-5 text-white bg-blue-600 rounded transition duration-200 hover:bg-blue-500" type="submit">Log In</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/bundle.js"></script>
</body>

</html>