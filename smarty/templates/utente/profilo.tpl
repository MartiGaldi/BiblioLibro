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
	
	<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-1">
            <i>
              <b>BiblioLibro</b>
            </i>
          </h1>
        </div>
      </div>
    </div>
  </div>
  
	{include file="navbar.tpl"}
	
	<div class="container text-center">
		<div class="col-sm-3">
		<!-- Informazioni utente -->
			{include file="utente/infoUtente.tpl"}
			{if $uId == $pId}
			<div>
			<!-- Rimozione profilo (se il profilo e' dell'utente della sessione)-->
				<a href="/BiblioLibro/utente/rimuovi/" class="btn btn-primary btn-lg btn-danger active" role="button" aria-pressed="true">Rimuovi Profilo</a>
			</div>
			
			{elseif $uTipo eq 'bibliotecario'}
			<div>
			<!-- Rimozione profilo (da parte del bibliotecario)-->
				<a href="/BiblioLibro/utente/rimuovi/{$pId}" 
					class="btn btn-primary btn-lg btn-danger active" role="button" aria-pressed="true">Rimuovi Profilo</a>
			</div>
			{/if}
			
        </div>
			<div class="col-sm-7">
			<!-- Contenuto principale -->
			    {if $content eq 'Prestito'}
				<!--lista prestiti (in corso)-->
				<h4>Lista Prestiti</h4>
				{include file="Catalogo.tpl"}
				
				{elseif $content eq 'Storico'}
				<!--lista prestiti (conclusi)-->
				<h4>Storico</h4>
				{include file="Catalogo.tpl"}
				
				{elseif $content eq 'None'}
				<!-- introduzione semplice -->
				<h3>Il mio profilo da {ucfirst($pTipo)}!</h3>
				{/if}
			</div>
	</div>
	
	{include file="fine.tpl"}
	
</body>
</html>