<!--Активни/Неактивни новини-->

<table  class="tablesorter">
<form method="POST" >
	<thead>
		<tr>
				<th style="width: 400px;"><input class="imput_text" type="text" name="search_news" value="{$smarty.session.news_search_string}" /></th>
				<th><input class="button" name="search" type="submit" value="Търси" /></th>
				
		</tr>
	</thead>
</form>	
</table>

<table  class="tablesorter">
{foreach from=$arr item=v key=k name=t}
{if $smarty.foreach.t.first}
<thead>
<tr>
		<th>ID</th>
		<th>Име </th>
		<th>Категория </th>
		<th>Дата </th>
		<th>Топ новина </th>
		<th>Изтрий новината </th>
		<th>Редактирай новината </th>
</tr>
</thead>
{/if}
<form method="POST" >
<tbody> 
	<form method="POST" >
	
		<tr {if ($smarty.foreach.t.index % 2) NEQ 0}  class="table_nechetni" {/if} >
		<td>{$v.id}<input type="hidden" name="hiden_id" value="{$v.id}" /></td>
		<td>{$v.title}</td>
	 	<td>{$v.cat_name}</td>
	    <td>{$v.publish_date|date_format:'%d.%m.%Y'}</td>
		<td><input type="checkbox" {if $v.top}checked="1"{/if} value="1" onclick="touch_ajax('/admin/news/setShowOnSite/{$v.id}/top')" /></td>
		<td><a href="/admin/news/delete/{$v.id}" onclick="return confirm('Сигурни ли сте, че искате да изтриете nновината {$v.title}?')"><img title="Изтрий новината" src="/img/del.gif" /></a></td>
		<td><a href="/admin/news/edit/{$v.id}" ><img title="Редактирай новината" src="/img/edit.gif" /></a></td>
		</tr>
		
	</form>
	{foreachelse}
	<tr><td>Няма категории</td></tr>
{/foreach}
</tbody> 
</table>
<div class="pages">{$pages}</div>

 