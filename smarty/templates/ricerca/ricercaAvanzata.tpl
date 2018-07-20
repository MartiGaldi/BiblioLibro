<!DOCTYPE html>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Ricerca Avanzata</title>
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

	{include file="navbar.tpl"}

	

	<div class="container text-center">
		<div class="col-sm-3">

		

        </div>

		<div class="col-sm-7 well">
			<form action="/BiblioLibro/cerca/avanzata">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" id="cerca" name="str" placeholder="Cerca...">
					</div>

					<div class="form-group col-md-3">
						<select id="inputKey" class="form-control" name="key">
							<option value="libro" selected>Libro</option>
							<option value="utente">Utente</option>
						</select>
					</div>
					
					<div class="form-group col-md-3">
						<select id="inputKey" class="form-control" name="value">
							<option value="autore" selected>Autore</option>
							<option value="nome">Nome</option>
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