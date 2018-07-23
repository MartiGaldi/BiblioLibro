<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Amministratore</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

</head>

<body>
	{utente->getNick assign='uNick'}
	
	<div class="py-5">
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

		<div class="col-sm-7 well">
			<h2>Login Amministratore</h2>
			<hr>
			{if $errore}

			<div class="alert alert-warning">
				<strong>Attenzione!</strong><br>Combinazione errata di mail e password. <br>Riprova.
			</div>
			{/if}

			<br>

					<form class="form-horizontal" method="post" action="login">
						<div class="form-group row">
      						<label for="utente" class="col-sm-2 col-form-label {if !$check.mail} text-danger{/if}">Mail:</label>
      						<div class="col-sm-7">
        						<input type="text" class="form-control is-invalid" id="utente" name="mail" placeholder="Inserisci mail...">
      						</div>

      						{if ! $check.mail}
      						<div class="col-sm-3">
        						<small id="mailHelp" class="text-danger">
          							La struttura della mail non è valida.
        						</small>      
     						</div>
     						{/if}
    					</div>

    					

    					<div class="form-group row">
      						<label for="inputPassword" class="col-sm-2 col-form-label {if !$check.password} text-danger{/if}">Password:</label>
      						<div class="col-sm-7">
        						<input type="password" class="form-control is-invalid" id="inputPassword" name="password" placeholder="Inserisci password...">
      						</div>

      						{if ! $check.password}
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