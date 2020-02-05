<!--Самия коментар-->

<form method="post" enctype="multipart/form-data">
<table  class="tablesorter"> 
	
	<thead>
	 <tr>
		<th> Коментар </th>
	  </tr>
	</thead>
	<tr>	
	<tr class="table_nechetni">
	  <td>От: {$arr.from|escape}</td>
	</tr>
	
	<tr class="table_nechetni">
	  <td>Дата: {$arr.date|escape}</td>
	</tr>
	
	<tr class="table_nechetni">
	  <td>Текст на коментара</td>
	</tr>
	<tr>
	  <td>{$arr.text|escape}
	  </td>
	</tr>
</table>
</form>