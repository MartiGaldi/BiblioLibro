<nav class="navbar navbar-expand-md navbar-dark bg-primary">
	<div class="container">
		<a class="navbar-brand">
			<b>BiblioLibro</b>
		</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        		<ul class="navbar-nav">
        		
        			{if $uTipo eq 'visitatore'}
        			<!-- se visitatore -->
					<li class="nav-item">
					{if $smarty.server.REQUEST_URI eq "/BiblioLibro/"}
           				<a class="active nav-link" href="/BiblioLibro">Home</a>
						 {else}
						 <a class="nav-link" href="/BiblioLibro">Home</a>
					{/if}
          			</li>
          			<li class="nav-item">
					{if $smarty.server.REQUEST_URI eq "/BiblioLibro/chiSiamo"}
            			<a class="active nav-link" href="/BiblioLibro/chiSiamo">Chi siamo?</a>
						{else}
						 <a class="nav-link" href="/BiblioLibro/chiSiamo">Chi siamo?</a>
					{/if}
          			</li>
          			<li class="nav-item">
					{if $smarty.server.REQUEST_URI eq "/BiblioLibro/contattaci"}
            			<a class="active nav-link" href="/BiblioLibro/contattaci">Contattaci</a>
						{else}
						 <a class="nav-link" href="/BiblioLibro/contattaci">Contattaci</a>
					{/if}
          			</li>
					</ul>
					<ul class="navbar-nav">
          			<li class="nav-item" float:right>	
      					<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/login">
							<i class="fa d-inline fa-lg fa-user-circle-o"></i>ACCEDI</a>
					</li>
					<li class="nav-item" float:right>
          				<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/iscrizione">REGISTRATI</a>
          			</li>
					</ul>
					
          			{else}
          			<!-- se loggato -->
					<li class="nav-item">
           				<a class="active nav-link" href="/BiblioLibro">Home</a>
          			</li>
					<li class="nav-item">
           				<a class="nav-link" href="/BiblioLibro/utente/profilo/{$uId}">{$uNick}</a>
          			</li>
					
          			
					{if $uTipo eq 'cliente'}
          			<li class="nav-item">
           				<a class="nav-link" href="/BiblioLibro/libro/catalogo"> Catalogo </a>
          			</li>
          			{/if}
          			
          			{if $uTipo eq 'bibliotecario'}
					
          			<li class="nav-item">
           				<a class="nav-link" href="/BiblioLibro/libro/carica"> + Libro </a>
          			</li>
          			{/if}
          			
          			
          			<!-- Log Out -->
					<ul class="navbar-nav">
          			<li class="nav-item" float:right>
        				<a class="btn navbar-btn ml-2 text-white btn-secondary" href="/BiblioLibro/utente/logout">
          				<i class="fa d-inline fa-lg fa-user-circle-o"></i> ESCI </a>
          			</li>
					</ul>
          	{/if}	
    	 </ul>
          
      </div>
    </div>
  </nav>