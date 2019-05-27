<!DOCTYPE html>
<html>
<head>
<title>Rimuovi Prestito</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
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

	<div class="container text-center well">
		<h3>Sicuro di voler rimuovere il prestito?</h3>
		<form method="post" action="/BiblioLibro/prestito/rimuovi/{$prestito->getId()}">
    		<button type="submit" class="btn btn-primary btn-lg active" name="action" value="si">Si</button>
    		<button type="submit" class="btn btn-primary btn-lg btn-danger active" name="action" value="no">No</button>
		</form>
	</div>
	
	{include file="fine.tpl"}
	
</body>
</html>