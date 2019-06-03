{profilo->getNick assign='pNick'}
{profilo->getNome assign='pInfo'}
{profilo->getCognome assign='pInfo2'}

<div>
	<p> Nick: </p> <span>{if $pNick->getNick()} {$pNick->getNick()}{/if}</span>
	<p> Nome: </p> <span>{if $pInfo->getNome()} {$pInfo->getNome()}{/if}</span>
	<p> Cognome: </p> <span>{if $pInfo2->getCognome()} {$pInfo2->getCognome()}{/if}</span>
</div>
