{if $array}
<table class="table">
	<tbody>	
		<tr>
		<td>NOME</td>
		<td>COGNOME</td>
		<td>NICKNAME</td>
		<td>MAIL</td>	
	{foreach $array as $utente}
		<tr>
		<td><a href="/BiblioLibro/utente/profilo/{$utente->getId()}">{$utente->getNome()}</a></td>
		<td>{$utente->getCognome()}</td>
		<td>{$utente->getNick()}</td>
		<td>{$utente->getMail()}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Non sono presenti utenti che corrispondo a questo Nome</p>
{/if}