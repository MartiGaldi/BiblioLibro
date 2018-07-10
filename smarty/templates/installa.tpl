<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<title>Installazione</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet"

	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet"

	href="/BiblioLibro/risorse/css/style.css">

<script

	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script

	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

	<div class="container text-center">

		<div class="col-sm-3">

        </div>

		<div class="col-sm-7 well">

			<div class="well">

			<h1 id="important"> Applicazione Web BiblioLibro </h1>

			<h4 id="important">Autori:</h4>

			<ul>

				<li>Galdi Martina</li>

				<li>Casimirri Sara</li>

			</ul>

			<p>Questa applicazione richiede che i cookie siano abilitati</p>

			</div>

			{if $versione}

			<h2>Installazione</h2>

			<hr>

			<form class="form-horizontal" method="post" action="install">

				<div class="form-group">

					<label class="control-label " for="user">Nome Utente:</label> <input

						type="text" class="form-control" id="user"

						placeholder="Enter username" name="admin">

				</div>

				<div class="form-group">

					<label class="control-label" for="pwd">Password:</label> <input

						type="password" class="form-control" id="pwd"

						placeholder="Enter password" name="pwd">

				</div>

				<div class="form-group">

					<label class="control-label " for="db">Nome Database:</label> <input

						type="text" class="form-control" id="db"

						placeholder="Enter database name" name="database">

				</div>

				<div class="form-group">
				
					<button type="submit" class="btn btn-default">Invia</button>

				</div>

			</form>

			{else}

			<p>Questa applicazione richiede PHP 7.2.1</p>

			{/if}

		</div>

	<div class="col-sm-3">

	</div>

</body>

</html>