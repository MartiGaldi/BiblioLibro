<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Aggiungi Libro</title>
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
						<h1 class="mb-4"> Aggiungi libro </h1>

			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione</strong><br> <br>Riprova.
			</div>
			{/if}
			
					<form method="post" enctype="multipart/form-data" action="/BiblioLibro/libro/carica">
						<div class="form-group row">
      						<label for="Titolo" class="col-sm-6 col-form-label {if !$check.titolo} text-danger{/if}">Titolo: *</label>
        						<input type="text" class="form-control" id="TitoloLibro" name="titolo" placeholder="Inserisci titolo...">
      						{if ! $check.titolo}
      						<div class="col-sm-8">
        						<small id="titoloHelp" class="text-danger">
          							Solo caratteri alfanumerici
        						</small>      
     						</div>
     						{/if}
    					</div>

						<div class="form-group row">
      						<label for="Genere" class="col-sm-6 col-form-label {if !$check.genere} text-danger{/if}">Genere: *</label>
        						<input type="text" class="form-control" id="GenereLibro" name="genere" placeholder="Inserisci genere...">
      						{if ! $check.genere}
      						<div class="col-sm-8">
        						<small id="genereHelp" class="text-danger">
          							Solo caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>

    				<div class="form-group row">
      						<label for="Autore" class="col-sm-6 col-form-label {if !$check.autore} text-danger{/if}">Autore: *</label>
        						<input type="text" class="form-control" id="AutoreLibro" name="autore" placeholder="Inserisci autore...">		
      						{if ! $check.autore}
      						<div class="col-sm-8">
        						<small id="autoreHelp" class="text-danger">
          							Solo caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						<div class="form-group row">
      						<label for="NumCopieLibro" class="col-sm-6 col-form-label {if !$check.num_copie} text-danger{/if}">Numero copie: *</label>
        						<input type="text" class="form-control" id="NumCopieLibro" name="numcopie" placeholder="Inserisci numero di copie...">
      						{if ! $check.num_copie}
      						<div class="col-sm-8">
        						<small id="numcopieHelp" class="text-danger">
          							Almeno una copia.
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						<div class="form-group row">
      						<label for="IsbnLibro" class="col-sm-6 col-form-label {if !$check.isbn} text-danger{/if}">Isbn: *</label>	
        						<input type="text" class="form-control" id="IsbnLibro" name="isbn" placeholder="Inserisci isbn...">	
						{if ! $check.isbn}								
      						<div class="col-sm-8">
        						<small id="isbnHelp" class="text-danger">
          							Deve contenere 16 caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						<div class="form-group row">
      						<label for="DescrizioneLibro" class="col-sm-6 col-form-label {if !$check.descrizione} text-danger{/if}">Descrizione: *</label>
        						<input type="text" class="form-control" id="DescrizioneLibro" name="descrizione" placeholder="Inserisci una descrizione...">
      						{if ! $check.descrizione}
      						<div class="col-sm-8">
        						<small id="descrizioneHelp" class="text-danger">
          							Lunghezza massima 150 caratteri.
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
				
				<fieldset class="form-group">
  						<legend></legend>
  						<div class="form-group row">
    						<label for="exampleInputFile">Seleziona file copertina: *</label>
    						<input type="file" class="form-control-file" name="file">
  						</div>
				</fieldset>
					
				<button type="submit" class="btn btn-secondary">Carica</button>
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