<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
	
	<div class="container text-center">
		<div class="col-sm-3">
		
        </div>
		<div class="col-sm-7 ">
			<div class="well">
			<h4><a href="/BiblioLibro/libro/{$libro->getTitolo()}">{$libro->getTitolo()}</a> : {$libro->getAutore()} ({$libro->getGenere()}) ({$libro->getDurata()}) ({$libro->getInfoLibro()})</h4>
			<br>
			<br>
			{if $prenota}
				<a href="/BiblioLbro/libro/prenota/{$libro->getId()}" 
				class="btn btn-primary btn-lg active" role="button" aria-pressed="true">PRENOTA</a>
			{/if}
			{if $uTipo eq 'bibliotecario'}
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