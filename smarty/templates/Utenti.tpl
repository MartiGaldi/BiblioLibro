{if $array}
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $utente}
		<tr>
			<td><a href="/BiblioLibro/utente/profilo/{$utente->getId()}">{$utente->getNick()}</a></td>
			{if isset($value)}
			<td>{$utente->getPrestito()->getIsbn()}</td>
			{/if}
			<td>{substr(get_class($utente),2)}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>There is no user in this list!</p>
{/if}