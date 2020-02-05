<!--Добавяне на новина-->



<form method="post" enctype="multipart/form-data">
<table  class="tablesorter"> 
	
	<thead>
	 <tr>
		<th> Добави новина </th>
	  </tr>
	</thead>
	<tr>	
	<tr class="table_nechetni">
	  <td>Заглавие</td>
	</tr>
	<tr>
	  <td><input class="imput_text" name="title" type="text" value="{$smarty.post.title}" /> <input class="button" name="add" type="submit" value="Добави новината" /></td>
	</tr>
	
	
</table>
</form>