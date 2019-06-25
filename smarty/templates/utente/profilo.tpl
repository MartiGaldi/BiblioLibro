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
	<div class="py-5 bg-white">	  
	<div class="container">
	 <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card text-black p-5 bg-secondary">
		  <div class="card-body">
	<form>
	<div class="container text">
		<!-- Informazioni utente -->
		{include file="utente/utenteInfo.tpl"}
		
		{if $uId == $pId}
		<div>
		<br>
		<br>
		<!-- Rimozione profilo (se il profilo e' dell'utente della sessione o se si è un bibliotecario)-->
		<br>
		<br>
		<a href="/BiblioLibro/utente/rimuovi/" class="btn btn-primary btn-lg btn-danger active" role="button" aria-pressed="true">Rimuovi Profilo</a>
		</div>
		{/if}
		<br>
		<br>
		<br>
		
		{if $uTipo eq 'cliente'}
		<div class="col-sm-200">
		<!-- Contenuto principale -->
		
				
				<h4>PRENOTAZIONI:</h4>
				<!--lista prenotazioni-->
				{include file="Prenotazione.tpl"}
				
				
				<h4>LISTA PRESTITI (in corso):</h4>
				<!--lista prestiti (in corso)-->
				{include file="Prestito.tpl"}
				
				
				<!--lista prestiti (conclusi)-->
				<h4>STORICO (prestiti conclusi):</h4>
				{include file="Storico.tpl"}
				
				{if $content eq 'None'}
				<!-- introduzione semplice -->
				<h3></h3>
				{/if}
		{/if}	
		</div>
	</div>
	</form>
	</div>
    </div>
    <div class="col-md-4" ></div>
    </div>
    </div>
  </div>
  </div>
   </div> 
 </div>

 
	{include file="fine.tpl"}
	
</body>
</html>