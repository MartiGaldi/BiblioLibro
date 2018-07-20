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
					</ul>
					<ul class="nav navbar-nav">
          			<li float:right>	
      					<a href="/BiblioLibro/utente/login">ACCEDI</a>
					</li>
					<li float:right>
          				<a href="/BiblioLibro/utente/registra">REGISTRATI</a>
          			</li>
					</ul>
          			{else}
          			<!-- se loggato -->
					<li>
           				<a href="/BiblioLibro/utente/profilo/{$uId}">{$uName} Profilo</a>
          			</li>
          			
          			<li>
           				<a href="/BiblioLibro/utente/prestito"> Prestiti </a>
          			</li>
          			
          			{if $uTipo eq 'cliente'}
          			<li>
           				<a href="/BiblioLibro/Catalogo"> Catalogo </a>
          			</li>
          			{/if}
          			
          			{if $uTipo eq 'bibliotecario'}
        			 <li>
           				<a href="/BiblioLibro/Utenti"> Utenti </a>
          			</li>
          			 <li>
           				<a href="/BiblioLibro/libro/caricaLibro"> + Libro </a>
          			</li>
          			<li>
           				<a href="/BiblioLibro/libro/rimuoviLibro"> - Libro </a>
          			</li>
          			<li>
           				<a href="/BiblioLibro/libro/modificaLibro"> Modifica Libro </a>
          			</li>
          			{/if}
          			
          			
          			<!-- Log Out -->
          			<li>
        				<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/logout/">
          				<i class="fa d-inline fa-lg fa-user-circle-o"></i> ESCI </a>
          			</li>
          			
          	{/if}	
    	 </ul>
          
      </div>
    </div>
  </nav>