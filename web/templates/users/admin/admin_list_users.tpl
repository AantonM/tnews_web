<!--Списък с потребители-->

<table  class="tablesorter">
{foreach from=$users item=v key=k name=t}
{if $smarty.foreach.t.first}
<thead>
<tr>
		<th>ID</th>
		<th>Име </th>
		<th>Статус </th>
		<th>Email </th>
		<th>Дата на раждане </th>
		<th>Град </th>
		<th>Изтрий потребителя </th>
		<!--<th>Редактирай потребителя </th>-->
</tr>
</thead>
{/if}
<form method="POST" >
<tbody> 
	<form method="POST" >
	
		<tr {if ($smarty.foreach.t.index % 2) NEQ 0}  class="table_nechetni" {/if} >
		<td>{$v.id}<input type="hidden" name="hiden_id" value="{$v.id}" /></td>
		<td>{$v.username}</td>
	 	<td>{if $v.admin EQ 1}администратор{elseif $v.admin EQ 2}автор{/if}</td>
	    <td>{$v.email}</td>
	    <td>{$v.birthdate}</td>
		<td>{$v.city_name}</td>
		<td><a href="/admin/users/delete/{$v.id}" onclick="return confirm('Сигурни ли сте, че искате да изтриете потребителя {$v.username}?')"><img title="Изтрий потребителя" src="/img/del.gif" /></a></td>
		<!--<td><a href="/admin/users/edit/{$v.id}" ><img title="Редактирай потребител" src="/img/edit.gif" /></a></td>-->
		</tr>
		
	</form>
	{foreachelse}
	<tr><td>Няма потребители</td></tr>
{/foreach}
</tbody> 
</table>
<div class="pages">{$pages}</div>
