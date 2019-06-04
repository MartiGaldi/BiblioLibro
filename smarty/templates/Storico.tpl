{if $array3}
<table class="table table-responsive">
	<tbody>					
	{foreach $array3 as $storico}
	<tr>
		<td>ID STORICO:</td>
		<td>ID LIBRO:</td>
		<td>DATA SCADENZA:</td>
	<tr>
		<td>{$storico->getId()}</td>
		<td><a href="/BiblioLibro/libro/mostra/{$storico->getLibroStorico()}">{$storico->getLibroStorico()}</a></td>
		<td>{$storico->getDataScadenza()}</td>
	</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Nessuno storico</p>
{/if}