<!--Редактиране на новина с ID-->






<form method="post" enctype="multipart/form-data">
<table  class="tablesorter"> 
	
	<thead>
	 <tr>
		<th> Редактирай новина </th>
	  </tr>
	</thead>
	<tr>	
	<tr class="table_nechetni">
	  <td>Заглавие</td>
	</tr>
	<tr>
	  <td><input class="imput_text" name="title" type="text" value="{$arr.title|escape}" /></td>
	</tr>
	<tr class="table_nechetni">
	  <td>Кратко описание</td>
	</tr>
	<tr>
	  <td>    
			{fckeditor BasePath="/fckeditor/" InstanceName="short_content" Width="640px" Height="400px" Value=$arr.short_content|stripslashes}
	  </td>
	</tr>
	<tr class="table_nechetni">
	  <td>Текст на новината</td>
	</tr>
	<tr>
	  <td>
			{fckeditor BasePath="/fckeditor/" InstanceName="content" Width="640px" Height="400px" Value=$arr.content|stripslashes}
	  </td>
	</tr>
	<tr class="table_nechetni">
	  <td>Категория {$arr.cat_name} (За да смените категорията изберете нова от долното меню)</td>
	</tr>
	<tr>
	  <td>
        <table> 
	      <td> 
	       <select class="select"  name="parent" id="parent_categories" style="width: 152px" onchange="initSubCategories('parent_categories', 0 , '')">
		   <option value="0">-</option>
							{foreach from=$parent_categories item=i key=k}
								<option value="{$i.id}" {if $selected_ftopic EQ $i.id}selected{/if}>{$i.name}</option>
							{/foreach}
		   </select>
		  </td>
		  <td id="topic_"></td></td>
		</table>
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
	</tr>  
	<tr class="table_nechetni">
	  <td>Допълнителни настройки</td>
	</tr>
	<tr>
	  <td>
         <table>
         {if $smarty.session.admin EQ 1}
          <tr>
           <td>Активна</td>
           <td><input name="active" value="1" {if $arr.active EQ 1}checked{/if} type="checkbox" /></td>
          </tr>
          {/if} 
          <tr>
           <td>Дата на публикуване</td>
           <td><input id="publish_date" value="{$arr.publish_date}" name="publish_date" type="text" /></td>
          </tr>
          
          <tr>
           <td>Топ новина</td>
           <td><input onclick="GetPicBig(this);" name="top" value="1" {if $arr.top EQ 1}checked{/if} type="checkbox" /></td>
          </tr>
          <tr>
           <td>Забрани коментарите</td>
           <td><input name="no_comments" value="1" {if $arr.no_comments EQ 1}checked{/if} type="checkbox" /></td>
          </tr>
          

         </table>
      </td>
	</tr>
	<tr>
      <td><input class="button" name="edit" type="submit" value="Запис" /><input style="margin-left: 10px;" class="button" onclick="document.location = '/admin/news/list_news/1/';" name="edit" type="BUTTON" value="Отказ" /></td>
	</tr>
</table>
</form>

{literal}
<script type="text/javascript">

$(document).ready(function() {
	
	NewsList({/literal}{$arr.id}{literal});
	
});


</script>
{/literal}