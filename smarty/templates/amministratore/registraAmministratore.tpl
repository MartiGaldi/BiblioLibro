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
	href="/deepmusic/resources/css/style.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	{include file="navbar.tpl"}

	
	<div class="container text-center">
		<div class="col-sm-3">
        </div>

		<div class="col-sm-7 well">
			{if $error}
			<div class="alert alert-warning">
				<strong>Attenzione!</strong><br>Combinazione sbagliata di mail e password <br>Riprova
			</div>

			{/if}
			<h2>Registra</h2>
					<form method="post" enctype="multipart/form-data" action="/BiblioLibro/amministratore/registra">
						<div class="form-group row">
      						<label for="inputMail" class="col-sm-2 col-form-label {if !$validazione.mail} text-danger{/if}">Mail:</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="user" name="name" placeholder="Insert username...">
      						</div>

      						{if ! $validazione.mail}
      						<div class="col-sm-3">
        						<small id="userHelp" class="text-danger">
          							La struttura della mail non è corretta.
        						</small>      
     						</div>
     						{/if}
    					</div>

    					

						<div class="form-group row">
      						<label for="inputPassword" class="col-sm-2 col-form-label {if !$validazione.password} text-danger{/if}">Password:</label>
      						<div class="col-sm-7">
        						<input type="password" class="form-control is-invalid" id="password" name="password" placeholder="Password">
      						</div>

      						{if ! $validazione.password}
      						<div class="col-sm-3">
        						<small id="passwordHelp" class="text-danger">
          							Deve avere una lunghezza compresa fra 8-20 caratteri.
        						</small>      
     						</div>
     						{/if}
    					</div>



						<fieldset class="form-group">
							<legend>Tipo Utente:</legend>
							<div class="form-check">
								<label class="form-check-label"> <input type="radio"
									class="form-check-input" name="type" value="listener" checked>
									Cliente
								</label>
							</div>

							<div class="form-check">
								<label class="form-check-label"> <input type="radio"
									class="form-check-input" name="type" value="musician">
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