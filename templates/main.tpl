{extends file="layout.tpl"}
{block name=title}Home{/block}
{block name=sidebar}

{if $photo ne ''}
<form method="post" action="{$base_url}/vote.php">
	<fieldset>
		<legend>Vote</legend>
		<p>
			<label for="score_plus2"><input type="radio" name="vote" value="2" id="score_plus2" /> Score: +2</label><br />
			<label for="score_plus1"><input type="radio" name="vote" value="1" id="score_plus1" /> Score: +1</label><br />
			<label for="score_0"><input type="radio" name="vote" value="0" id="score_0" checked="checked" /> Score: 0</label><br />
			<label for="score_neg1"><input type="radio" name="vote" value="-1" id="score_neg1" /> Score: -1</label><br />
			<label for="score_neg2"><input type="radio" name="vote" value="-2" id="score_neg2" /> Score: -2</label>
		</p>
		<p>
			<input type="hidden" name="photo_id" value="{$photo.id}" />
			<input type="submit" value="Vote">
		</p>
	</fieldset>
</form>
{/if}

{/block}
{block name=body}

{if $photo ne ''}
<img src="{$base_url}{$photo.img_src}" alt="{$photo.caption}" />
<p>{$photo.caption}</p>
<p>By <a href="http://twitter.com/{$photo.credit}">{$photo.credit}</a></p>
{else}
<p>
	Looks like there aren't any photos approved yet ...
</p>
{/if}

{/block}