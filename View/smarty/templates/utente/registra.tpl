<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Registrazione</title>
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

	{utente->getNick assign='uNome'}
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
			<h2>Registrati</h2>
			<hr>
			<form method="post" enctype="multipart/form-data" action="signup">
			
				<div class="form-group row">
					<label for="utente" class="col-sm-2 col-form-label {if !$check.nick} text-danger{/if}">Nickname: </label>
					<div class="col-sm-7">
						<input type="text" class="form-control is-invalid" id="user" name="nick" placeholder="Inserisci nickname...">
					</div>
					{if ! $check.nick}
					<div class="col-sm-3 well">
						<small id="nickHelp" class="text-danger">
  							Solo caratteri alfanumerici.
						</small>      
					</div>
					{/if}
				</div>
				
				
				
				<div class="form-group row">
					<label for="mail" class="col-sm-2 col-form-label {if !$check.mail} text-danger{/if}">Mail: *</label>
					<div class="col-sm-7">
						<input type="text" class="form-control is-invalid" id="mail" name="mail" placeholder="Inserisci e-mail...">
					</div>
					{if ! $check.mail}
					<div class="col-sm-3 well">
						<small id="mailHelp" class="text-danger">
  							Deve essere una mail.
						</small>      
					</div>
					{/if}
				</div>
				
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-2 col-form-label {if !$check.password} text-danger{/if}">Password: *</label>
					<div class="col-sm-7">
						<input type="password" class="form-control is-invalid" id="inputPassword" name="password" placeholder="Password">
					</div>
					{if ! $check.password}
					<div class="col-sm-3 well">
						<small id="passwordHelp" class="text-danger">
  							Deve contere 8-20 caratteri.
						</small>      
					</div>
					{/if}
				</div>
				
				<hr>
				<h2 id="important">Tipo Utente:</h2>
				<br>
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
				<hr>
				<button type="submit" class="btn btn-primary">Registra</button>
			</form>

		</div>
	<div class="col-sm-3">
		
	</div>
	{include file="navbar.tpl"}
</body>
</html>