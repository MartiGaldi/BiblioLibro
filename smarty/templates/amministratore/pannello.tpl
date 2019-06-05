<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pannello</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
</head>

<body class="bg-dark">

{utente->getNick assign='uNick'}
{utente->getId assign='uId'}

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
	<div class="col-md-3"></div>
		<div class="col-md-6">
		<div class="card text-white p-5 bg-primary">
			<div class="card-body">
			<h1 class="mb-4">Pannello Amministratore DB<h1>
			<br>
			<br>
			<a href="/BiblioLibro/amministratore/registra" 
				class="btn btn-primary btn-lg active" role="button" aria-pressed="true">REGISTRA</a>
			
			<a href="/BiblioLibro/amministratore/logout"
				class="btn btn-primary btn-lg btn-danger active" role="button" aria-pressed="true">ESCI</a>
			</div>
		</div>
		<div class="col-md-4" ></div>
		</div>
	</div>
	</div>
	</div>
	
	{include file="fine.tpl"}
	
</body>
</html>
