<h1>Редактирай Потребител</h1>
<form method="POST">
<table class="table">
   <tr>
      <td valign="top">Потребителско Име</td>
      <td><input style="width:200px" type="text" value="{$arr.username|escape}" name="username"></td>
   </tr>
   <tr>
      <td valign="top">Парола</td>
      <td><input style="width:200px" type="text" name="password"></td>
   </tr>
   <tr>
      <td valign="top">Име</td>
      <td><input style="width:200px" type="text" value="{$arr.name|escape}" name="name"></td>
   </tr>
   <tr>
      <td valign="top">Описание</td>
      <td><textarea style="width:400px; height:100px;" name="description">{$arr.description|escape}</textarea></td>
   </tr>
   <tr>
      <td valign="top">И-мейл</td>
      <td><input style="width:200px" type="text" value="{$arr.email|escape}" name="email"></td>
   </tr>

   <tr valign="top">
      <td></td>
      <td><input type="submit" name="edit" value="Редактирай" class="button"></td>
   </tr>
</table>
</form>