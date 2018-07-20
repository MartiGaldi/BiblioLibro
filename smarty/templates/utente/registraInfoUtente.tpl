<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Registrazione Info Utente</title>
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
	{user->getId assign='uId'} 
	
	{include file="navbar.tpl"}
	
	<div class="container text-center">
		<div class="col-sm-3">
		
        </div>
        <div class="col-sm-7 well">
			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione</strong><br>Combinazione errata di utente e password. <br>Riprova
			</div>
			{/if}

			<h2>Registra Informazioni Utente</h2>
					
				<form method="post" id="info" enctype="multipart/form-data" action="inserisciInfo">
  					<fieldset class="form-group">
  						<legend></legend>
						{if $uTipo=='cliente' or $uTipo=='bibliotecario'}
							
						<div class="form-group row">
							<label for="Nome" class="col-sm-2 col-form-label {if !$check.nome} text-danger{/if}">
								Nome: *
							</label> 
							<div class="col-sm-7">
								<input type="text" class="form-control" name="Nome" 
								{if $uInfo->getNome()}
									value="{$uInfo->getNome()}"
								{/if}
								placeholder="Inserisci nome...">
							</div>
							{if !$check.nome}
							<div class="col-sm-3 well">
	        					<small id="nomeHelp" class="text-danger">
	          						Deve contenere solo lettere.
	        					</small>      
	     					</div>
	     					{/if}
							</div>
							
							<div class="form-group row">
								<label for="Cognome" class="col-sm-2 col-form-label {if !$check.cognome} text-danger{/if}">
									Cognome: *
								</label> 
								<div class="col-sm-7">
									<input type="text" class="form-control" name="Cognome" 
									{if $uInfo->getCognome()}
										value="{$uInfo->getCognome()}"
									{/if}
									placeholder="Inserisci cognome...">
								</div>
								{if !$check.cognome}
								<div class="col-sm-3 well">
	        						<small id="cognomeHelp" class="text-danger">
	          							Deve contenere solo lettere.
	        						</small>      
	     						</div>
	     						{/if}
							</div>
						
						{/if}
					
						<div class="form-group row">
							<label for="LuogoNascita" class="col-sm-2 col-form-label {if !$check.luogoNascita} text-danger{/if}">
								Luogo di nascita: *
							</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="LuogoNascita" 
									{if $uInfo->getLuogoNascita()}
										value="{$uInfo->getLuogoNascita()}"
									{/if}
								placeholder="Inserisci luogo di nascita...">
							</div>
							{if !$check.luogoNascita}
							<div class="col-sm-3 well">
	        					<small id="lugoNascitaHelp" class="text-danger">
	          						Deve contenere caratteri alfanumerici.
	        					</small>      
	     					</div>
	     					{/if}
						</div>
	
						<div class="form-group row">
							<label for="DataNascita" class="col-sm-2 col-form-label {if !$check.dtNasc} text-danger{/if}">
								Data di nascita: *
							</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="DataNascita" 
									{if $uInfo->getDtNasc(true)}
										value="{$uInfo->getDtNasc(true)}"
									{/if}
									placeholder="Inserisci data di nascita...">
							</div>
							{if !$check.dtNasc}
							<div class="col-sm-3 well">
	        					<small id="dataHelp" class="text-danger">
	          						Il formato deve essere yyyy/mm/dd.
	        					</small>      
	     					</div>
	     					{/if}
						</div>
						
						<div class="form-group row">
							<label for="CodFiscale" class="col-sm-2 col-form-label {if !$check.codFisc} text-danger{/if}">
								Codice Fiscale: *
							</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="CodFisc" 
									{if $uInfo->getCodFisc(true)}
										value="{$uInfo->getCodFisc(true)}"
									{/if}
									placeholder="Inserisci codice fiscale...">
							</div>
							{if !$check.codFisc}
							<div class="col-sm-3 well">
	        					<small id="codHelp" class="text-danger">
	          						Solo caratteri alfanumerici. Lunghezza 16
	        					</small>      
	     					</div>
	     					{/if}
						</div>
	
						<div class="form-group row">
							<label for="Telefono" class="col-sm-2 col-form-label {if !$check.telefono} text-danger{/if}">
								Telefono: *
							</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="Telefono" 
									{if $uInfo->getTelefono(true)}
										value="{$uInfo->getTelefono(true)}"
									{/if}
									placeholder="Inserisci telefono...">
							</div>
							{if !$check.telefono}
							<div class="col-sm-3 well">
	        					<small id="telefonoHelp" class="text-danger">
	          						Solo caratteri numerici.
	        					</small>      
	     					</div>
	     					{/if}
						</div>
						
						
						<hr>
				<h2 id="imp">Sesso:</h2>
				<br>
				<div class="form-check">
					<label class="form-check-label"> <input type="radio"
						class="form-check-input" name="tipo" value="maschio" checked>
						Maschio
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label"> <input type="radio"
						class="form-check-input" name="tipo" value="femmina">
						Femmina
					</label>
					</fieldset>
						
					<button type="submit" class="btn btn-primary">Registra</button>
				</form>
	</div>
	<div class="col-sm-3">
		
	</div>
		{include file="fine.tpl"}
</body>
</html>