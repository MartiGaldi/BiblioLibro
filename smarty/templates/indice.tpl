<!DOCTYPE html>
<html>
<head>
	<title>Benvenuti!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body class="bg-dark" >

{utente->getNick assign='uNick'}
	{utente->getId assign='uId'}
	
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
  
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="form-inline m-0 role="search" action="/BiblioLibro/ricerca/semplice ">
            <input class="form-control mr-2" type="text" placeholder="Fai la tua ricerca...">
            <button class="btn btn-primary" type="submit">CERCA</button>
			{if $uTipo != "visitatore"}
            <a class="nav-link" href="/BiblioLibro/ricerca/ricercaAvanzata"> ricerca avanzata </a>
			{/if}
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="/BiblioLibro/risorse/statics/biblioteca.jpg"> </div>
              <div class="carousel-item active">
                <img class="d-block img-fluid w-100" src="/BiblioLibro/risorse/statics/libri.png"> </div>
              <div class="carousel-item">
                <img class="d-block img-fluid w-100" src="/BiblioLibro/risorse/statics/libri2.png"> </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  {include file="fine.tpl"}
   <footer class="container-fluid text-center">

  		<a href="/BiblioLibro/amministratore/login">Pannello Amministratore</a>

	</footer>
</body>

</html>