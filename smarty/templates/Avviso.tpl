<!DOCTYPE html>

<html>
<head>
<title>Pagina di avviso</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
  </head>
  
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
	
	<div class="py-5 bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card text-black p-5 bg-secondary">
		  <div class="card-body">
	<form>
	<div class="container text-center">
		<h3>AVVISO</h3>
		<p>{$avviso}</p>
        <p>Torna alla <a href="/BiblioLibro/">HOME</a></p>
	</div>
	</form>
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