<!DOCTYPE html>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Aggiungi Libro</title>
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

			{if $error}
			<div class="alert alert-warning">
				<strong>Attenzione</strong><br> <br>Riprova.
			</div>
			{/if}

			<h2>Carica Libro</h2>
			<fieldset class="form-group">
				<legend></legend>
					<form method="post" enctype="multipart/form-data" action="/BiblioLibro/libro/carica">
						<div class="form-group row">
      						<label for="Titolo" class="col-sm-2 col-form-label {if !$validazione.titolo} text-danger{/if}">Titolo: *</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="TitoloLibro" name="titolo" placeholder="Inserisci titolo...">
      						</div>
      						{if ! $validazione.titolo}
      						<div class="col-sm-3 well">
        						<small id="nameHelp" class="text-danger">
          							Solo caratteri alfanumerii
        						</small>      
     						</div>
     						{/if}
    					</div>

						<div class="form-group row">
      						<label for="Genere" class="col-sm-2 col-form-label {if !$validazione.genere} text-danger{/if}">Genere: *</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="GenereLibro" name="genere" placeholder="Inserisci genere...">
      						</div>

      						{if ! $validazione.genere}
      						<div class="col-sm-3 well">
        						<small id="genreHelp" class="text-danger">
          							Solo caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>

    				<div class="form-group row">
      						<label for="AutoreLibro" class="col-sm-2 col-form-label {if !$validazione.genere} text-danger{/if}">Autore: *</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="AutoreLibro" name="autore" placeholder="Inserisci autore...">
      						</div>

      						{if ! $validazione.autore}
      						<div class="col-sm-3 well">
        						<small id="genreHelp" class="text-danger">
          							Solo caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						<div class="form-group row">
      						<label for="NumCopieLibro" class="col-sm-2 col-form-label {if !$validazione.numcopie} text-danger{/if}">Numero copie: *</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="NumCopieLibro" name="numcopie" placeholder="Inserisci numero di copie...">
      						</div>

      						{if ! $validazione.numcopie}
      						<div class="col-sm-3 well">
        						<small id="genreHelp" class="text-danger">
          							Almeno una copia.
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
							class="form-check-input" name="view" value="all" checked>
								Consultazione
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
								class="form-check-input" name="view" value="registered">
								Prestito Breve 
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
								class="form-check-input" name="view" value="supporters">
								Prestito Lungo
						</label>
					</div>
				</fieldset>
				<button type="submit" class="btn btn-primary">Carica Libro</button>
			</form>
	</div>
	<div class="col-sm-3">

		

	</div>
	{include file="fine.tpl"}
</body>
</html>