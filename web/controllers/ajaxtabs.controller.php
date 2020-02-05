<?
class ajaxtabsController extends Controllers {
var $models  = array('category');
 
function delete_comment($id){
        $id = (int)$id;
        $GLOBALS['db']->EXECUTE("DELETE FROM comments WHERE id='$id'");
        mysql_close();
        exit;
}

function show_cat($id){
        $top = $GLOBALS['db']->GetOne("SELECT top FROM categories WHERE id='$id'");
        if ($top){
            $GLOBALS['db']->EXECUTE("UPDATE categories SET top = '0' WHERE id='$id'");
        } else {
            $GLOBALS['db']->EXECUTE("UPDATE categories SET top = '1' WHERE id='$id'");
        }
        mysql_close();
        exit;
}

function news($pos){
    $this->assign('WEBPATH', WEBPATH);
        $this->assign('NEWS_SEO', NEWS_SEO);
        $pos = (int)$pos;
        $this->assign("novini", $this->ajaxtabs->GetNovini($pos));
        $this->display('ajaxtabs/news.tpl');
        mysql_close();
        exit;
}
    
function get_news($news_id){
    $all_news_titles = $this->ajaxtabs->GetAllNews((int)$news_id);
    foreach ($all_news_titles as $k=>$v){
        $news_list .= $v['title']."<->";
    }
    print $news_list;
    mysql_close();
    exit;
}



function get_search_news(){
    $all_news_titles = $this->ajaxtabs->GetSearchNews();
    foreach ($all_news_titles as $k=>$v){
        $news_list .= $v['tag']."<->";
    }
    print $news_list;
    mysql_close();
    exit;
}

}
?>