<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>{$libro->getTitolo()}</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
</head>
<body class="bg-dark">

		{utente->getNick assign='uNick'}
	    {utente->getId assign='uId'}
		
	<div class="py-5 bg-dark">
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
			<h4>
			<table>
			<tr><td>TITOLO: </td><td>{$libro->getTitolo()}</td></tr>
			<tr><td>AUTORE: </td><td>{$libro->getAutore()}</td></tr>
			<tr><td>GENERE: </td><td>{$libro->getGenere()}</td></tr>
			<tr><td>DURATA: </td><td>{$libro->getDurata()}</td></tr>
			<tr><td>ISBN: </td><td>{$libro->getIsbn()}</td></tr>
			<tr><td>COPIE: </td><td>{$libro->getCopieDisponibili()}</td></tr>
			</table> 
			</h4>
			<br>
			<br>
			
		{if $uTipo eq 'cliente' or $uTipo eq 'bibliotecario'}
			{if $prenota}
				<a href="/BiblioLibro/prenotazione/prenota/{$libro->getId()}" 
				class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">PRENOTA</a>
			{/if }
			
			{else}
			<h4>Effettua il <a href="/BiblioLibro/utente/login">Login</a> per procedere con la prenotazione</h4>
			{/if}
			<br>
			<br>
			<br>
			{if $uTipo eq 'bibliotecario'}
			<a href="/BiblioLibro/libro/modifica/{$libro->getId()}" 
				class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Modifica</a>
	
			<a href="/BiblioLibro/libro/rimuovi/{$libro->getId()}" 
				class="btn btn-primary btn-lg btn-danger active" role="button" aria-pressed="true">Rimuovi</a>
			{/if}		
	</div>
	</form>
	</div>
    </div>
    <div class="col-md-4" ></div>
    </div>
    </div>
  </div>
  </div>
	{include file="fine.tpl"}
</body>
</html>