
<form method="post" enctype="multipart/form-data">
<table  class="tablesorter"> 
    
    <thead>
     <tr>
        <th> Добавете снимки в галерията </th>
      </tr>
    </thead>
    <tr>    
    <tr class="table_nechetni">
      <td>Заглавие на снимката</td>
    </tr>
    <tr>
      <td><input class="imput_text" name="title" type="text" value="{$arr.title|escape}" /></td>
    </tr>
    <tr class="table_nechetni">
      <td>Име на фотографа</td>
    </tr>
        <tr>
      <td><input class="imput_text" name="name" type="text" value="{$arr.title|escape}" /></td>
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
        <tr>
        <td align="center" colspan="2"><input style="float:left;" class="button" type="submit" name="edit" value="Качи" /></td>
        </tr>
 
</table>
</form>

