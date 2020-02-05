<!--Коментари-->

<table  class="tablesorter">
{foreach from=$comments item=v key=k name=t}
{if $smarty.foreach.t.first}
<thead>
<tr>
		<th>ID</th>
		<th>От </th>
		<th>Съдържание </th>
		<th>Дата </th>
		<th>Към новина </th>
		<th>Изтрий</th>
		
		<!--onClick с в контролера-->
</tr>
</thead>
{/if}
<form method="POST" >
<tbody> 
	<form method="POST" >
	
		<tr {if ($smarty.foreach.t.index % 2) NEQ 0}  class="table_nechetni" {/if}  id="hide_{$v.id}" >
		<td>{$v.id}<input type="hidden" name="hiden_id" value="{$v.id}" /></td>
		<td>{$v.from}</td>
	 	<td><a href="/admin/comments/index/{$v.id}">{$v.text|truncate:100}</td>
	    <td>{$v.date}</td>
	    <td><a target="_blanck" href="/news/read/{$v.object_id}">{$v.title}</a></td>
		<td><img onclick="deleteComment({$v.id})" title="Изтрий коментара" src="/img/del.gif"></td>
		</tr>
		
	</form>
	{foreachelse}
	<tr><td>Няма коментари</td></tr>
{/foreach}
</tbody> 
</table>
<div class="pages">{$pages}</div>
