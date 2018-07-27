<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  
  <div class="py-5 text-white bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img class="d-block img-fluid my-3" src="/BiblioLibro/risorse/statics/mappa.jpg"> </div>
        <div class="col-md-6">
          <h1 class="bg-primary">Contattaci</h1>
          <p class="text-dark">Ci piacerebbe soddisfare le tue richieste!</p>
          <form>
            <div class="form-group">
              <label for="InputName" class="text-dark">Nome:</label>
              <input type="text" class="form-control" id="InputName" placeholder="Il tuo nome"> </div>
            <div class="form-group">
              <label for="InputEmail1" class="text-dark">Email:</label>
              <input type="email" class="form-control" id="InputEmail1" placeholder="La tua email"> </div>
            <div class="form-group">
              <label for="Textarea" class="text-dark">Scrivi qui:</label>
              <textarea class="form-control" id="Textarea" rows="3" placeholder="Scrivi qui la tua richiesta..."></textarea>
            </div>
            <button type="submit" class="btn btn-secondary">Invia</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  {include file="fine.tpl"}
  
</body>

</html>