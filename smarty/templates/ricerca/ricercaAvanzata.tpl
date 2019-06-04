<!DOCTYPE html>

<html>
<head>
<title>Ricerca Avanzata</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
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

	<div class="py-5 text-center bg-light" >
    <div class="container py-5">
	<div class="row">
		<div class="col-sm-3">

        </div>

		<div class="col-sm-7">
			<form action="/BiblioLibro/ricerca/avanzata">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" id="ricerca" name="str" placeholder="Cerca...">
					</div>

					<div class="form-group col-md-3">
						<select id="inputKey" class="form-control" name="key">
							<option value="libro">Libro</option>
							<option value="utente">Utente</option>
						</select>
					</div>
					
					<div class="form-group col-md-3">
						<select id="inputValue" class="form-control" name="value">
							<option value="titolo" selected>Titolo</option>
							<option value="autore">Autore</option>
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
	</div>
	</div>
	
	{include file="fine.tpl"}
	
</body>
</html>