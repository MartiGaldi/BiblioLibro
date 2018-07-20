<!DOCTYPE html>

<html>

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<title>Pagina d'errore</title>

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



	{user->getNickName assign='uNick'}

	{user->getId assign='uId'}



	{include file="navbar.tpl"}



	<div class="container text-center well">

		<h3>ERRORE</h3>

		<p>{$errore} Torna alla <a href="/BiblioLibro/">home</a>

		</p>

		

	</div>

	{include file="fine.tpl"}


</body>

</html>