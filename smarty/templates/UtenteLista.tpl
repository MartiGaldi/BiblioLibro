{if $array}
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $utente}
		<tr>
		<td>NICKNAME</td>
		<tr>
		<td><a href="/BiblioLibro/utente/mostra/{$utente->getId()}">{$utente->getNick()}</a></td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Non sono presenti utenti che corrispondo a questo NickName</p>
{/if}