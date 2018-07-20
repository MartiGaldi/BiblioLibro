<nav class="navbar navbar-expand-md navbar-dark bg-primary">

	<div class="container">

		<a class="navbar-brand">
			<b>BiblioLibro</b>
		</a>

			<button type="button" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navabar2SupportedContent">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        		<ul class="navbar-nav">
        		
        			{if $uTipo eq 'visitatore'}
        			
					<!-- Login (se visitatore) -->
					
					<li class="nav-item">
           				<a class="active nav-link" href="/BiblioLibro/">
              			<i class="fa fa-home fa-home"></i>&nbsp;Home</a>
          			</li>
          			
          			<li class="nav-item">
            			<a class="nav-link" href="/BiblioLibro/chi_siamo/">Chi siamo?</a>
          			</li>
          		
          			<li class="nav-item">
            			<a class="nav-link" href="/BiblioLibro/contattaci/">
              			<i class="fa d-inline fa-lg fa-envelope-o"></i> Contattaci </a>
          			</li>
          			
          		</ul>
        
      			<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/login">
          		<i class="fa d-inline fa-lg fa-user-circle-o"></i> ACCEDI </a>
          		<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/registra">
          		<i class="fa d-inline fa-lg fa-user-circle-o"></i> REGISTRATI </a>
          			
          			{/if}
          			
          			<!-- se loggato -->
          			
          			{if $uTipo eq 'bibliotecario'}
					
					<li class="nav-item">
           				<a class="active nav-link" href="/BiblioLibro/">
              			<i class="fa fa-home fa-home"></i>&nbsp;Home</a>
          			</li>
          			
          			<li class="nav-item">
            			<a class="nav-link" href="/BiblioLibro/utente/profilo/">Profilo</a>
          			</li>
          		
          			<li class="nav-item">
            			<a class="nav-link" href="/BiblioLibro/catalogo/"> Catalogo </a>
          			</li>
          			
          			<li class="nav-item">
            			<a class="nav-link" href="/BiblioLibro/utente/utenti/"> Utenti </a>
          			</li>
          			          			
          			<li class="nav-item">
            			<a class="nav-link" href="/BiblioLibro/utente/prestiti/"> Prestiti </a>
          			</li>
          			
          		</ul>
        		<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/logout/">
          		<i class="fa d-inline fa-lg fa-user-circle-o"></i> ESCI </a>
          
          			{/if}
          			
          			{if $uTipo eq 'cliente'}
					
					<li class="nav-item">
           				<a class="active nav-link" href="/BiblioLibro/">
              			<i class="fa fa-home fa-home"></i>&nbsp;Home</a>
          			</li>
          			
          			<li class="nav-item">
            			<a class="nav-link" href="/BiblioLibro/chi_siamo/">Chi siamo?</a>
          			</li>
          		
          			<li class="nav-item">
            			<a class="nav-link" href="/BiblioLibro/contattaci/">
              			<i class="fa d-inline fa-lg fa-envelope-o"></i> Contattaci </a>
          			</li>
          			
          			<li class="nav-item">
            			<a class="nav-link" href="/BiblioLibro/utente/profilo/">Profilo</a>
          			</li>
          			
          			</ul>
        			<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/logout/">
          			<i class="fa d-inline fa-lg fa-user-circle-o"></i> ESCI </a>
          			
          			{/if}
          
      </div>
    </div>
  </nav>