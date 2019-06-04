{if $array}
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $utente}
		<tr>
		<td>NOME</td>
		<td>COGNOME</td>
		<td>NICKNAME</td>
		<td>MAIL</td>
		<tr>
		<td><a href="/BiblioLibro/utente/mostra/{$utente->getId()}">{$utente->getNome()}</a></td>
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