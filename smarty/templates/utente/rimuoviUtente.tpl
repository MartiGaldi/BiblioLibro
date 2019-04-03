<!DOCTYPE html>

<html>
<head>
<title>Cancella Utente {if isset($rNick) && isset($rId)}{$rNick}{else}{$uNick}{/if}</title>
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

	<div class="py-5 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card text-black p-5 bg-secondary">
		  <div class="card-body">
	<div class="container text-center">
		<h3>Eliminare profilo? Tutti i dati verrano persi.</h3>
		{if isset($rNick) && isset($rId)}{$rNick}{else}{/if}
		<form method="post" {if $uTipo eq 'bibliotecario' && isset($rNick) && isset($rId)}{if $rId!=$uId} action="/BiblioLibro/utente/rimuvi/{$rId}" {else}
				action="/BiblioLibro/utente/rimuovi/{$pId}"{/if}{/if}>
    		<button type="submit" class="btn btn-primary btn-lg active" name="action" value="si">Si</button>
    		<button type="submit" class="btn btn-primary btn-lg btn-danger active" name="action" value="no">No</button>
		</form>
	</div>
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