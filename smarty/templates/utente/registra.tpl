<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrati</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
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
			<h1 class="mb-4"> Registrati </h1>
			
			{if $errore}
			<div class="alert alert-warning">
				<strong>Attenzione!</strong>
				<br>
				Combinazione errata di mail e password.
				<br>
				Riprova.
			</div>
			{/if}
              
              <form action="iscrizione" method="post" enctype="multipart/form-data">
			  
                <div class="form-group row">
                  <label for="utente" class="col-sm-6 col-form-label {if !$check.nick} text-danger{/if}"> NickName: *</label>
				  <input type="text" class="form-control" id="utente" name="nick" placeholder="Inserisci NickName...">
                
					{if ! $check.nick}
					<div class="col-sm-8">
						<small id="nickHelp" class="text-danger">
  							Deve comprendere dagli 6 ai 20 caratteri.
						</small>      
					</div>
					{/if}
					</div>
				
				
				<div class="form-group row">
				<label for="mail" class="col-sm-6 col-form-label{if !$check.mail} text-danger{/if}">Indirizzo email: * </label>
                  <input type="text" class="form-control" id="mail" name="mail" placeholder="Iserisci mail...">
                
					{if ! $check.mail}
					<div class="col-sm-8 well">
						<small id="mailHelp" class="text-danger">
  							Deve essere una mail.
						</small>      
					</div>
					{/if}
				</div>
				
				<div class="form-group row">
                  <label for="inputPassword" class="col-sm-6 col-form-label{if !$check.password} text-danger{/if}">Password: *</label>
				  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Inserisci password...">
                
					{if ! $check.password}
					<div class="col-sm-8 well">
						<small id="passwordHelp" class="text-danger">
  							Deve contere 6-20 caratteri.
						</small>      
					</div>
					{/if}
				</div>
				
				
                <label>Tipo Utente: *</label>
                <br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" value="cliente" name="tipo" checked> Cliente </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" value="bibliotecario" name="tipo"> Bibliotecario </label>
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-secondary">Registra</button>
                <button type="reset" class="btn btn-secondary">Cancella</button>
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