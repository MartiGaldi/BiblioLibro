{if $array2}
<table class="table table-responsive">
	<tbody>					
	{foreach $array2 as $prestito}
	<tr>
		<td>ID PRESTITO:</td>
		<td>ID LIBRO:</td>
		<td>DATA SCADENZA:</td>
	<tr>
		<td>{$prestito->getId()}</td>
		<td><a href="/BiblioLibro/libro/mostra/{$prestito->getLibroPrestito()}">{$prestito->getLibroPrestito()}</a></td>
		<td>{$prestito->getDataScadenza()}</td>
	</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Nessun prestito</p>
{/if}