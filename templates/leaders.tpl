{extends file="layout.tpl"}
{block name=title}Top 10{/block}
{block name=sidebar}
{/block}
{block name=body}

<h2>Top 10</h2>

<table>
	<thead>
		<tr>
			<th>Place</th>
			<th>Photo</th>
			<th>Credit</th>
			<th>Points</th>
		</tr>
	</thead>
	<tbody>
		{foreach $top10 as $k => $row}
		<tr>
			<td>{$k+1}</td>
			<td><a href="{$base_url}/?photo_id={$row.id}"><img src="{$base_url}/{$row.img_src}" alt="{$row.caption|escape}" width="150" /></a></td>
			<td>{$row.credit}</td>
			<td>{$row.total}</td>
		</tr>
		{/foreach}
	</tbody>
</table>


<h2>Bottom 10</h2>

<table>
	<thead>
		<tr>
			<th>Place</th>
			<th>Photo</th>
			<th>Credit</th>
			<th>Points</th>
		</tr>
	</thead>
	<tbody>
		{foreach $bottom10 as $k => $row}
		<tr>
			<td>{$k+1}</td>
			<td><a href="{$base_url}/?photo_id={$row.id}"><img src="{$base_url}/{$row.img_src}" alt="{$row.caption|escape}" width="150" /></a></td>
			<td>{$row.credit}</td>
			<td>{$row.total}</td>
		</tr>
		{/foreach}
	</tbody>
</table>


{/block}