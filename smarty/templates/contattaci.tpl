<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contattaci!</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body class="bg-dark" >
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
  
  <div class="py-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
		  <div class="card-body">
		  <h1 class="mb-4">Contattaci</h1>
          <p class="text-light">Ci piacerebbe soddisfare le tue richieste!</p>
          <form>
            <div class="form-group row">
              <label for="InputName" class="col-sm-6 text-dark">Nome:</label>
              <input type="text" class="form-control" id="InputName" name="nome" placeholder="Il tuo nome"> </div>
            <div class="form-group row">
              <label for="InputEmail1" class="col-sm-6 text-dark">Email:</label>
              <input type="email" class="form-control" id="InputEmail1" name="mail" placeholder="La tua email"> </div>
            <div class="form-group row">
              <label for="Textarea" class="col-sm-6 text-dark">Scrivi qui:</label>
              <textarea class="form-control" id="Textarea" name="textarea" rows="3" placeholder="Scrivi qui la tua richiesta..."></textarea>
            </div>
			<br>
            <button type="submit" class="btn btn-secondary">Invia</button>
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