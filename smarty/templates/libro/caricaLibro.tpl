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
			<h1 class="mb-4"> Aggiungi Libro </h1>

			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione</strong>
				<br> 
				<br>
				Riprova.
			</div>
			{/if}
			
					<form method="post" enctype="multipart/form-data" action="/BiblioLibro/libro/carica">
						<div class="form-group row">
      						<label for="libro" class="col-sm-6 col-form-label {if !$check.titolo} text-danger{/if}">Titolo: *</label>
        					<input type="text" class="form-control" id="libro" name="titolo" placeholder="Inserisci titolo...">
      						{if ! $check.titolo}
      						<div class="col-sm-8">
        						<small id="titoloHelp" class="text-danger">
          							Solo caratteri alfanumerici
        						</small>      
     						</div>
     						{/if}
    					</div>

						<div class="form-group row">
      						<label for="inputGenere" class="col-sm-6 col-form-label {if !$check.genere} text-danger{/if}">Genere: *</label>
        					<input type="text" class="form-control" id="inputGenere" name="genere" placeholder="Inserisci genere...">
      						{if ! $check.genere}
      						<div class="col-sm-8">
        						<small id="genereHelp" class="text-danger">
          							Solo caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>

    				<div class="form-group row">
      						<label for="inputAutore" class="col-sm-6 col-form-label {if !$check.autore} text-danger{/if}">Autore: *</label>
        					<input type="text" class="form-control" id="inputAutore" name="autore" placeholder="Inserisci autore...">		
      						{if ! $check.autore}
      						<div class="col-sm-8">
        						<small id="autoreHelp" class="text-danger">
          							Solo caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						<div class="form-group row">
      						<label for="inputNumCopie" class="col-sm-6 col-form-label {if !$check.num_copie} text-danger{/if}">Numero copie: *</label>
        						<input type="text" class="form-control" id="inputNumCopie" name="num_copie" placeholder="Inserisci numero di copie...">
      						{if ! $check.num_copie}
      						<div class="col-sm-8">
        						<small id="numcopieHelp" class="text-danger">
          							Almeno una copia.
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						
						<div class="form-group row">
      						<label for="inputCopieDisponibili" class="col-sm-6 col-form-label {if !$check.copieDisponibili} text-danger{/if}">Copie disponibili: *</label>
        						<input type="text" class="form-control" id="inputCopieDisponibili" name="copieDisponibili" placeholder="Inserisci numero di copie disponibili per il prestito...">
      						{if ! $check.copieDisponibili}
      						<div class="col-sm-8">
        						<small id="copieDisponibiliHelp" class="text-danger">
          							Solo caratteri numerici.
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						<div class="form-group row">
      						<label for="inputIsbn" class="col-sm-6 col-form-label {if !$check.isbn} text-danger{/if}">Isbn: *</label>	
        						<input type="text" class="form-control" id="inputIsbn" name="isbn" placeholder="Inserisci isbn...">	
						{if ! $check.isbn}								
      						<div class="col-sm-8">
        						<small id="isbnHelp" class="text-danger">
          							Deve contenere 13 caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						<div class="form-group row">
      						<label for="libro" class="col-sm-6 col-form-label {if !$check.durata} text-danger{/if}">Durata: *</label>
        					<input type="text" class="form-control" id="libro" name="durata" placeholder="Inserisci durata del prestito...">
      						{if ! $check.durata}
      						<div class="col-sm-8">
        						<small id="durataHelp" class="text-danger">
          							Prestito : BREVE - LUNGO - CONSULTAZIONE
        						</small>      
     						</div>
     						{/if}
    					</div>
						
						<div class="form-group row">
      						<label for="inputDescrizione" class="col-sm-6 col-form-label {if !$check.descrizione} text-danger{/if}">Descrizione: *</label>
        						<input type="text" class="form-control" id="inputDescrizione" name="descrizione" placeholder="Inserisci una descrizione...">
      						{if ! $check.descrizione}
      						<div class="col-sm-8">
        						<small id="descrizioneHelp" class="text-danger">
          							Lunghezza massima 150 caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>
					
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