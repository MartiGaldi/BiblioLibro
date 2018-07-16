<!DOCTYPE html>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Login Amministratore</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet"
	href="/BiblioLibro/resorse/css/style.css">
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
			<h2>Login Amministratore</h2>
			<hr>
			{if $error}

			<div class="alert alert-warning">
				<strong>Attenzione!</strong><br>Combinazione errara di mail e password. <br>Please retry.
			</div>
			{/if}

			<br>

					<form class="form-horizontal" method="post" action="login">
						<div class="form-group row">
      						<label for="user" class="col-sm-2 col-form-label {if !$validazione.mail} text-danger{/if}">Mail:</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="inputPassword" name="mail" placeholder="Inserisci mail...">
      						</div>

      						{if ! $validazione.mail}
      						<div class="col-sm-3">
        						<small id="passwordHelp" class="text-danger">
          							La struttura della mail non è valida.
        						</small>      
     						</div>
     						{/if}
    					</div>

    					

    					<div class="form-group row">
      						<label for="password" class="col-sm-2 col-form-label {if !$validazione.password} text-danger{/if}">Password:</label>
      						<div class="col-sm-7">
        						<input type="password" class="form-control is-invalid" id="inputPassword" name="password" placeholder="Password">
      						</div>

      						{if ! $validazione.password}
      						<div class="col-sm-3">
        						<small id="passwordHelp" class="text-danger">
          							La password deve contenere dagli 8 ai 20 charatteri.
        						</small>      
     						</div>
     						{/if}
    					</div>

    					

						<div class="form-group">
							<button type="submit" class="btn btn-default">ACCEDI</button>
						</div>
					</form>
		</div>

	<div class="col-sm-3">

		

	</div>
</body>
</html>