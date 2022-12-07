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
	<div class="flex flex-col h-screen">
		<!-- <div class="flex flex-col"> -->
		<div class="flex flex-1 overflow-hidden">
			<!-- <div class="flex h-screen"> -->
			<!-- Navigation aside-->
			<aside class="overflow-y-auto py-4 px-3 bg-gray-200 h-screen w-44 flex">
				<ul class="space-y-2">
					<li>
						<a href="#" id="usertarget" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Users</span>
						</a>
					</li>
					<li>
						<a href="#" id="editionstarget" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Editions</span>
						</a>
					</li>
					<li>
						<a href="#" id="showtarget" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Shows</span>
						</a>
					</li>
					<li>
						<a href="#" id="representationtarget" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Representations</span>
						</a>
					</li>
					<li>
						<a href="#" id="locationtarget" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
							<span class="ml-3">Locations</span>
						</a>
					</li>

				</ul>
			</aside>
			<!-- End of the aside -->
			<!-- This main is the rest of the page, its the one changing-->
			<main class="w-full overflow-y-auto">
				<!-- This div gives a size and a paddin all the content goes in-->
				<div class="p-4 flex w-full flex-col">
					<!-- This is the user part all the hideme elemnts disapear and the wanted one apears with his id-->
					<div id="userstuff" class="hideme">
						<!-- insert space-->
						<form action="admininsert" class="pt-4 w-full" method="post">
							<input type="hidden" name="hid" value="user">
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
										<th><input name="insertusername" class="w-full text-center" type="text" placeholder="Name"></th>
										<th><input name="insertusersurename" class="w-full text-center" type="text" placeholder="Surename"></th>
										<th><input name="insertusermail" class="w-full text-center" type="text" placeholder="mail"></th>
										<th><input name="insertuserpassword" class="w-full text-center" type="text" placeholder="Password"></th>
										<th><input name="insertuseravatar" class="w-full text-center" type="text" placeholder="Avatar"></th>
										<th><select name="insertuserrole" class="w-full text-center">
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
						<!-- user list space-->
						<div class="w-full bg-sky-200 mt-4 p-8 w-full">
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
												<p class="font-normal overflow-x-auto"><?php echo $entry['contrasena_usuario'] ?></p>
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
						<!-- Update space-->
						<div class="w-full pt-8 w-full">
							<form action="adminupdate" class="w-full" method="post">
								<input type="hidden" name="hid" value="user">
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
											<th><input name="updateuserid" class="w-full text-center" type="text" placeholder="User-id"></th>
											<th>
												<select name="updateusercol" class="w-full text-center">
													<option value="nombre_usuario">Name</option>
													<option value="apellido_usuario">Surename</option>
													<option value="mail_usuario">mail</option>
													<option value="contrasena_usuario">password</option>
													<option value="avatar_usuario">avatar</option>
													<option value="usuario_rol">role</option>
												</select>
											</th>
											<th><input name="updateusernew" class="w-full text-center" type="text" placeholder="New value"></th>
										</tbody>

									</table>
								</div>
								<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
									Submit
								</button>
							</form>
						</div>
						<!-- delete space-->
						<div class="w-full p-8 w-full">
							<form action="adminDelete" class="w-full" method="post">
								<input type="hidden" name="hid" value="user">
								<div class="bg-red-200 p-8 pt-4 w-full flex flex-col">
									<span class="mx-auto text-red-700">!!!WARNING!!!</span>
									<span class="mx-auto">!!!Delete user!!!</span>
									<table class="table-fixed bg-red-200 w-2/4 mx-auto">
										<thead class="pt-4 pb-4 border-2 bg-red-400  rounded-md">
											<tr>
												<th>user id</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="deleteuserid" class="w-full text-center" type="text" placeholder="User-id"></th>
										</tbody>

									</table>
								</div>
								<div class="w-full flex">
									<button class="bg-red-500 mt-4 mx-auto hover:bg-red-400 text-white py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
										Delete
									</button>
								</div>
							</form>
						</div>

					</div>
					<!-- Editions space -->
					<div id="editionsstuff" class="hideme hidden">
						<!-- insert space-->
						<form action="admininsert" class="pt-4 w-full" method="post">
							<input type="hidden" name="hid" value="editions">
							<div class="bg-sky-200 p-8 w-full">
								<span>Editions insert.</span>
								<table class="table-fixed bg-sky-200 p-8 w-full">
									<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
										<tr>
											<th>Title</th>
											<th>Starting date</th>
											<th>Ending Date</th>
										</tr>
									</thead>
									<tbody class="pt-4 pb-4 mt-4">
										<th><input name="title" class="w-full text-center" type="text" placeholder="Title"></th>
										<th><input name="StartDate" class="w-full text-center" type="date" placeholder="20xx-xx-xx"></th>
										<th><input name="EndDate" class="w-full text-center" type="date" placeholder="20xx-xx-xx"></th>

									</tbody>

								</table>
							</div>
							<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
								Submit
							</button>


						</form>
						<!-- edtion list space-->
						<div class="w-full bg-sky-200 mt-4 p-8 w-full">
							<table class="table-fixed bg-sky-400 p-8 w-full">
								<thead>
									<tr>
										<th>Id</th>
										<th>Title</th>
										<th>Start Day</th>
										<th>End Day</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($editionList as $entry) {

									?>
										<tr class="bg-white">
											<th><?php echo $entry['id_edicion'] ?></th>
											<th>
												<p class="font-normal"><?php echo $entry['titulo_edicion'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['dia_inicio_edicion'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['dia_final_edicion'] ?></p>
											</th>

										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- Update space-->
						<div class="w-full pt-8 w-full">
							<form action="adminupdate" class="w-full" method="post">
								<input type="hidden" name="hid" value="editions">
								<div class="bg-sky-200 p-8 w-full">
									<span>Update Edition</span>
									<table class="table-fixed bg-sky-200 w-full">
										<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
											<tr>
												<th>Edition id</th>
												<th>Column</th>
												<th>New value</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="updateeditionid" class="w-full text-center" type="text" placeholder="Edition-id"></th>
											<th>
												<select name="updateeditioncol" class="w-full text-center">
													<option value="titulo_edicion">Title</option>
													<option value="dia_inicio_edicion">Starting Day</option>
													<option value="dia_final_edicion">Ending day</option>
												</select>
											</th>
											<th><input name="updateeditionnew" class="w-full text-center" type="text" placeholder="New value"></th>
										</tbody>

									</table>
								</div>
								<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
									Submit
								</button>
							</form>
						</div>
						<!-- delete space-->
						<div class="w-full p-8 w-full">
							<form action="adminDelete" class="w-full" method="post">
								<input type="hidden" name="hid" value="editions">
								<div class="bg-red-200 p-8 pt-4 w-full flex flex-col">
									<span class="mx-auto text-red-700">!!!WARNING!!!</span>
									<span class="mx-auto">!!!Delete edition!!!</span>
									<table class="table-fixed bg-red-200 w-2/4 mx-auto">
										<thead class="pt-4 pb-4 border-2 bg-red-400  rounded-md">
											<tr>
												<th>user id</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="deleteeditionid" class="w-full text-center" type="text" placeholder="Edition-id"></th>
										</tbody>

									</table>
								</div>
								<div class="w-full flex">
									<button class="bg-red-500 mt-4 mx-auto hover:bg-red-400 text-white py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
										Delete
									</button>
								</div>
							</form>
						</div>

					</div>
					<!-- Shows space -->
					<div id="showstuff" class="hideme hidden">
						<!-- insert space-->
						<form action="admininsert" class="pt-4 w-full" method="post">
							<input type="hidden" name="hid" value="show">
							<div class="bg-sky-200 p-8 w-full">
								<span>Editions insert.</span>
								<table class="table-fixed bg-sky-200 p-8 w-full">
									<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
										<tr>
											<th>Edition-ID</th>
											<th>Show-Name</th>
											<th>Show-Type</th>
											<th>Show-Image</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody class="pt-4 pb-4 mt-4">
										<th><input name="edition-id" class="w-full text-center" type="text" placeholder="Edition-ID"></th>
										<th><input name="Name" class="w-full text-center" type="text" placeholder="Show-Name"></th>
										<th><input name="type" class="w-full text-center" type="text" placeholder="Show-Type"></th>
										<th><input name="image" class="w-full text-center" type="text" placeholder="Show-Image"></th>
										<th><input name="description" class="w-full text-center" type="text" placeholder="Description"></th>

									</tbody>

								</table>
							</div>
							<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
								Submit
							</button>


						</form>
						<!-- show list space-->
						<div class="w-full bg-sky-200 mt-4 p-8 w-full">
							<table class="table-fixed bg-sky-400 p-8 w-full">
								<thead>
									<tr>
										<th>Show-ID</th>
										<th>Edition-ID</th>
										<th>Show-Name</th>
										<th>Show-Type</th>
										<th>Show-Image</th>
										<th>Description</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($showList as $entry) {

									?>
										<tr class="bg-white">
											<th><?php echo $entry['id_espectaculo'] ?></th>
											<th>
												<p class="font-normal"><?php echo $entry['id_edicion_espectaculo'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['nombre_espectaculo'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['tipo_espectaculo'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['imagen_espectaculo'] ?></p>
											</th>
											<th>
												<p class="font-normal h-12 overflow-y-auto"><?php echo $entry['descripcion_espectaculo'] ?></p>
											</th>

										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- Update space-->
						<div class="w-full pt-8 w-full">
							<form action="adminupdate" class="w-full" method="post">
								<input type="hidden" name="hid" value="show">
								<div class="bg-sky-200 p-8 w-full">
									<span>Update Edition</span>
									<table class="table-fixed bg-sky-200 w-full">
										<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
											<tr>
												<th>edition ID</th>
												<th>Column</th>
												<th>New value</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="updateshowid" class="w-full text-center" type="text" placeholder="Edition-id"></th>
											<th>
												<select name="updateshowcol" class="w-full text-center">
													<option value="nombre_espectaculo">Title</option>
													<option value="tipo_espectaculo">Type</option>
													<option value="imagen_espectaculo">Image</option>
													<option value="descripcion_espectaculo">Description</option>
												</select>
											</th>
											<th><input name="updateshownew" class="w-full text-center" type="text" placeholder="New value"></th>
										</tbody>

									</table>
								</div>
								<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
									Submit
								</button>
							</form>
						</div>
						<!-- delete space-->
						<div class="w-full p-8 w-full">
							<form action="adminDelete" class="w-full" method="post">
								<input type="hidden" name="hid" value="show">
								<div class="bg-red-200 p-8 pt-4 w-full flex flex-col">
									<span class="mx-auto text-red-700">!!!WARNING!!!</span>
									<span class="mx-auto">!!!Delete Show!!!</span>
									<table class="table-fixed bg-red-200 w-2/4 mx-auto">
										<thead class="pt-4 pb-4 border-2 bg-red-400  rounded-md">
											<tr>
												<th>show id</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="deleteshowid" class="w-full text-center" type="text" placeholder="Show-id"></th>
										</tbody>

									</table>
								</div>
								<div class="w-full flex">
									<button class="bg-red-500 mt-4 mx-auto hover:bg-red-400 text-white py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
										Delete
									</button>
								</div>
							</form>
						</div>

					</div>
					<!-- representation space -->
					<div id="representationstuff" class="hideme hidden">
						<!-- insert space-->
						<form action="admininsert" class="pt-4 w-full" method="post">
							<input type="hidden" name="hid" value="representation">
							<div class="bg-sky-200 p-8 w-full">
								<span>Representation insert.</span>
								<table class="table-fixed bg-sky-200 p-8 w-full">
									<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
										<tr>
											<th>Show-ID</th>
											<th>Space-ID</th>
											<th>Starting-Hour</th>
											<th>Ending-hour</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody class="pt-4 pb-4 mt-4">
										<th><input name="showid" class="w-full text-center" type="text" placeholder="Show-ID"></th>
										<th><input name="spaceid" class="w-full text-center" type="text" placeholder="Space-ID"></th>
										<th><input name="starthour" class="w-full text-center" type="time" placeholder="Starting-Hour"></th>
										<th><input name="endhour" class="w-full text-center" type="time" placeholder="Ending-hour"></th>
										<th><input name="date" class="w-full text-center" type="date" placeholder="Date"></th>

									</tbody>

								</table>
							</div>
							<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
								Submit
							</button>


						</form>
						<!-- representation list space-->
						<div class="w-full bg-sky-200 mt-4 p-8 w-full">
							<table class="table-fixed bg-sky-400 p-8 w-full">
								<thead>
									<tr>
										<th>Representation-ID</th>
										<th>Show-ID</th>
										<th>Space-ID</th>
										<th>Starting-Hour</th>
										<th>Ending-hour</th>
										<th>Date</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($repreList as $entry) {

									?>
										<tr class="bg-white">
											<th><?php echo $entry['id_representacion'] ?></th>
											<th>
												<p class="font-normal"><?php echo $entry['id_espectaculo_representacion'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['id_espacio_representacion'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['hora_inicio_representacion'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['hora_fin_representacion'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['fecha_inicio_representacion'] ?></p>
											</th>

										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- Update space-->
						<div class="w-full pt-8 w-full">
							<form action="adminupdate" class="w-full" method="post">
								<input type="hidden" name="hid" value="representation">
								<div class="bg-sky-200 p-8 w-full">
									<span>Update Edition</span>
									<table class="table-fixed bg-sky-200 w-full">
										<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
											<tr>
												<th>Representation ID</th>
												<th>Column</th>
												<th>New value</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="updaterepresentationid" class="w-full text-center" type="text" placeholder="Representation-id"></th>
											<th>
												<select name="updaterepresentationcol" class="w-full text-center">
													<option value="id_espectaculo_representacion">Change show</option>
													<option value="id_espacio_representacion">Change space</option>
													<option value="hora_inicio_representacion">Starting hour</option>
													<option value="hora_fin_representacion">Ending hour</option>
													<option value="fecha_inicio_representacion">Date</option>
												</select>
											</th>
											<th><input name="updaterepresentationnew" class="w-full text-center" type="text" placeholder="New value"></th>
										</tbody>

									</table>
								</div>
								<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
									Submit
								</button>
							</form>
						</div>
						<!-- delete space-->
						<div class="w-full p-8 w-full">
							<form action="adminDelete" class="w-full" method="post">
								<input type="hidden" name="hid" value="representation">
								<div class="bg-red-200 p-8 pt-4 w-full flex flex-col">
									<span class="mx-auto text-red-700">!!!WARNING!!!</span>
									<span class="mx-auto">!!!Delete Representation!!!</span>
									<table class="table-fixed bg-red-200 w-2/4 mx-auto">
										<thead class="pt-4 pb-4 border-2 bg-red-400  rounded-md">
											<tr>
												<th>Representation id</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="deleterepresentationid" class="w-full text-center" type="text" placeholder="Representation-id"></th>
										</tbody>

									</table>
								</div>
								<div class="w-full flex">
									<button class="bg-red-500 mt-4 mx-auto hover:bg-red-400 text-white py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
										Delete
									</button>
								</div>
							</form>
						</div>

					</div><!-- end div -->
					<!-- location space -->
					<div id="locationstuff" class="hideme hidden">
						<!-- insert space-->
						<form action="admininsert" class="pt-4 w-full" method="post">
							<input type="hidden" name="hid" value="location">
							<div class="bg-sky-200 p-8 w-full">
								<span>Location insert.</span>
								<table class="table-fixed bg-sky-200 p-8 w-full">
									<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
										<tr>
											<th>Name</th>
											<th>Longitude</th>
											<th>Latitude</th>
										</tr>
									</thead>
									<tbody class="pt-4 pb-4 mt-4">
										<th><input name="locationname" class="w-full text-center" type="text" placeholder="Name"></th>
										<th><input name="longitude" class="w-full text-center" type="number" step="any" placeholder="Longitude"></th>
										<th><input name="latitude" class="w-full text-center" type="number" step="any" placeholder="Latitude"></th>
										
									</tbody>

								</table>
							</div>
							<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
								Submit
							</button>


						</form>
						<!-- representation list space-->
						<div class="w-full bg-sky-200 mt-4 p-8 w-full">
							<table class="table-fixed bg-sky-400 p-8 w-full">
								<thead>
									<tr>
										<th>Location-ID</th>
										<th>Location Name</th>
										<th>Longitude</th>
										<th>Latitude</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($locationList as $entry) {

									?>
										<tr class="bg-white">
											<th><?php echo $entry['id_espacio'] ?></th>
											<th>
												<p class="font-normal"><?php echo $entry['nombre_espacio'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['longitud_espacio'] ?></p>
											</th>
											<th>
												<p class="font-normal"><?php echo $entry['latitud_espacio'] ?></p>
											</th>

										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- Update space-->
						<div class="w-full pt-8 w-full">
							<form action="adminupdate" class="w-full" method="post">
								<input type="hidden" name="hid" value="location">
								<div class="bg-sky-200 p-8 w-full">
									<span>Update Location</span>
									<table class="table-fixed bg-sky-200 w-full">
										<thead class="pt-4 pb-4 border-2 bg-sky-400  rounded-md">
											<tr>
												<th>Location ID</th>
												<th>Column</th>
												<th>New value</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="updatelocationid" class="w-full text-center" type="text" placeholder="Location-id"></th>
											<th>
												<select name="updatelocationcol" class="w-full text-center">
													<option value="nombre_espacio">Change Name</option>
													<option value="longitud_espacio">Change Longitude</option>
													<option value="latitud_espacio">Change Latitude</option>
												</select>
											</th>
											<th><input name="updatelocationnew" class="w-full text-center" type="text" placeholder="New value"></th>
										</tbody>

									</table>
								</div>
								<button class="bg-blue-500 mt-4 hover:bg-blue-400 text-white py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
									Submit
								</button>
							</form>
						</div>
						<!-- delete space-->
						<div class="w-full p-8 w-full">
							<form action="adminDelete" class="w-full" method="post">
								<input type="hidden" name="hid" value="location">
								<div class="bg-red-200 p-8 pt-4 w-full flex flex-col">
									<span class="mx-auto text-red-700">!!!WARNING!!!</span>
									<span class="mx-auto">!!!Delete Location!!!</span>
									<table class="table-fixed bg-red-200 w-2/4 mx-auto">
										<thead class="pt-4 pb-4 border-2 bg-red-400  rounded-md">
											<tr>
												<th>Location id</th>
											</tr>
										</thead>
										<tbody class="pt-4 pb-4 mt-4">
											<th><input name="deletelocationid" class="w-full text-center" type="text" placeholder="Location-id"></th>
										</tbody>

									</table>
								</div>
								<div class="w-full flex">
									<button class="bg-red-500 mt-4 mx-auto hover:bg-red-400 text-white py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
										Delete
									</button>
								</div>
							</form>
						</div>

					</div><!-- end div -->
				</div>
			</main>
		</div>
	</div>
	<script src="js/bundle.js"></script>


</body>

</html>