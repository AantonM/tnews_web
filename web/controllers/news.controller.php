<?
class newsController extends Controllers {
	var $models = Array (); // display other models if you want

function index($cat_id=0,$sort=1){
	$cat_id = (int)$cat_id;       
	$this->assign('sort', $sort);
    
    $get_title = $this->news->GetTitleCat($cat_id);
    $get_title = (array)$get_title;  
    $this->assign('title', $get_title);
    	
    $get_news = $this->news->GetNewsCat($cat_id);
    $this->assign('all_news_CAT', $get_news);
     

        
    $this->assign('pages', $this->news->pages);   
}


function read($id){

        //cheking for commend error
    $this->ShowEX = true;  
    
    
      
    if($_POST['add_comment']){
        if(!$_POST['from']){
            $error = "Не сте въвели име!<br />";
        }
        if(!$_POST['text']){
            $error .= "Не сте въвели текст на коментара!<br />";
        }
        if(!$_POST['mail']){
            $error .= "Не сте въвели E-mail!<br />";
        }
        if (!$_POST['captcha']){
            $error .= "Не сте въвели валидация!<br />";
        }
                        
        if ($error){
            core::Message($error, MSG_ERROR);
        } else {
            if ($_POST['captcha']){
            $this->news->AddComment((int)$id, $_POST);
            }
            core::Message("Коментара е въведен!", MSG_SUCCESS);
            unset($_POST);
        }
    }
    
    
     //read everythig from database
    $news = $this->news->ReadNews((int)$id);


    $this->assign('arr', $news);       //news info
    $this->assign('comments', $this->news->GetComments((int)$id));       //get comments
      
    // facebook comments    
    $url = "http" . (($_SERVER['SERVER_PORT']==443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $num = intval(substr($url, strrpos($url, '/') + 1));
    //var_dump($num);
    $this->assign('urlID',$num); 
       
                     
}
 
function find(){

        $word = $_POST['word'];
		$word = mysql_escape_string($word);
		$this->assign('news', $this->news->NewsSearch($word));
		$this->assign('pages', $this->news->pages);


}

function about_us(){
	 $sub_cat = $this->news->GetSubCat((int)$parent_cat);
     $this->assign('sub_cat', $sub_cat);
}
}?>