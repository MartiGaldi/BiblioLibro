{if $array}
<!-- Tabella che mostra i libri -->
<table class="table table-responsive">
	<tbody>					
	{foreach $array as $libro}
		<tr>
			<td><a href="/BiblioLibro/libro/libro{$libro->getId()}">{$libro->getTitolo()}</a></td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<p>Non sono presenti libri nel catalogo</p>
{/if}