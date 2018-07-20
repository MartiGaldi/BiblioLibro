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

	{utente->getNick assign='uNick'}

	{utente->getId assign='uId'} 
	
	{include file="navbar.tpl"}

	

	<div class="container text-center">
		<div class="col-sm-3">

		

        </div>

		<div class="col-sm-7 well">

			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione</strong><br> <br>Riprova.
			</div>
			{/if}

			<h2>Carica Libro</h2>
			<fieldset class="form-group">
				<legend></legend>
					<form method="post" enctype="multipart/form-data" action="/BiblioLibro/libro/carica">
						<div class="form-group row">
      						<label for="Titolo" class="col-sm-2 col-form-label {if !$check.titolo} text-danger{/if}">Titolo: *</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="TitoloLibro" name="titolo" placeholder="Inserisci titolo...">
      						</div>
      						{if ! $check.titolo}
      						<div class="col-sm-3 well">
        						<small id="titoloHelp" class="text-danger">
          							Solo caratteri alfanumerici
        						</small>      
     						</div>
     						{/if}
    					</div>

						<div class="form-group row">
      						<label for="Genere" class="col-sm-2 col-form-label {if !$check.genere} text-danger{/if}">Genere: *</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="GenereLibro" name="genere" placeholder="Inserisci genere...">
      						</div>

      						{if ! $check.genere}
      						<div class="col-sm-3 well">
        						<small id="genereHelp" class="text-danger">
          							Solo caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>

    				<div class="form-group row">
      						<label for="AutoreLibro" class="col-sm-2 col-form-label {if !$check.autore} text-danger{/if}">Autore: *</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="AutoreLibro" name="autore" placeholder="Inserisci autore...">
      						</div>

      						{if ! $check.autore}
      						<div class="col-sm-3 well">
        						<small id="autoreHelp" class="text-danger">
          							Solo caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						<div class="form-group row">
      						<label for="NumCopieLibro" class="col-sm-2 col-form-label {if !$check.numcopie} text-danger{/if}">Numero copie: *</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="NumCopieLibro" name="numcopie" placeholder="Inserisci numero di copie...">
      						</div>

      						{if ! $check.numcopie}
      						<div class="col-sm-3 well">
        						<small id="numcopieHelp" class="text-danger">
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
							class="form-check-input" name="view" value="consultazione" checked>
								Consultazione
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
								class="form-check-input" name="view" value="breve">
								Prestito Breve 
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
								class="form-check-input" name="view" value="lungo">
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