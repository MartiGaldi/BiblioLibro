<!DOCTYPE html>
<html>
<head>
<title>Modifica Prestito </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
	
	<div class="py-5 bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
				
				</div>
	<div class="col-md-6">
		<div class="card text-white p-5 bg-primary">
			<div class="card-body">
			<h1 class="mb-4"> Modifica Presito </h1>

			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione</strong>
				<br> 
				<br>
				Riprova.
			</div>
			{/if}
			
			<form method="post" enctype="multipart/form-data" action="/BiblioLibro/prestito/modifica/{$prestito->getId()}">
					<div class="form-group row">
						<label for="prestito" class="col-sm-6 col-form-label {if !$check.utentePrestito} text-danger{/if}">Utente: </label>
						<input type="text" class="form-control" id="prestito" name="utentePrestito" value="{$prestito->getUtentePrestito()}" placeholder="Inserisci nuovo utente...">
						{if ! $check.utentePrestito}
						<div class="col-sm-8">
							<small id="utenteHelp" class="text-danger">
  							Solo caratteri alfanumerici
						</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="libroPrestito" class="col-sm-6 col-form-label {if !$check.libroPrestito} text-danger{/if}">Libro: </label>
						<input type="text" class="form-control" id="libroPrestito" name="libroPrestito" value ="{$prestito->getLibroPrestito()}" placeholder="Inserisci libro...">
						{if ! $check.libroPrestito}
						<div class="col-sm-8">
							<small id="libroHelp" class="text-danger">
  								Solo caratteri alfabetici.
							</small>      
						</div>
						{/if}
					</div>
				
				<button type="submit" class="btn btn-secondary">Modifica</button>
			</form>
		</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	{include file="fine.tpl"}
</body>
</html>