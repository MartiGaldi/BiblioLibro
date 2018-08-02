{if $array}
<!-- Tabella che mostra i libri -->
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $libro}
		<tr>
			<!-- Titolo libro -->
			<td><a href="/BiblioLibro/libro/show/{$libro->getId()}">{$libro->getTitolo()}</a></td>
			<!-- Autore libro -->
			<td>{$libro->getAutore()}</td>
			<!-- Genere del libro -->
			<td>{$libro->getGenere()}</td>
			<!-- Durata del prestito -->
			<td>{$libro->getDurata()}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Il testo ricercato non è presente nel catalogo</p>
{/if}