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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
	<!-- BACKGROUND -->
	<div class="flex flex-col">
		<div class="flex h-screen">
			<aside class="overflow-y-auto py-4 px-3 bg-gray-200 h-screen w-44 flex-none">
				<ul class="space-y-2">
					<li>
						<a href="#" id="usertarget" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Users</span>
						</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Editions</span>
						</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Shows</span>
						</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Espectacles</span>
						</a>
					</li>
					<li>
						<a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Locations</span>
						</a>
					</li>

				</ul>
			</aside>
			<main class="w-full">
				<div class="p-4 flex w-full flex-col">
					<div id="userstuff" class="hideme">
						<form action="admininsert" class="p-4 w-full" method="post">
							<div class="bg-sky-200 p-8 w-full">
								<span>User insert.</span>
								<table class="table-fixed bg-sky-200 p-8 w-full">
									<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
										<tr>
											<th>Name</th>
											<th>Surename</th>
											<th>Mail</th>
											<th>Password</th>
											<th>Avatar</th>
											<th>Role</th>
										</tr>
									</thead>
									<tbody class="pt-4 pb-4 mt-4">
										<th><input name="insertusername" class="w-full" type="text" placeholder="Name"></th>
										<th><input name="insertusersurename" class="w-full" type="text" placeholder="Surename"></th>
										<th><input name="insertusermail" class="w-full" type="text" placeholder="mail"></th>
										<th><input name="insertuserpassword" class="w-full" type="text" placeholder="Password"></th>
										<th><input name="insertuseravatar" class="w-full" type="text" placeholder="Avatar"></th>
										<th><select name="insertuserrole" class="w-full">
												<option value="creator">Creator</option>
												<option value="client">Client</option>
												<option value="admin">Admin</option>
											</select></th>
									</tbody>

								</table>
							</div>
							<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
								Submit
							</button>
							<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
								Random user
							</button>

						</form>
						<div class="w-full bg-sky-200 p-8 w-full">
							<table class="table-fixed bg-sky-400 p-8 w-full">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Surename</th>
										<th>Mail</th>
										<th>Password</th>
										<th>Avatar</th>
										<th>Role</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($list as $entry) {

									?>
										<tr class="bg-white">
											<th><?php echo $entry['id_usuario'] ?></th>
											<th>
												<p class="font-normal"><?php echo $entry['nombre_usuario'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['apellido_usuario'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['mail_usuario'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['contrasena_usuario'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['avatar_usuario'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['usuario_rol'] ?></p>
											</th>

										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="w-full mt-16 p-8 w-full">
							<form action="#" class="w-full">
								<div class="bg-sky-200 p-8 w-full">
									<span>Update user</span>
									<table class="table-fixed bg-sky-200 w-full">
										<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
											<tr>
												<th>user id</th>
												<th>Column</th>
												<th>New value</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="insertusername" class="w-full" type="text" placeholder="User-id"></th>
											<th>
												<select name="insertuserrole" class="w-full">
													<option value="name">Name</option>
													<option value="surename">Surename</option>
													<option value="mail">mail</option>
													<option value="password">password</option>
													<option value="avatar">avatar</option>
													<option value="role">role</option>
												</select>
											</th>
											<th><input name="insertuseravatar" class="w-full" type="text" placeholder="New value"></th>
										</tbody>

									</table>
								</div>
								<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
								Submit
							</button>
							</form>
						</div>

					</div>
				</div>
			</main>
		</div>
	</div>
	<script src="js/bundle.js"></script>


</body>

</html>