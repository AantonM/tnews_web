<?
class layoutController extends Controllers {
    var $models = Array ();
    
    function index(){
        $sub_cat = 5;
        $this->assign('sub_catDSS', $sub_cat);

    }
    
}
?>