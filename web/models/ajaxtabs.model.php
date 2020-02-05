<?
class ajaxtabsModel extends Models {
    
    
//edit categories name    
function UpdateCat($name, $cat_id){
      $this->db->EXECUTE("UPDATE categories SET name = '$name' WHERE id = '$cat_id'");    
}
}?>