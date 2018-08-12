<!DOCTYPE html>
 
<html>
<head>
<title>Profilo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
</head>

<body  class="bg-dark" >

	{utente->getNick assign='uNick'}
	{utente->getId assign='uId'}
 
	{profilo->getNick assign='pNick'}
	{profilo->getId assign='pId'}
	
	{include file="navbar.tpl"}
	
	<div class="container text-center">
		<div class="col-sm-3">
		<!-- Informazioni utente -->
			{include file="utente/infoUtente.tpl"}
			{if $uId == $pId}
			<div>
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
			<div class="col-sm-7">
			<!-- Contenuto principale -->
				{if $content eq 'Catalogo'}
				<!--lista libri-->
				<h4 id="important">Catalogo</h4>
				{include file="Catalogo.tpl"}
				
				{elseif $uTipo eq 'bibliotecario' && $content eq 'Utenti'}
				<!--lista utenti-->
				<h4 id="important">Lista Utenti</h4>
				<a href="/BiblioLibro/utente/profilo/{$pId}">Torna al Profilo
				{include file="Utenti.tpl"}
				
				{elseif $content eq 'None'}
				<!-- Introduzione semplice-->
				<h3>Il mio profilo {ucfirst($pTipo)}!</h3>
				{/if}
			</div>
	</div>
	
	{include file="fine.tpl"}
	
</body>
</html>