<!--Добавяне на категория-->

<script type="text/javascript">
{literal}
function initSubCategories(ftopic, selected, id) { 
    subCategories_dropdown(ftopic, selected, id); 
}

function edit_cat(id){
     val = document.getElementById('name_'+id).value;
     valne = document.getElementById('name_en'+id).value;
     EditCat(val, id, valne);
}

{/literal}
</script>


<form method="POST" enctype="multipart/form-data" action="/admin/category/add">
    <table  class="tablesorter"> 
    
    <thead>
     <tr>
        <th align="center"> Име </th>
      </tr>
    </thead>
    <tr>    
     <td align="center"><input type="text" name="name" />    </td>
    </tr>
    <tr><td align="center" colspan="5"><input class="button" type="submit" name="sub" value="Добави" /></td></tr>
    </table>
</form>



<table  class="tablesorter">
{foreach from=$categories item=v key=k name=t}
{if $smarty.foreach.t.first}
<thead>
<tr>
        <th>ID</th>
        <th>Име </th>
        <th>Изтрий категорията </th>
        <th>Покажи в главното меню </th>
        <th>Редактирай категорията </th>
</tr>
</thead>
{/if}
<form method="POST" >
<tbody> 
    <form method="POST" >
    
        <tr {if ($smarty.foreach.t.index % 2) NEQ 0}  class="table_nechetni" {/if} >
        <td>{$v.id}<input type="hidden" name="hiden_id" value="{$v.id}" /></td>
        <td><input type="text" name="name" value="{$v.name}" id="name_{$v.id}" /></td>
        <td><a href="/admin/category/delete/{$v.id}" onclick="return confirm('Сигурни ли сте, че искате да изтриете категорията {$v.name}?')"><img title="Изтрий категорията" src="/img/del.gif" /></a></td>
        <td>{if $v.top EQ 1}<img onclick="CatShow({$v.id}, this)" title="Скрий от главното меню" src="/img/yes.png" />{else}<img onclick="CatShow({$v.id}, this)" title="Покажи в главното меню" src="/img/no.png" />{/if}</td>
        <td><input type="submit" name="edit_cat" class="edit_button" title="Редактирай категорията" value="&nbsp;"  /></td>
        </tr>
        
    </form>
    {foreachelse}
    <tr><td>Няма категории</td></tr>
{/foreach}
</tbody> 
</table>

 