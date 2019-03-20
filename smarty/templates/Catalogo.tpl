{if $array}
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $libro}
	<tr>
	<td>TITOLO</td>
	<td>AUTORE</td>
	<td>GENERE</td>
	<td>DURATA</td>
	<td>DESCRIZIONE</td>
	<td>NUMERO COPIE</td>
	<td>ISBN</td>
	
		<tr>
		<td><a href="/Bibliolibro/libro/mostra/{$libro->getId()}">{$libro->getTitolo()}</a></td>
			<td>{$libro->getAutore()}</td>
			<td>{$libro->getGenere()}</td>
			<td>{$libro->getDurata()}</td>
			<td>{$libro->getDescrizione()}</td>
			<td>{$libro->getNumCopie()}</td>
			<td>{$libro->getIsbn()}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Il testo ricercato non e' presente nel catalogo.</p>
{/if}