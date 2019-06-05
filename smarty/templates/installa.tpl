<!DOCTYPE html>
<html>
<head>
<title>INSTALLAZIONE</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
</head>

<body class="bg-dark">

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
  
  
  <div class="py-5 bg-light">
	<div class="container">
	<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6">
		
		
		
			<div>
			<h1 class="mb-4">Applicazione Web 2017/2018<h1>
			<br>
			<p>Questa applicazione richiede che i cookie siano abilitati</p>
			</div>
<br>
<br>
			{if $versione}
			<h2>Installazione</h2>
			<hr>
			<form class="form-horizontal" method="post" action="install">
				<div class="form-group">
					<label class="control-label " for="user">Nome Utente:</label>
					<input type="text" class="form-control" id="user" placeholder="Inserisci username..." name="admin">
				</div>

				<div class="form-group">
					<label class="control-label" for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Inserisci password..." name="pwd">
				</div>

				<div class="form-group">
					<label class="control-label " for="db">Nome Database:</label>
					<input type="text" class="form-control" id="db" placeholder="Inserisci nome database..." name="database">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg active">INVIA</button>
				</div>
			</form>

			{else}
			
			<p>Questa applicazione richiede PHP 7.2.1</p>
			
			{/if}
			<br>
			<br>
			<div class="row-sm-7">
			<h4>AUTORI:</h4>
			<ul>
				<li>Galdi Martina</li>
				<li>Casimirri Sara</li>
			</ul>
			</div>

		</div>
	</div>
		<div class="col-sm-3"></div>
	
	</div>
	</div>
</body>
</html>