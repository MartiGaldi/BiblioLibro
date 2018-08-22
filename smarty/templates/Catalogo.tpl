{if $array}
<!-- Tabella che mostra i libri -->
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $libro}
		<tr>
		    {if isset($value)}
			{if $value eq 'Titolo'|| $value eq 'Autore'}
			<!-- Titolo libro -->
			<td><a href="/BiblioLibro/libro/mostra/{$libro->getId()}">{$libro->getTitolo()}</a></td>
			<!-- Autore libro -->
			<td>{$libro->getAutore()}</td>
			<!-- Genere del libro -->
			<td>{$libro->getGenere()}</td>
			<!-- Durata del prestito -->
			<td>{$libro->getDurata()}</td>
			{/if}
			{/if}}
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Il testo ricercato non e' presente nel catalogo.</p>
{/if}