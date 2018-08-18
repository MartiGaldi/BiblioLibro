<!DOCTYPE html>

<html>
<head>
<title>Registrazione Info Libro</title>
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
		
        <div class="col-sm-7">
			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione</strong><br>Combinazione errata di mail e password. <br>Riprova
			</div>
			{/if}

			<h2>Registra Informazioni Libro</h2>
					
				<form method="post" id="info" enctype="multipart/form-data" action="inserisciInfo">
  					<fieldset class="form-group">
  						<legend></legend>
						
						{if $uTipo=='bibliotecario'}
						
						<div class="form-group row">
							<label for="isbn" class="col-sm-2 col-form-label {if !$check.isbn} text-danger{/if}">
								Isbn: *
							</label> 
							<div class="col-sm-7">
								<input type="text" class="form-control" name="isbn"
								{if $uInfo->getIsbn()} 
								value="{$uInfo->getIsbn()}" 
								{/if}
								placeholder="Inserisci isbn...">
							</div>
							{if !$check.isbn}
							<div class="col-sm-4 well">
	        					<small id="isbnHelp" class="text-danger">
	          						Deve contenere 16 caratteri.
	          					</small>      
	     					</div>
	     					{/if}
							</div>
							
							
							<div class="form-group row">
								<label for="descrizione" class="col-sm-3 col-form-label {if !$check.descrizione} text-danger{/if}">
									Descrizione: *
								</label> 
								<div class="col-sm-7">
									<input type="text" class="form-control" name="descrizione" 
									{if $uInfo->getDescrizione()}
										value="{$uInfo->getDescrizione()}"
									{/if}
									placeholder="Inserisci descrizione...">
								</div>
								{if !$check.descrizione}
								<div class="col-sm-4 well">
	        						<small id="cognomeHelp" class="text-danger">
	          							Deve avere una lunghezza massima di 150 caratteri.
	        						</small>      
	     						</div>
	     						{/if}
							</div>
							
							
						</fieldset>
						
					<fieldset class="form-group">
  						<legend></legend>
  						<div class="form-group row">
    						<label for="exampleInputFile">Seleziona file copertina: *</label>
    						<input type="file" class="form-control-file" name="file">
  						</div>
					</fieldset>
						
					<button type="submit" class="btn btn-primary">Registra</button>
				</form>
				</div>
		</div>
	{/if} 
	
	<div class="col-sm-3">
		
	</div>
	
		{include file="fine.tpl"}
		
</body>
</html>