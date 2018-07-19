<!DOCTYPE html>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Ricerca</title>
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
	{utente->getId assign='uId'} 
	
	{include file="navbar.tpl"}

	

	<div class="container text-center">
		<div class="col-sm-3">

		

        </div>

		<div class="col-sm-7 well">
			<h4>Ricerca per {$key} {$string}: </h4>

			{if $key eq "Titolo"}
				{include file="Catalogo.tpl"}
			{/if}
		</div>

		<div class="col-sm-3">

		

		</div>
	</div>
	{include file="fine.tpl"}
</body>
</html>