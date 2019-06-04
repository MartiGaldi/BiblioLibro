{profilo->getUtenteInfo assign='pInfo'}
<div class="container text-center">
<div>
    <p> CODICE TESSERA: <br> {if $pInfo->getId()} {$pInfo->getId()}{/if}</p>
	<br>
	<p> NICKNAME: <br> {if $pInfo->getNick()} {$pInfo->getNick()}{/if}</p>
	<br>
	<p> NOME: <br> {if $pInfo->getNome()} {$pInfo->getNome()}{/if}</p>
	<br>
	<p> COGNOME: <br> {if $pInfo->getCognome()} {$pInfo->getCognome()}{/if}</p>
	<br>
	<p> MAIL: <br> {if $pInfo->getMail()} {$pInfo->getMail()}{/if}</p>
	<br>
	<p> DATA NASCITA: <br> {if $pInfo->getDtNasc()} {$pInfo->getDtNasc()}{/if}</p>
	<br>
	<p> LUOGO NASCITA: <br> {if $pInfo->getLgNasc()} {$pInfo->getLgNasc()}{/if}</p>
	<br>
	<p> VIA RESIDENZA: <br> {if $pInfo->getVia()} {$pInfo->getVia()}{/if}</p>
	<br>
	<p> CITTA': <br> {if $pInfo->getCitta()} {$pInfo->getCitta()}{/if}</p>
	<br>
	<p> CAP: <br> {if $pInfo->getCap()} {$pInfo->getCap()}{/if}</p>
</div>
</div>
