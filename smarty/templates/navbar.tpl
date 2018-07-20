<<<<<<< HEAD
<nav class="navbar navbar-expand-md navbar-dark bg-primary">

	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand">
		<h1>BiblioLibro</h1>
		</a>
 	</div>
			<br>
			<br>
			<div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        		<ul class="nav navbar-nav">
        		
        			{if $uTipo eq 'visitatore'}
        			<!-- se visitatore -->
					<li>
           				<a href="/BiblioLibro/">Home</a>
          			</li>
          			<li>
            			<a href="/BiblioLibro/chi_siamo/">Chi siamo?</a>
          			</li>
          			<li class="nav-item">
            			<a href="/BiblioLibro/contattaci/">Contattaci</a>
          			</li>
          			<li>	
      					<a href="/BiblioLibro/utente/login">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ACCEDI</a>
					</li>
					<li>
          				<a href="/BiblioLibro/utente/iscriviti">REGISTRATI</a>
          			</li>
          			{else}
          			<!-- se loggato -->
					<li>
           				<a href="/BiblioLibro/utente/profilo/{$uId}">{$uName} Profilo</a>
          			</li>
          			
          			<li>
           				<a href="/BiblioLibro/catalogo"> Catalogo </a>
          			</li>
          			
          			<li>
           				<a href="/BiblioLibro/utente/prestito"> Prestiti </a>
          			</li>
          			
          			{if $uTipo eq 'bibliotecario'}
        			 <li>
           				<a href="/BiblioLibro/utente/Utenti"> Utenti </a>
          			</li>
          			 <li>
           				<a href="/BiblioLibro/libro/carica"> + Libro </a>
          			</li>
          			{/if}
          			
          			<!-- Log Out -->
          			<li>
        				<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/logout/">
          				<i class="fa d-inline fa-lg fa-user-circle-o"></i> ESCI </a>
          			</li>
          			
          	{/if}	
    	 </ul>
=======
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand">
        <b> BiblioLibro </b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
		
		{if $uTipo eq 'visitatore'}
		<!-- se visitatore -->
          <li class="nav-item">
            <a class="active nav-link" href="/BiblioLibro/indice">
              <i class="fa fa-home fa-home"></i>&nbsp;Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/BiblioLibro/chiSiamo">Chi siamo?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/BiblioLibro/contattaci">
              <i class="fa d-inline fa-lg fa-envelope-o"></i>Contattaci</a>
          </li>
        </ul>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/login">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> ACCEDI </a>
		  
		<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/iscriviti">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> REGISTRATI </a>
      </div>
    </div
	{else}
	<!-- se loggato -->
	 <li class="nav-item">
            <a class="nav-link" href="/BiblioLibro/utente/profilo/{$uId}">{$uName} Profilo</a>
          </li>
	 <li class="nav-item">
            <a class="nav-link" href="/BiblioLibro/utente/prestito"> Prestiti </a>
          </li>
		  
		  {if $uTipo eq 'cliente'}
		  
		 <li class="nav-item">
            <a class="nav-link" href="/BiblioLibro/Catalogo"> Catalogo </a>
         </li>
		 
		   {/if} 
	
		{if $uTipo eq 'bibliotecario'}
		
		<li class="nav-item">
            <a class="nav-link" href="/BiblioLibro/Utenti"> Utenti </a>
         </li>
		 <li class="nav-item">
            <a class="nav-link" href="/BiblioLibro/libro/caricaLibro"> + Libro </a>
         </li>
		 <li class="nav-item">
            <a class="nav-link" href="/BiblioLibro/libro/rimuoviLibro"> - Libro </a>
         </li>
		 <li class="nav-item">
            <a class="nav-link" href="/BiblioLibro/libro/modificaLibro"> Modifica Libro </a>
         </li>
		 {/if}
		 
		 <!-- Log Out -->
		 <li>
        		<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/logout/">
          		<i class="fa d-inline fa-lg fa-user-circle-o"></i> ESCI </a>
         </li>
		 {/if}
		  </ul>
>>>>>>> 02bbe04d4a8fd83b0b9679ce1f946f8883985299
          
      </div>
    </div>
  </nav>