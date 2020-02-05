<!--Редактиране на страницата"За нас"-->

<form method="post" enctype="multipart/form-data">
<table  class="tablesorter"> 
    
    <thead>
     <tr>
        <th> Редактирай страницата </th>
      </tr>
    </thead>
    <tr class="table_nechetni">
      <td>Същинска част</td>
    </tr>
    <tr>
      <td>    
            {fckeditor BasePath="/fckeditor/" InstanceName="bigTxt" Width="640px" Height="400px" Value=$arr.bigTxt|stripslashes}
      </td>
          <tr>
      <td><input class="buttonEditBig" name="edit" type="submit" value="Запис" /><input style="margin-left: 10px;" class="buttonEditBig"  name="edit" type="BUTTON" value="Отказ" /></td>
    </tr>
    </tr>
    <tr class="table_nechetni">
      <td>Описание до снимката</td>
    </tr>
    <tr>
      <td>
            {fckeditor BasePath="/fckeditor/" InstanceName="picDiscriber" Width="640px" Height="400px" Value=$arr.picDiscriber|stripslashes}
      </td>
    </tr>

    <tr class="table_nechetni">
      <td>Добавяне на снимка </td>
    </tr>
    <tr>
      <td>
       <table width="100%">
         <tr>
           <td>Галерия {$arr.image_news} <br /> (За да смените снимката изберете нова)</td>
           <td>
             <input type="file" accept="image/jpeg, image/png" name="picture" id="image" size="350000"> 
           </td>
         </tr>    
       </table>
      </td>

    <tr>
      <td><input class="buttonNew" name="edit" type="submit" value="Запис" /><input style="margin-left: 10px;" class="buttonNew" name="edit" type="BUTTON" value="Отказ" /></td>
    </tr>
</table>
</form>

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
