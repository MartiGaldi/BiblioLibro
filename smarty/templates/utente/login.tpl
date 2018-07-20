<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Log In</title>
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
		<div class="col-md-7 well">
			<h1>Login</h1>
			<hr>
			{if $errore}
			<div class="alert alert-warning">
			<!-- Form errore-->
				<strong>Attenzione!</strong><br> Combinazione errata di utente e password. <br>Riprova.
			</div>
			{/if}
			
			<form class="form-horizontal" method="post" action="login">
				<div class="form-group row">
					<label for="utente" class="col-sm-2 col-form-label {if !$check.mail} text-danger{/if}">Mail:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control is-invalid" id="utente" name="mail" placeholder="Inserisci mail...">
					</div>
					{if ! $check.mail}
					<div class="col-sm-3 well">
						<small id="mailHelp" class="text-danger">
  							La struttura non è valida.
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
					<div class="col-sm-3 well">
						<small id="passwordHelp" class="text-danger">
  							Deve contenere 8-20 caratteri.
						</small>      
					</div>
					{/if}
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-default">Accedi</button>
				</div>
			</form>

		</div>
		<div class="col-sm-3">
		
		</div>
	</div>
	
	{include file="fine.tpl"}
</body>
</html>