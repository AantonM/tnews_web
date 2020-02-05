<?
class categoryModel extends Models {
    
function addCategories($arr){
  $this->insert('categories', $arr); 
      return $id;
}

function GetCategory($id = 0){
    return $this->db->getRow("SELECT `id`,`name` , 
                    FROM `categories`              
                    WHERE `id` = '$id'  ");
}

function getParentCategories() {            
        return $this->db->getAll("SELECT `id`,`name` FROM `categories`  ORDER BY `name`  ");        
}

function SetPath($id , $path , $path_names){    
    $this->db->Execute("UPDATE categories SET path = '{$path}' , path_names = '{$path_names}' WHERE id = '{$id}'");
    return $id;
}

function deleteCat($id){
    $this->db->Execute("DELETE FROM categories WHERE id='{$id}'");
}

function getCategoriesAdmin(){
    return $this->db->getAll("SELECT `id`,`name`, `top`
                    FROM `categories` 
                    ");        
}

function getCategoriesInfo(){
    return $this->db->getRow("SELECT `id`,`name`, `path`, `path_names`,
                    FROM `categories`              
                    WHERE `id` = '0'
                    ORDER BY `name`  ");
    
}

}?>