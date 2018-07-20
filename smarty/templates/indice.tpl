<!DOCTYPE html>

<html>

<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<title>Benvenuti!</title>

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

	

	{utente->getNick assign='uNick'}

	{utente->getId assign='uId'}

	<!-- Navbar -->

	{include file="navbar.tpl"}

	<br>
	

	<!-- Riquadro centrale -->

	<div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="form-inline" role="search" action="/BiblioLibro/ricerca/semplice>
          <div class="form-group input-group">
            <input class="form-control mr-2" name="str" type="text" placeholder="Fai la tua ricerca...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
          </div>
			</form>
          {if $uTipo != "visitatore"}
            <a class="nav-link" href="/BiblioLibro/ricerca/avanzata"> ricerca avanzata </a>
          {/if}
        </div>
      </div>
    </div>
	
	<div class="container text-center well">
		<div class="row">
			<div class="col-sm-4">
				<img src="BiblioLibro/risorse/statics/libri.png/">
			</div>
		</div>
	</div>
	

	<footer class="container-fluid text-center">

  		<a href="/BiblioLibro/amministratore/login">Pannello Amministratore</a>

	</footer>

</body>

</html>