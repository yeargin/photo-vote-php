{extends file="admin/layout.tpl"}
{block name=title}Photos{/block}
{block name=sidebar}

	

{/block}
{block name=body}

	<h2>Photos</h2>
	
	<h3>Unapproved Photos</h3>
	<table>
		<thead>
			<tr>
				<th>Place</th>
				<th>Photo</th>
				<th>Credit</th>
				<th>Points</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			{foreach $unapprovedPhotos as $k => $row}
			<tr>
				<td>{$k+1}</td>
				<td><a href="{$base_url}/?photo_id={$row.id}"><img src="{$base_url}/{$row.img_src}" alt="{$row.caption|escape}" width="150" /></a></td>
				<td>{$row.credit}</td>
				<td>{$row.total}</td>
				<td><a href="?photo_id={$row.id}&amp;is_approved=1">Approve</a> | <a href="?photo_id={$row.id}&amp;delete">Delete</a></td>
			</tr>
			{/foreach}
		</tbody>
	</table>

	<h3>Approved Photos</h3>
	<table>
		<thead>
			<tr>
				<th>Place</th>
				<th>Photo</th>
				<th>Credit</th>
				<th>Points</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			{foreach $approvedPhotos as $k => $row}
			<tr>
				<td>{$k+1}</td>
				<td><a href="{$base_url}/?photo_id={$row.id}"><img src="{$base_url}/{$row.img_src}" alt="{$row.caption|escape}" width="150" /></a></td>
				<td>{$row.credit}</td>
				<td>{$row.total}</td>
				<td><a href="?photo_id={$row.id}&amp;is_approved=0">Unapprove</a> | <a href="?photo_id={$row.id}&amp;delete">Delete</a></td>
			</tr>
			{/foreach}
		</tbody>
	</table>


{/block}