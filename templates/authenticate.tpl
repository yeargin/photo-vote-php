{extends file="layout.tpl"}
{block name=title}Twitter - Authenticate{/block}
{block name=sidebar}{/block}
{block name=body}

<div class="welcome-text">
</div>
	
{if $twitterAuthenticated ne true}
<p>
	<a href="{$authorizeUrl}" class="button">Authenticate with Twitter</a>
</p>
{else}
<p>
	You are already authenticated with Twitter. <a href="?logout">Logout</a>?
</p>
{/if}

{/block}
