<!DOCTYPE html>

<html>
<head>

{utente->getNick assign='uNick'}
{utente->getId assign='uId'}

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pannello</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>
  
</head>

<body>

	{include file="navbar.tpl"}
	
	<div class="container text-center">
		<div class="col-sm-3">
        </div>
		<div class="col-sm-7 ">
			<div class="well">
			<h1>Pannello Amministratore DB<h1>
			<br>
			<br>
			<a href="/BiblioLibro/amministratore/registra" 
				class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Registra</a>
			</div>
			<div class = "well">
				<a href="/BiblioLibro/amministratore/logout">ESCI</a>
			</div>
		</div>
	</div>
	
	{include file="fine.tpl"}
	
</body>
</html>
