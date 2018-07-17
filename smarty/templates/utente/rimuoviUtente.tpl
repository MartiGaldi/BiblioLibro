<!DOCTYPE html>
{utente->getNick assign='uNome'}
{utente->getId assign='uId'}
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Cancella Utente {if isset($rNome) && isset($rId)}{$rNome}{else}{$uNome}{/if}</title>
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

	{include file="navbar.tpl"}

	<div class="container text-center well">
		<h3>Eliminare profilo? Tutti i dati verrano persi.</h3>
		{if isset($rNome) && isset($rId)}{$rNome}{else}{/if}
		<form method="post" {if $uTipo eq 'bibliotecario' && isset($rNome) && isset($rId)}{if $rId!=$uId} action="/BiblioLibro/utente/rimuvi/{$rId}" {/if}{/if}>
    		<button type="submit" class="btn btn-primary btn-lg active" name="action" value="si">Si</button>
    		<button type="submit" class="btn btn-primary btn-lg btn-danger active" name="action" value="no">No</button>
		</form>
	</div>
	{include file="fine.tpl"}
</body>
</html>