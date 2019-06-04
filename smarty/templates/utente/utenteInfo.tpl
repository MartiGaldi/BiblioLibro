{profilo->getUtenteInfo assign='pInfo'}

<div class="row">
   <div class="card text-black p-10 bg-secondary">
	<div class="card-body">
	<div class="container text">
	<h4> INFORMAZIONI BASE: </h4>
    <p> CODICE TESSERA:  {if $pInfo->getId()} {$pInfo->getId()}{/if}</p>
	<p> NICKNAME:  {if $pInfo->getNick()} {$pInfo->getNick()}{/if}</p>
	<p> MAIL: {if $pInfo->getMail()}{$pInfo->getMail()}{/if}</p>
	</div>
	</div>
	</div>
	</div>
	<br>
	<div class="row">
	<div class="card text-black p-10 bg-secondary">
	<div class="card-body">
	<div class="container text">
	<h4> ALTRE INFORMAZIONI: </h4>
	<p> NOME:  {if $pInfo->getNome()} {$pInfo->getNome()}{/if}</p>
	<p> COGNOME:  {if $pInfo->getCognome()} {$pInfo->getCognome()}{/if}</p>
	<p> DATA DI NASCITA:  {if $pInfo->getDtNasc()} {$pInfo->getDtNasc()}{/if}</p>
	<p> LUOGO DI NASCITA:  {if $pInfo->getLgNasc()} {$pInfo->getLgNasc()}{/if}</p>
	<p> VIA:  {if $pInfo->getVia()} {$pInfo->getVia()}{/if}</p>
	<p> CITTA':  {if $pInfo->getCitta()} {$pInfo->getCitta()}{/if}</p>
	<p> CAP:  {if $pInfo->getCap()} {$pInfo->getCap()}{/if}</p>
	</div>
	</div>
	</div>
</div>