{extends file="layout.tpl"}
{block name=title}Submit Your Photo{/block}
{block name=sidebar}
{/block}
{block name=body}

<h2>Submit Your Photo</h2>

{if isset($photoUploaded) && $photoUploaded eq true}
<p>
	Your photo was uploaded!
</p>
{p}

{if $twitterAuthenticated eq true}
<form method="post" enctype="multipart/form-data">
	<fieldset>
	<legend>Photo</label>
	<p>
		<label for="photo">Upload</label>
		<input type="file" name="photo" value="" id="photo">
	</p>
	<p>
		<label for="caption">Caption</label>
		<input type="text" name="caption" value="" id="caption" />
	</p>
	</fieldset>
	<p>
		<strong>Terms:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
	<p>
		<label for="id"><input type="checkbox" name="agree" id="agree" value="1" checked="checked" />I have read and agree to these terms.</label>
	<p>
		<input type="submit" value="Send">
	</p>
</form>
{else}
<p>
	You must be signed in to Twitter to submit a photo!
</p>
{/if}

{/block}