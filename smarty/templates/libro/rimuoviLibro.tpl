<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Rimuovi {$libro->getTitolo()}</title>
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

	{utente->getNick assign='uNome'}
	{utente->getId assign='uId'}

	{include file="navbar.tpl"}

	<div class="container text-center well">
		<h3>Vuoi rimuovere {$libro->getTitolo()}?</h3>
		<form method="post" action="/BiblioLibro/libro/rimuovi/{$libro->getId()}">
    		<button type="submit" class="btn btn-primary btn-lg active" name="action" value="si">Si</button>
    		<button type="submit" class="btn btn-primary btn-lg btn-danger active" name="action" value="no">No</button>
		</form>
	</div>
	{include file="fine.tpl"}
</body>
</html>