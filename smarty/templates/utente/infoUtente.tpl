{profilo->getInfoUtente assign='pInfo'}

<div class="well">
<p id="important">{pNick}</p>
</div>
<div class="well">
{if $pTipo eq 'cliente' or 'bibliotecario'}
	<p id="important"> Nome: </p> <span>{if $pInfo->getNome()} {$pInfo->getNome()}{/if}</span>
	<p id="important"> Cognome: </p> <span> {if $pInfo->getCognome()} {$pInfo->getCognome()}{/if} </span>
	<p id="important"> Codice Fiscale: </p> <span>{if $pInfo->getCodFisc()} {$pInfo->getCodFisc(true)}{/if}</span>
	<p id="important"> Telefono: </p> <span> {if $pInfo->getTelefono()} {$pInfo->getTelefono()}{/if} </span>
	<p id="important"> Sesso: </p> <span> {if $pInfo->getSesso()} {$pInfo->getSesso()}{/if} </span>
	<p id="important"> Data di Nascita: </p> <span> {if $pInfo->getDtNasc()} {$pInfo->getDtNasc()}{/if} </span>
	<p id="important"> Luogo di Nascita: </p> <span> {if $pInfo->getLuogoNascita()} {$pInfo->getLuogoNascita()}{/if} </span>
	{/if}
</div>

{if $uNick == $pNick}
<div class="well">
	<p> <a href="/BiblioLibro/infoUtente/modificaInfo">Modifica profilo </a> </p>
</div>
{/if}