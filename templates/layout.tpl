<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{block name=title}{/block} | Photo Vote</title>
	<link rel="shortcut icon" href="{$base_url}/assets/images/favicon.ico" type="application/x-icon" />
	<link rel="stylesheet" href="{$base_url}/assets/css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="{$base_url}/assets/css/grid.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="{$base_url}/assets/css/photovote.css" type="text/css" media="screen" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.js"> </script>
	<script type="text/javascript" src="{$base_url}/assets/js/jquery.validate.js"> </script>
	<script type="text/javascript" src="{$base_url}/assets/js/photovote.js"> </script>
	{block name=head}{/block}
	{if $analytics_code ne ''}{include 'analytics.tpl'}{/if}
</head>
<body>

<div id="page">

<div id="container" class="container_24">

	<div id="header" class="alpha grid_24 omega">
		<h1><a href="{$base_url}">Photo Vote</a></h1>
		<ul>
			<li><a href="{$base_url}">Vote for Your Favorite</a></li>
			<li><a href="{$base_url}/submit.php">Submit Your Photo</a></li>
			<li><a href="{$base_url}/leaders.php">Top 10</a></li>
			{if $twitterAuthenticated eq true}
			<li><a href="{$base_url}/?logout">Logout</a></li>
			{else}
			<li><a href="{$base_url}/oauth.php">Sign-in with Twitter</a></li>
			{/if}
		</ul>
	</div>

	<hr />

	<div id="body" class="alpha prefix_1 grid_15">
	{block name=body}{/block}
	</div>

	<div id="sidebar" class="prefix_1 grid_6 suffix_1 omega">
	{block name=sidebar}{/block}
	</div>

	<hr />

	<div id="footer" class="alpha grid_24 omega">
		<p>Copyright &copy;{$smarty.now|date_format: '%Y'}{if isset($smarty.session.is_admin) && $smarty.session.is_admin eq 1} <a href="{$base_url}/admin">Site Admin</a>{/if}</p>

	{block name=foot}{/block}
	</div>

	<div class="clear">&nbsp;</div>

</div>

</div>

</body>
</html>
