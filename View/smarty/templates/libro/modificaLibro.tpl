<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Modifica {$libro->getTitolo()}</title>
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
	
	<div class="container text-center">
		<div class="col-sm-3">
		
        </div>
		<div class="col-sm-7 well">
			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione!</strong><br> <br>Riprova.
			</div>
			{/if}
			<h2>Modifica Libro</h2>
			<hr>
			<form method="post" enctype="multipart/form-data" action="/BiblioLibro/libro/modifica/{$libro->getId()}">
				<fieldset class="form-group">
					<legend></legend>
					<div class="form-group row">
						<label for="TitoloLibro" class="col-sm-2 col-form-label {if !$validazione.titolo} text-danger{/if}">Titolo: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="TitoloLibro" name="titolo" value="{$libro->getTitolo()}" placeholder="Inserisci titolo...">
						</div>
						{if ! $validazione.titolo}
						<div class="col-sm-3 well">
							<small id="titoloHelp" class="text-danger">
  							Solo caratteri alfanumerici
						</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="GenereLibro" class="col-sm-2 col-form-label {if !$validazione.genere} text-danger{/if}">Genere: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="GenereLibro" name="genere" value ="{$libro->getGenere()}" placeholder="Inserisci genere...">
						</div>
						{if ! $validazione.genere}
						<div class="col-sm-3 well">
							<small id="genereHelp" class="text-danger">
  								Solo caratteri alfabetici.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="AutoreLibro" class="col-sm-2 col-form-label {if !$validazione.autore} text-danger{/if}">Autore: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="AutoreLibro" name="autore" value ="{$libro->getAutoree()}" placeholder="Inserisci autore...">
						</div>
						{if ! $validazione.autore}
						<div class="col-sm-3 well">
							<small id="autoreHelp" class="text-danger">
  								Solo caratteri alfabetici.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="NumCopieLibro" class="col-sm-2 col-form-label {if !$validazione.numcopie} text-danger{/if}">Numero copie: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="NumCopieLibro" name="numcopie" value ="{$libro->getNumCopie()}" placeholder="Inserisci numero copie...">
						</div>
						{if ! $validazione.numcopie}
						<div class="col-sm-3 well">
							<small id="numcopieHelp" class="text-danger">
  								Solo caratteri numerici; Almeno una copia.
							</small>      
						</div>
						{/if}
					</div>
				</fieldset>
				
				<fieldset class="form-group">
					<legend></legend>
					<h4 id="important">Durata prestito:</h4>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
							class="form-check-input" name="view" value="consultazione" {if $checked eq 'consultazione'}checked{/if}>
							Consultazione
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
							class="form-check-input" name="view" value="breve" {if $checked eq 'breve'}checked{/if}>
							Prestito Breve 
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
							class="form-check-input" name="view" value="lungo" {if $checked eq 'lungo'}checked{/if}>
							Prestito Lungo 
						</label>
					</div>
				</fieldset>
				<button type="submit" class="btn btn-primary">Modifica</button>
			</form>
		</div>
		<div class="col-sm-3">
		
		</div>
	</div>
	{include file="fine.tpl"}
</body>
</html>