{extends file="admin/layout.tpl"}
{block name=title}Users{/block}
{block name=sidebar}

{/block}
{block name=body}

	<h2>Users</h2>
	
	<h3>Admin Users</h3>
	<table>
		<thead>
			<tr>
				<th>Screen Name</th>
				<th>Joined</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			{foreach $adminUsers as $k => $row}
			<tr>
				<td>{$row.twitter_screenname}</td>
				<td>{$row.insert_ts|date_format}</td>
				<td><a href="?user_id={$row.id}&amp;is_admin=0">Demote</a> | <a href="?user_id={$row.id}&amp;delete">Delete</a></td>
			</tr>
			{/foreach}
		</tbody>
	</table>

	<h3>General Users</h3>
	<table>
		<thead>
			<tr>
				<th>Screen Name</th>
				<th>Joined</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			{foreach $generalUsers as $k => $row}
			<tr>
				<td>{$row.twitter_screenname}</td>
				<td>{$row.insert_ts|date_format}</td>
				<td><a href="?user_id={$row.id}&amp;is_admin=1">Promote</a> | <a href="?user_id={$row.id}&amp;delete">Delete</a></td>
			</tr>
			{/foreach}
		</tbody>
	</table>


{/block}