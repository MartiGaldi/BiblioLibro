{if $array}
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $libro}
		<tr>
			{if isset($value)}
			{if (value == Titolo)}
			<td>{$libro->getGenere()}</td>
			<td>{$libro->getDescrzione()}</td>
			<td>{$libro->getDurata()}</td>
			{/if}
			{/if}
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Il testo ricercato non e' presente nel catalogo.</p>
{/if}