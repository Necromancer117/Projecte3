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
	<!-- BACKGROUND -->
	<div class="bg-cover bg-center bg-no-repeat" style="background-image: url(img/login-bg.jpg)">
		<!-- CONTAINER -->
		<div class="h-screen grid grid-cols-1 place-items-center">
			<!-- BOX -->
			<div class="w-[30%] border rounded-lg px-12 py-10 bg-white border-black items-center">
				<div class="text-center text-4xl font-semibold mb-10">
					Sign In
				</div>

				<?php if ($error != '') { ?>
					<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
						<strong class="font-bold">Error:</strong>
						<span class="block sm:inline"><?php echo ($error) ?>.</span>
						<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
							<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
								<title>Close</title>
								<path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
							</svg>
						</span>
					</div>
				<?php } ?>

				<div class="text-center text-lg mb-5">
					Enter to your Fake Circ account
				</div>
				<!-- FORM -->
				<form action="validarLogin" method="POST">
					<!-- EMAIL CONTAINER -->
					<div class="flex flex-col gap-3 mb-5">
						<div>
							<input class="appearance-none block w-full text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-400" type="text" name="email" placeholder="Email">
						</div>
						<div>
							<input id="login_pass" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded-lg py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-400" type="password" name="pass" placeholder="Password">
						</div>
					</div>
					<!-- SHOW PASSWORD -->
					<div class="flex items-center mb-5">
						<div>
							<input class="w-4 h-4" type="checkbox" name="show_pass" id="show_pass">
						</div>
						<div class="ml-2">
							<label for="show_pass">Show password</label>
						</div>
					</div>
					<!-- LOGIN BUTTON -->
					<div class="flex justify-between">
						<a class="text-blue-500 hover:text-blue-700 self-center duration-200" href="/signup">Create account</a>
						<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded duration-200" type="submit">Log In</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="js/bundle.js"></script>
</body>

</html>