<?
class admin_newsController extends Controllers {
 var $models = Array('news', 'category');
 
 
 function add(){
	if ($_POST['add']){	
		if (!$_POST['title']){
			$error .= "Не сте въвели заглавие на новината<br />";
		}
	    if (!$error){  
	    	$id = $this->news->AddNews($_POST);

			Core::message("Новината е въведена", MSG_SUCCESS);
			Core::redirect("/admin/news/edit/".$id);
		}
		
	}
 }
 
 function edit($id){
       
    $parent_categories = $this->category->getParentCategories();
    $this->assign('parent_categories', $parent_categories);
    
    $news_info = $this->news->GetNewsByID((int)$id);

    
    if ($_POST['edit']){    

        if (!$_POST['title']){
            $error .= "Не сте въвели заглавие на новината<br />";
        }

        if (!$_POST['content']){
            $error .= "Не сте въвели текст на новината<br />";
        }

        if (!$error){ 
            if($_FILES['picture'] == null){
                $file = $news_info['image_news'];    
            }else{
                $file = $_FILES['picture']; 
            }
            
            //$file = $_FILES['picture']; 
            $this->news->EditNews($_POST, (int)$id, $file); 
            }

            Core::message($error."Новината е редактирана", MSG_SUCCESS);

    }
    $date = explode(' ', $news_info['publish_date']);
    $date_event = explode(' ', $news_info['event_date']);
    $news_info['publish_date'] = $date[0];

      
    $add_to_reg = $GLOBALS['db']->GetOne("SELECT COUNT(id) FROM news WHERE news_id = '{$id}'");
    $this->assign('to_reg', $add_to_reg);
    $this->assign('arr', $news_info);
 }

 
 function list_news($active){
 	if ($active == 1 && Core::isWriter()) Core::Redirect("/admin");
 	
 	if (isset($_POST['search'])){
 		$_SESSION['news_search_string'] = $_POST['search_news'];
 	}
 	
 	$path[0] =  array('path' => 'Новини', 'href' => '#');
 	if ($active == '1'){
 	    $path[1] =  array('path' => 'Активни новини', 'href' => '#');
 	} else {
 		$path[1] =  array('path' => 'Не активни новини', 'href' => '#');
 	}
	$this->assign('path', $path);
 	$this->assign('arr', $this->news->GetNews((int)$active, $_SESSION['news_search_string']));
 	$this->assign('pages', $this->news->pages);
 }
 
 
 function gallery(){
       if (!$_POST['title']){
            $error .= "Не сте въвели името на снимката<br />";
        }

        if (!$_POST['name']){
            $error .= "Не сте въвели име на фотографа<br />";
        }
        
        if($_FILES['picture'] == null){
            $file = $gallery['src'];    
        }else{
            $file = $_FILES['picture']; 
        }
        
        if(!$error){
           //var_dump($file);
       $this->news->UploadPicGallery($_POST, $file);  
        }
      
 }

function about_us(){
        
    if($_POST[bigTxt] != null){
        $this->news->setAboutUstxt($_POST[bigTxt]);
    }
    
    if($_POST[picDiscriber]!= null){
        $this->news->setPicDiscriber($_POST[picDiscriber], $_FILES[picture]);
    } 
    
    $all_info = $this->news->AdminGetAllAU();
    $this->assign('all_info', $all_info); 
    
} 
 
function setShowOnSite($id = 0, $field = '') {
		$show = $this->news->getShow((int)$id, $field);
		if ( $show == 0 )
		{
			$this->news->setShow((int)$id, 1, $field);
		}
		else  {
			$this->news->setShow((int)$id, 0, $field);
		}
}


 function delete($id){

     if (!$this->news->MyNews($id)) Core::Redirect("/admin");
    $this->news->DelNewsFiles((int)$id);
    $this->news->DelNews((int)$id);
    Core::Redirect($_SERVER['HTTP_REFERER']);

 }


function valuti(){
	if (Core::isWriter()) Core::Redirect("/admin");
	
	$path[0] =  array('path' => 'Новини', 'href' => '#');
    $path[1] =  array('path' => 'Редактирай валурите', 'href' => '/admin/news/valuti/');
    
	$valuti = $this->news->GetValuti();
    
    $this->assign("valuti",$valuti);

    if($_POST['edit']){
		$this->news->EditValuti($_POST);
		Core::message("Валутите са редактирани", MSG_SUCCESS);
	}
    
}
 


 function top(){
 	if (Core::isWriter()) Core::Redirect("/admin");
 	
 	$path[0] =  array('path' => 'Новини', 'href' => '#');
    $path[1] =  array('path' => 'Топ новини', 'href' => '#');
 
	$this->assign('path', $path);
 	$this->assign('arr', $this->news->GetNewsTop((int)$active));
 	$this->assign('pages', $this->news->pages);
 }


 function add_cats($arr, $level){
 	$level += 1;
 	foreach ($arr as $k=>$v){
 		if ($_POST['category'] == $v['id']) $selected = "selected";
 		else $selected = "";
 		$margin = $level * 10;
 		$select .= "<option style='margin-left: ".$margin."px' value='".$v['id']."' ".$selected.">".$v['name']."</option>";
 		
 		if ($v['cats']){
 			$select .= $this->add_cats($v['cats'], $level);
 		}
 	}
 	
 	return $select;
 }

 
}?>