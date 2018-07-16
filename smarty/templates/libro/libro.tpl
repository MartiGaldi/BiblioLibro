<!DOCTYPE html>
<html>
<head>
{utente->getId assign='uId'}
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>{$libro->getTitolo()}</title>
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
			<h4><a href="/BiblioLibro/libro/{$libro->getTitolo()}">{$libro->getTitolo()}</a> : {$lbro->getAutore()} ({$libro->getGenere()}) ({$libro->getDurata()}) ({$libro->getInfoLibro()})</h4>
			<br>
			<br>
			{if $prenota}
				<a href="/BiblioLbro/libro/prenota/{$libro->getId()}" 
				class="btn btn-primary btn-lg active" role="button" aria-pressed="true">PRENOTA</a>
			{/if}
			{if $uType eq 'bibliotecario'}
			<a href="/BiblioLibro/libro/modifica/{$libro->getId()}" 
				class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Modifica</a>
	
			<a href="/BiblioLibro/libro/rimuovi/{$libro->getId()}" 
				class="btn btn-primary btn-lg btn-danger active" role="button" aria-pressed="true">Rimuovi</a>
			{/if}
			</div>
			<div>
		</div>			
	</div>
	{include file="fine.tpl"}
</body>
</html>