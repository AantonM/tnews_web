<?
class admin_categoryController extends Controllers {


    var $models = Array('category', 'ajaxtabs');
    
    function add() {
        
        if(count($_POST) > 0){

            $LastID = $this->category->addCategories( $_POST );            
            $path = $path_arr['id'].';';
            $path_names = $path_arr['name'].';';
            
        }
        Core::Redirect('/admin/category');
        exit;
    }
    
    
    
    function delete( $id ) {
        
        $this->category->deleteCat($id);
        Core::Redirect('/admin/category/');
        exit;
    }
    
    function index() {
        
        if ( $this->isPostBack ) {
             if ( isset($_POST['delete']) && count($_POST['ids']) > 0 ) {
                 $delete_ids = implode(",", $_POST['ids']);
                 Controllers::deleteIds("categories", $delete_ids);
             }
         }
         if($_POST['edit_cat']){
             $this->edit_cat($_POST['name'], $_POST['hiden_id'], $_POST['name_en']);
         }
        
 
        $categories = $this->category->getCategoriesAdmin();

         
        $this->assign('categories', $categories);
        
        
        $path_arr = $this->category->getCategoriesInfo();
        $path_ids = explode(";", $path_arr['path']);
        $path[0] =  array('path' => 'Категории', 'href' => '/admin/category/index/');
        $i=0;
        foreach ($path_ids AS $val){
            if ($val){
              $i++;
              $cat_name = $GLOBALS['db']->GetOne("SELECT name FROM categories WHERE id = '$val'");
              $href = "/admin/category/index/".$val;
              $path[$i] = array('path' => $cat_name, 'href' => $href);
            }
        }
    
                       
 
        $this->assign('path', $path);
        
    }
    
    function edit_cat($name, $cat_id, $name_en=''){
        if (Core::isWriter()) Core::Redirect("/admin");
        
          $this->ajaxtabs->UpdateCat($name, $cat_id);
          
          $path_arr = $this->category->GetCategory( $cat_id );
            
            $path = $path_arr['id'].';';
            $path_names = $path_arr['name'].';';
    }
}
?>