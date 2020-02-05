<?
class mainController extends Controllers {
    var $models = Array (); // display other models if you want i se bugva Core.class.php bez nego
	function main($par1 = 'a', $par2='2') {
        print $par1;
        print $par2;
 
	}
	
	function index() {

        
        $this->assign('sub_cat', $sub_cat);
        $this->assign("active_main_index", 1);
        $this->assign("main_news", $this->main->GetMainNews());

        $get_cat = $this->main->GetCat();
        $this->assign("small_cat",$get_cat);
         
       $cat_with_news = $this->main->getMainNewsIndexNew();

        
        $this->assign('cat_news', $cat_with_news);  
               
        
	}

	function admin_index() {
	       
	}    
	
    function not_found(){
		header("HTTP/1.1 404 Not Found");	
	}
}
?>