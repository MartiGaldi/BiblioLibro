<!DOCTYPE html>

<html>
<head>

{utente->getNick assign='uNick'}
{utente->getId assign='uId'}

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Pannello</title>
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
<link rel="script
	href="/BiblioLibro/smarty/templates/script.js">
</head>

<body>
	{include file="navbar.tpl"}

	

	<div class="container text-center">
		<div class="col-sm-3">
        </div>
		<div class="col-sm-7 ">
			<div class="well">
			<h1>Pannello Amministratore DB<h1>
			<br>
			<br>
			<a href="/BiblioLibro/amministratore/registra" 
				class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Registra</a>
			</div>
			<div class = "well">
				<a href="/BiblioLibro/amministratore/logout">ESCI</a>
			</div>
		</div>
	</div>
</body>
</html>
