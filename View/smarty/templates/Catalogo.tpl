{if $array}
<!-- Tabella che mostra i libri -->
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $libro}
		<tr>
			<td><a href="/BiblioLibro/catalogo/{$libro->getAutore()}">{$song->getTitolo()}{$song->getNumCopie()}</a></td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Non sono presenti libri nel catalogo</p>
{/if}