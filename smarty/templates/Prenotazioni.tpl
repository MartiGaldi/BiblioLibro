{if $array}
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $prenotazione}
	<tr>
		<td>ID PRENOTAZIONE</td>
		<td>ID UTENTE</td>
		<td>ID LIBRO</td>
		<td>DATA SCADENZA</td>
	<tr>
		<td>{$prenotazione->getId()}</td>
		<td>{$prenotazione->getUtentePrenotazione()}</td>
		<td>{$prenotazione->getLibroPrenotazione()}</td>
		<td>{$prenotazione->getDataScadenza()}</td>
	</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Nessuna prenotazione</p>
{/if}