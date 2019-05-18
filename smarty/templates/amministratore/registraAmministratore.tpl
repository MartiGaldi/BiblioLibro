<!DOCTYPE html>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Accedi</title>
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
	{include file="navbar.tpl"}

	
	<div class="container text-center">
		<div class="col-sm-3">
        </div>

		<div class="col-sm-7 well">
			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione!</strong><br>Combinazione sbagliata di mail e password <br>Riprova
			</div>

			{/if}
			<h2>Registra</h2>
					<form method="post" enctype="multipart/form-data" action="/BiblioLibro/amministratore/registra">
						<div class="form-group row">
      						<label for="inputMail" class="col-sm-2 col-form-label {if !$check.mail} text-danger{/if}">Mail:</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="utente" name="mail" placeholder="Inserisci mail...">
      						</div>

      						{if ! $check.mail}
      						<div class="col-sm-3">
        						<small id="mailHelp" class="text-danger">
          							La struttura della mail non è corretta.
        						</small>      
     						</div>
     						{/if}
    					</div>

    					

						<div class="form-group row">
      						<label for="inputPassword" class="col-sm-2 col-form-label {if !$check.password} text-danger{/if}">Password:</label>
      						<div class="col-sm-7">
        						<input type="password" class="form-control is-invalid" id="inputPassword" name="password" placeholder="Password">
      						</div>

      						{if ! $check.password}
      						<div class="col-sm-3">
        						<small id="passwordHelp" class="text-danger">
          							Deve avere una lunghezza compresa fra 8-20 caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>
    					
    					
    					<div class="form-group row">
      						<label for="inputNick" class="col-sm-2 col-form-label {if !$check.nick} text-danger{/if}">NickName:</label>
      						<div class="col-sm-7">
        						<input type="nick" class="form-control is-invalid" id="inputNick" name="nick" placeholder="Inserisci NickName">
      						</div>

      						{if ! $check.nick}
      						<div class="col-sm-3">
        						<small id="nickHelp" class="text-danger">
          							Deve avere una lunghezza compresa fra 8-20 caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>



						<fieldset class="form-group">
							<legend>Tipo Utente:</legend>
							<div class="form-check">
								<label class="form-check-label"> <input type="radio"
									class="form-check-input" name="tipo" value="cliente" checked>
									Cliente
								</label>
							</div>

							<div class="form-check">
								<label class="form-check-label"> <input type="radio"
									class="form-check-input" name="tipo" value="bibliotecario">
									Bibliotecario
								</label>
							</div>
						</fieldset>

						<button type="submit" class="btn btn-primary">INVIA</button>
					</form>
		</div>

	<div class="col-sm-3">

		
	</div>
</body>
</html>