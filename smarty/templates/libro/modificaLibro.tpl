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
	
	<div class="py-5 bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
				
				</div>
	<div class="col-md-6">
		<div class="card text-white p-5 bg-primary">
			<div class="card-body">
			<h1 class="mb-4"> Modifica Libro </h1>

			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione</strong>
				<br> 
				<br>
				Riprova.
			</div>
			{/if}
			
			<form method="post" enctype="multipart/form-data" action="/BiblioLibro/libro/modifica/{$libro->getId()}">
					
					<div class="form-group row">
						<input type="text" class="form-control" id="id" name="id" value="{$libro->getId()}" hidden>
					</div>
			
					
					<div class="form-group row">
						<label for="libro" class="col-sm-6 col-form-label {if !$check.titolo} text-danger{/if}">Titolo: </label>
						<input type="text" class="form-control" id="libro" name="titolo" value="{$libro->getTitolo()}" placeholder="Inserisci nuovo titolo...">
						{if ! $check.titolo}
						<div class="col-sm-8">
							<small id="titoloHelp" class="text-danger">
								Solo caratteri alfanumerici
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="genereLibro" class="col-sm-6 col-form-label {if !$check.genere} text-danger{/if}">Genere: </label>
						<input type="text" class="form-control" id="genereLibro" name="genere" value ="{$libro->getGenere()}" placeholder="Inserisci genere...">
						{if ! $check.genere}
						<div class="col-sm-8">
							<small id="genereHelp" class="text-danger">
  								Solo caratteri alfabetici.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="autoreLibro" class="col-sm-6 col-form-label {if !$check.autore} text-danger{/if}">Autore: </label>
						<input type="text" class="form-control" id="autoreLibro" name="autore" value ="{$libro->getAutore()}" placeholder="Inserisci autore...">
						{if ! $check.autore}
						<div class="col-sm-8">
							<small id="autoreHelp" class="text-danger">
  								Solo caratteri alfabetici.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
						<label for="numCopieLibro" class="col-sm-6 col-form-label {if !$check.num_copie} text-danger{/if}">Numero copie: </label>
						<input type="text" class="form-control" id="numCopieLibro" name="num_copie" value ="{$libro->getNumCopie()}" placeholder="Inserisci numero copie...">
						{if ! $check.num_copie}
						<div class="col-sm-8">
							<small id="numcopieHelp" class="text-danger">
  								Solo caratteri numerici; Almeno una copia.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
      						<label for="inputCopieDisponibili" class="col-sm-6 col-form-label {if !$check.copieDisponibili} text-danger{/if}">Copie disponibili: </label>
        					<input type="text" class="form-control" id="inputCopieDisponibili" name="copieDisponibili" value ="{$libro->getCopieDisponibili()}" placeholder="Inserisci numero di copie disponibili per il prestito...">
      						{if ! $check.copieDisponibili}
      						<div class="col-sm-8">
        						<small id="copieDisponibiliHelp" class="text-danger">
          							Solo caratteri numerici.
        						</small>      
     						</div>
     						{/if}
    				</div>
						
					<div class="form-group row">
						<label for="isbnLibro" class="col-sm-6 col-form-label {if !$check.isbn} text-danger{/if}">Isbn: </label>
						<input type="text" class="form-control" id="isbnLibro" name="isbn" value ="{$libro->getIsbn()}" placeholder="Inserisci isbn...">
						{if ! $check.isbn}
						<div class="col-sm-8">
							<small id="isbnHelp" class="text-danger">
  								Deve contenere 13 caratteri.
							</small>      
						</div>
						{/if}
					</div>
					
					<div class="form-group row">
      						<label for="libro" class="col-sm-6 col-form-label {if !$check.durata} text-danger{/if}">Durata: </label>
        					<input type="text" class="form-control" id="libro" name="durata" value ="{$libro->getDurata()}" placeholder="Inserisci durata del prestito...">
      						{if ! $check.durata}
      						<div class="col-sm-8">
        						<small id="durataHelp" class="text-danger">
          							BREVE - LUNGO - CONSULTAZIONE
        						</small>      
     						</div>
     						{/if}
    					</div>
						
					<div class="form-group row">
						<label for="descrizioneLibro" class="col-sm-6 col-form-label {if !$check.descrizione} text-danger{/if}">Descrizione: </label>
						<input type="text" class="form-control" id="descrizioneLibro" name="descrizione" value ="{$libro->getDescrizione()}" placeholder="Inserisci una descrizione...">
						{if ! $check.descrizione}
						<div class="col-sm-8">
							<small id="descrizioneHelp" class="text-danger">
  								Lunghezza massima 150 caratteri.
							</small>      
						</div>
						{/if}
					</div>
					
				</fieldset>
				
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