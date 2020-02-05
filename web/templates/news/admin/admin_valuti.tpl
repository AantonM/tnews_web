<!--Валути-->



<form method="POST" enctype="multipart/form-data">

	<table  class="tablesorter"> 

	

	<thead>

	 <tr> 
        <th>ID</th>  
        <th>Валута</th>
		<th>Код</th>
	    <th>Стойност</th>
        <th>Изображение</th>

	  </tr>

	</thead>

    {foreach from=$valuti item=v}
       <tr>
           <td>{$v.id}</td> 
           <td>{$v.name}</td>
           <td>{$v.code}</td>
           <td><input type="text" name="{$v.code}" value="{$v.rate}"/></td>
           <td><img src="{$WEBPATH}img/{$v.code}.png"/></td>
       </tr>   
    {/foreach}
	<tr><td align="center" colspan="5"><input style="float:left;" class="button" type="submit" name="edit" value="Редактирай" /></td></tr>
	</table>

</form>