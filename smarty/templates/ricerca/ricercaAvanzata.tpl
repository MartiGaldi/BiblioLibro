<!DOCTYPE html>

<html>
<head>
<title>Ricerca Avanzata</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/BiblioLibro/risorse/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="bg-dark">

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

	<div class="container text-center">
		<div class="col-sm-3">

		

        </div>

		<div class="col-sm-7 well">
			<form action="/BiblioLibro/ricerca/avanzata">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" id="ricerca" name="str" placeholder="Cerca...">
					</div>

					<div class="form-group col-md-3">
						<select id="inputKey" class="form-control" name="key">
							<option value="libro">Libro</option>
						</select>
					</div>
					
					<div class="form-group col-md-3">
						<select id="inputKey" class="form-control" name="value">
							<option value="titolo" selected>Titolo</option>
							<option value="autore">Autore</option>
						</select>
					</div>

					<button class="btn btn-primary" type="submit">CERCA</button>
				</div>
			</form>
		</div>

		<div class="col-sm-3">

		

		</div>
	</div>
	
	{include file="fine.tpl"}
	
</body>
</html>