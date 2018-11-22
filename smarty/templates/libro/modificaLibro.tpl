<!DOCTYPE html>
<html>
<head>
<title>Modifica {$libro->getTitolo()}</title>
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
						<label for="TitoloLibro" class="col-sm-2 col-form-label {if !$check.titolo} text-danger{/if}">Titolo: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="TitoloLibro" name="titolo" value="{$libro->getTitolo()}" placeholder="Inserisci titolo...">
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
						<label for="GenereLibro" class="col-sm-2 col-form-label {if !$check.genere} text-danger{/if}">Genere: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="GenereLibro" name="genere" value ="{$libro->getGenere()}" placeholder="Inserisci genere...">
						</div>
						{if ! $check.genere}
						<div class="col-sm-3 well">
							<small id="genereHelp" class="text-danger">
  								Solo caratteri alfabetici.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="AutoreLibro" class="col-sm-2 col-form-label {if !$check.autore} text-danger{/if}">Autore: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="AutoreLibro" name="autore" value ="{$libro->getAutore()}" placeholder="Inserisci autore...">
						</div>
						{if ! $check.autore}
						<div class="col-sm-3 well">
							<small id="autoreHelp" class="text-danger">
  								Solo caratteri alfabetici.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="NumCopieLibro" class="col-sm-2 col-form-label {if !$check.numcopie} text-danger{/if}">Numero copie: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="NumCopieLibro" name="numcopie" value ="{$libro->getNumCopie()}" placeholder="Inserisci numero copie...">
						</div>
						{if ! $check.numcopie}
						<div class="col-sm-3 well">
							<small id="numcopieHelp" class="text-danger">
  								Solo caratteri numerici; Almeno una copia.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="IsbnLibro" class="col-sm-2 col-form-label {if !$check.isbn} text-danger{/if}">Isbn: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="IsbnLibro" name="isbn" value ="{$libro->getIsbn()}" placeholder="Inserisci isbn...">
						</div>
						{if ! $check.isbn}
						<div class="col-sm-3 well">
							<small id="isbnHelp" class="text-danger">
  								Deve contenere 16 caratteri.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="DescrizioneLibro" class="col-sm-2 col-form-label {if !$check.descrizione} text-danger{/if}">Descrizione: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="DescrizioneLibro" name="descrizione" value ="{$libro->getDescrizione()}" placeholder="Inserisci una descrizione...">
						</div>
						{if ! $check.numcopie}
						<div class="col-sm-3 well">
							<small id="descrizioneHelp" class="text-danger">
  								Lunghezza massima 150 caratteri.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="CopertinaLibro" class="col-sm-2 col-form-label {if !$check.copertina} text-danger{/if}">Copertina: *</label>
						<div class="col-sm-7">
							<input type="text" class="form-control is-invalid" id="CopertinaLibro" name="copertina" value ="{$libro->getCopertina()}" placeholder="Inserisci copertina...">
						</div>
						{if ! $check.copertina}
						<div class="col-sm-3 well">
							<small id="copertinaHelp" class="text-danger">
  								Deve avere formati jpg, png.
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