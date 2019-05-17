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
				Combinazione errata di mail e/o password.
				<br>
				Riprova.
			</div>
			{/if}
              
              <form action="iscrizione" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="utente" class="col-sm-6 col-form-label {if !$check.nick} text-danger{/if}"> NickName: *</label>
				  <input type="text" class="form-control" id="utente" name="nick_name" placeholder="Inserisci NickName...">
                
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
                  <input type="text" class="form-control" id="mail" name="mail" placeholder="Inserisci mail...">
                
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
				<br>
				<br>
				<h5>DATI ANAGRAFICI </h5>
				 <div class="form-group row">
                  <label for="utente" class="col-sm-6 col-form-label {if !$check.nome} text-danger{/if}"> Nome: *</label>
				  <input type="text" class="form-control" id="utente" name="nome" placeholder="Inserisci Nome...">
                
					{if ! $check.nome}
					<div class="col-sm-8">
						<small id="nomeHelp" class="text-danger">
  							Deve comprendere dagli 3 ai 20 caratteri.
						</small>      
					</div>
					{/if}
					</div>
					
				  <div class="form-group row">
                  <label for="utente" class="col-sm-6 col-form-label {if !$check.cognome} text-danger{/if}"> Cognome: *</label>
				  <input type="text" class="form-control" id="utente" name="cognome" placeholder="Inserisci Cognome...">
                
					{if ! $check.cognome}
					<div class="col-sm-8">
						<small id="cognomeHelp" class="text-danger">
  							Deve comprendere dagli 3 ai 20 caratteri.
						</small>      
					</div>
					{/if}
					</div>
				
				
				
				 <div class="form-group row">
                  <label for="utente" class="col-sm-6 col-form-label {if !$check.dtNasc} text-danger{/if}"> Data di Nascita: *</label>
				  <input type="text" class="form-control" id="utente" name="dtNasc" placeholder="Inserisci Data di Nascita...">
                
					{if ! $check.dtNasc}
					<div class="col-sm-8">
						<small id="dtNascHelp" class="text-danger">
  							Deve rispettare il formato GG-MM-AAAA
						</small>      
					</div>
					{/if}
					</div>
					
				  <div class="form-group row">
                  <label for="utente" class="col-sm-6 col-form-label {if !$check.lgNasc} text-danger{/if}"> Luogo di Nascita: *</label>
				  <input type="text" class="form-control" id="utente" name="lgNasc" placeholder="Inserisci Luogo di Nascita...">
                
					{if ! $check.lgNasc}
					<div class="col-sm-8">
						<small id="lgNascHelp" class="text-danger">
  							Deve comprendere dagli 6 ai 20 caratteri.
						</small>      
					</div>
					{/if}
					</div>
					
				  <div class="form-group row">
                  <label for="utente" class="col-sm-6 col-form-label {if !$check.via} text-danger{/if}"> Via/Piazza: *</label>
				  <input type="text" class="form-control" id="utente" name="via" placeholder="Inserisci via...">
                
					{if ! $check.via}
					<div class="col-sm-8">
						<small id="viaHelp" class="text-danger">
  							Deve comprendere dagli 3 ai 20 caratteri.
						</small>      
					</div>
					{/if}
					</div>
					
					<div class="form-group row">
                  <label for="utente" class="col-sm-6 col-form-label {if !$check.citta} text-danger{/if}"> Città: *</label>
				  <input type="text" class="form-control" id="utente" name="citta" placeholder="Inserisci città...">
                
					{if ! $check.citta}
					<div class="col-sm-8">
						<small id="cittaHelp" class="text-danger">
  							Deve comprendere dagli 3 ai 20 caratteri.
						</small>      
					</div>
					{/if}
					</div>
					
					<div class="form-group row">
                  <label for="utente" class="col-sm-6 col-form-label {if !$check.cap} text-danger{/if}"> CAP: *</label>
				  <input type="text" class="form-control" id="utente" name="cap" placeholder="Inserisci CAP...">
                
					{if ! $check.cap}
					<div class="col-sm-8">
						<small id="capHelp" class="text-danger">
  							Deve comprendere dagli 3 ai 20 caratteri.
						</small>      
					</div>
					{/if}
					</div>
					
				<br>
				<br>
				<br>
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