<!DOCTYPE html>
 
{utente->getNick assign='uNome'}
{utente->getId assign='uId'}
 
{profilo->getNick assign='pNome'}
{profilo->getId assign='pId'}

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Profilo {$pNome}</title>
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
	{include file="navbar.tpl"}
	
	<div class="container text-center">
		<div class="col-sm-3">
		<!-- Informazioni utente -->
			{include file="utente/infoUtente.tpl"}
			{if $uId == $pId}
			<div class = "well">
			<!-- Rimozione profilo (se il profilo e' dell'utente della sessione)-->
				<a href="/BiblioLibro/utente/rimuovi/" 
					class="btn btn-primary btn-lg btn-danger active" role="button" aria-pressed="true">Rimuovi Profilo</a>
			</div>
			{elseif $uTipo eq 'bibliotecario'}
			<div class = "well">
			<!-- Rimozione profilo (da parte del bibliotecario)-->
				<a href="/BiblioLibro/utente/rimuovi/{$pId}" 
					class="btn btn-primary btn-lg btn-danger active" role="button" aria-pressed="true">Rimuovi Profilo</a>
			</div>
			{/if}
			
        </div>
			<div class="col-sm-7 well">
			<!-- Contenuto principale -->
				{if $contenuto eq 'Catalogo'}
				<!--lista libri-->
				<h4 id="important">Catalogo</h4>
				{include file="Catalogo.tpl"}
				
				{elseif $contenuto eq 'Utenti'}
				<!--lista utenti-->
				<h4 id="important">Lista Utenti</h4>
				<a href="/BiblioLibro/utente/profilo/{$pId}">Torna al Profilo>
				{include file="Utenti.tpl"}
				
				{elseif $contenuto eq 'None'}
				<!-- Introduzione semplice-->
				<h3>Ciao! Sono {ucfirst($pTipo)}!</h3>
				{/if}
			</div>
	</div>
	{include file="navbar.tpl"}
</body>
</html>