<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Amministratore</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
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
				<h1 class="mb-4"> Login Amministratore</h1>
								
			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione!</strong><br>Combinazione errata di mail e password. <br>Riprova.
			</div>
			{/if}

			
			<form action="login" method="post">
			
				<div class="form-group row">
      				<label for="utente" class="col-sm-6 {if !$check.nick1} text-danger{/if}">NickName:</label>
					<input type="text" class="form-control" id="utente" name="nick1" placeholder="Inserisci nickname..."></div>

      				{if ! $check.nick1}
      					<div class="col-sm-8">
        					<small id="nickHelp" class="text-danger">
          						Nickname non è valido.
        					</small>      
     					</div>
     				{/if}
						

    			<div class="form-group row">
      				<label for="inputPassword" class="col-sm-6 {if !$check.password1} text-danger{/if}">Password:</label>
        			<input type="password" class="form-control" id="inputPassword" name="password1" placeholder="Inserisci password..."></div>

      				{if ! $check.password1}
      					<div class="col-sm-3">
        					<small id="passwordHelp" class="text-danger">
          						La password deve contenere dagli 8 ai 20 charatteri.
        					</small>      
     					</div>
     						{/if}
    			<br>
				<button type="submit" class="btn btn-secondary">ACCEDI</button>
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