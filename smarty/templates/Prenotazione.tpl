{if $array}
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $prenotazione}
	<tr>
		<td>ID PRENOTAZIONE:</td>
		<td>ID LIBRO:</td>
		<td>DATA SCADENZA:</td>
	<tr>
	<tr>
		<td>{$prenotazione->getId()}</td>
		<td><a href="/BiblioLibro/libro/mostra/{$prenotazione->getLibroPrenotazione()}">{$prenotazione->getLibroPrenotazione()}</a></td>
		<td>{$prenotazione->getDataScadenza()}</td>
	</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Nessuna prenotazione</p>
{/if}