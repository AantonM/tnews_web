<?
class newsModel extends Models {
	
function AddNews($arr){
	    $arr['date_entered'] = $this->db->GetOne("SELECT NOW()");
	    $arr['last_edit'] = $this->db->GetOne("SELECT NOW()");
	    $arr['publish_date'] = $this->db->GetOne("SELECT NOW()");
	    $path = $GLOBALS['db']->GetOne("SELECT path FROM categories WHERE id = '{$arr['parent']}'");
	    $arr['cat_name'] = $GLOBALS['db']->GetOne("SELECT name FROM categories WHERE id = '{$arr['parent']}'");
	    $arr['category_path'] = $path;
	    $arr['cat_id'] = $arr['parent'];
	    $this->insert("news", $arr, false, true,true,true );
		$id = $this->insertID();
        return $id;
}


function GetNewsByID($id){
	$arr = $this->db->GetRow("SELECT id, title, short_content, content, image_news, cat_name,
                             publish_date, active, top, no_comments 
	                         FROM news WHERE id = '$id' ORDER BY id DESC
                             "); 
	return $arr;
}

function EditNews($arr,$id,$file){     
	    $arr['last_edit'] = $this->db->GetOne("SELECT NOW()");
	    if ($arr['publish_date'] == "0000-00-00 00:00:00" || $arr['publish_date'] == "0000-00-00") $arr['publish_date'] = $this->db->GetOne("SELECT DATE_FORMAT(NOW(), '%Y-%m-%d')");
	    $arr['publish_date'] = $arr['publish_date'];
         
         //print_r($arr);
         if ($arr['parent'] == 0){
         $arr['parent'] = $arr['parent_old'];
         }
	    if ($arr['parent'] != 0){
	     $path = $GLOBALS['db']->GetOne("SELECT path FROM categories WHERE id = '{$arr['parent']}'");
	     $arr['cat_name'] = $GLOBALS['db']->GetOne("SELECT name FROM categories WHERE id = '{$arr['parent']}'");
	     $arr['category_path'] = $path;
	     $arr['cat_id'] = $arr['parent'];
	    }
	    $arr['user_id'] = $_SESSION['UserID'];
	    if (!$arr['active']){$arr['active'] = '';}
	    if (!$arr['top']){$arr['top'] = '';}
	    if (!$arr['no_comments']){$arr['no_comments'] = '';}

	   	$arr['content'] = stripslashes($arr['content']);
 
 
         // add image   
        $file_name = mysql_real_escape_string($file);
        if( !$file_name )
        $file_name = mysql_real_escape_string($file['name']);
          
         $directory_pic = LOCALPATH."/root/news_img/";
         if(!is_dir($directory_pic))mkdir($directory_pic);
                                                                     
        $a = explode(".", $file['name']);
        $ext = $a[ count($a)-1 ];
        $file_name_md5 = md5(microtime());                                
        $new_file_path = $directory_pic.$file_name_md5.".".$ext;
        
        if( copy($file['tmp_name'], $new_file_path) ){
            $file_name_ins = $file_name_md5.".".$ext;
            $insert['img']=$file_name_ins; 
            
        }
 
 
        $arr['image_news'] = $file_name_ins;
        
        
	    $this->update("news", $arr, "id = '{$id}'", false, true, true);
        //var_dump($arr);
        
     $val = $GLOBALS['db']->GetRow("SELECT id, title, short_content, content, tags FROM news WHERE id = '$id'");
	 $ins = $val[title]." ".$val[short_content]." ".$val[content]." ".$val[tags];
	 $ins = mysql_escape_string($ins);
	 $GLOBALS[db]->Execute("UPDATE news SET search_val = '$ins' WHERE id = '$val[id]'");
}


function DelNewsFiles($news_id){
	$files = $this->db->GetAssoc("SELECT id AS fid, name AS fname FROM files WHERE object_id = '{$news_id}'");
	foreach ($files as $k=>$v){
		@unlink(LOCALPATH."/root/files/".(int)($news_id/1000)."/".$v);
		$this->db->Execute("DELETE FROM files WHERE id = '{$k}'");
	}
}

function GetNews($active, $search_string = ""){
	if($active == 1){
		$active = 1;
	} else {
		$active = 0;
	}
	if ($search_string != "") $where = " AND title LIKE '%{$search_string}%'";
	if ($_SESSION['admin'] == 2) $where .= " AND user_id  = '{$_SESSION['UserID']}'";
	return $this->pagingQuery("SELECT id, title ,cat_name, publish_date, top FROM news WHERE active = '$active' $where ORDER BY id DESC", 10);
}  

function AdminGetAllAU(){
    return $this->db->GetAll("SELECT * FROM about_us");
}

function GetNewsTop($active){
	return $this->pagingQuery("SELECT id, title ,cat_name, publish_date, top FROM news WHERE active = '1' AND top = '1' ORDER BY id DESC", 10);
}

function getShow($id, $field){
	return $this->db->GetOne("SELECT $field FROM news WHERE id = '$id'");
}

function setShow($id, $val, $field){
	$this->db->Execute("UPDATE news SET $field =  '$val' WHERE id = '$id'");
}

function GetValuti(){
    return $this->db->GetAll("SELECT * FROM valuti ORDER BY id ASC");
}

function EditValuti($arr){
	$this->db->Execute("UPDATE valuti SET rate = '{$arr['USD']}' WHERE id = '1'");
	$this->db->Execute("UPDATE valuti SET rate = '{$arr['CHF']}' WHERE id = '2'");
	$this->db->Execute("UPDATE valuti SET rate = '{$arr['GBP']}' WHERE id = '3'");
	$this->db->Execute("UPDATE valuti SET rate = '{$arr['JPY']}' WHERE id = '4'");
    $this->db->Execute("UPDATE valuti SET rate = '{$arr['CNY']}' WHERE id = '5'");
	$this->db->Execute("UPDATE valuti SET rate = '{$arr['TRY']}' WHERE id = '6'");
}

function GetSubCat($cat_id){
	return $this->db->GetAll("SELECT id, name, path FROM categories WHERE top = '1' AND id != '107' ");
}

function CountNews($cat_id){
     return $this->db->GetAll("SELECT COUNT(id) AS numrows FROM news WHERE cat_id = '$cat_id'");
 }

function GetCatOneNews($id){
    $arr = $this->db->GetAll("SELECT id FROM categories WHERE top = '1' AND parent = '$id'");
    foreach($arr AS $val){
    	$sql .= "(SELECT id, title, short_content, content, logo, publish_date, cat_name,cat_id, views FROM news WHERE cat_id = '{$val['id']}' AND active = 1 AND NOW() > publish_date ORDER BY id DESC LIMIT 0,1) UNION ";
    }
    $sql = substr($sql ,0, -7);
    return $this->db->GetAll($sql);
}

function GetListNews($cat_id, $sort=1){
	if($sort == 1){$order = " publish_date DESC ";}
	if($sort == 2){$order = " views_day DESC ";}
	if($sort == 3){$order = " views_week DESC ";}
	if($sort == 4){$order = " views_month DESC ";}
    if($cat_id == "1;15;")
        $exclusion = "AND cat_id <> '107' AND cat_id <> '139' AND cat_id <> '147'";
	return $this->pagingQuery("SELECT id, title, short_content, content, publish_date, cat_name, views FROM news WHERE category_path LIKE '$cat_id%' $exclusion AND active = 1 AND NOW() > publish_date ORDER BY $order", 10);
}

function ReadNews($id){
	return $this->db->GetRow("SELECT id, title, image_news, short_content, content, cat_name, publish_date, no_comments
	                          FROM news 
                              WHERE id = '$id' AND active = 1");
}



function AddComment($id, $arr){
	$url = $_SERVER[REQUEST_URI];
	$ip = $_SERVER[REMOTE_ADDR];
	
	$post = $_POST;
	foreach ($post AS $val){
	   $post .= $val."     |     ";
	}
 
 
	$get = $_GET;
    foreach ($get AS $val){
	   $get .= $val."     |     ";
	}
      
	if (!$error){
	 $this->db->Execute("INSERT INTO comments (`object_id`, `from`, `user_id`, `text`, `date`, `mail`, `url`, `ip`, `post`, `get`) VALUES ('$id', '{$arr['from']}', '{$arr['user_id']}', '{$arr['text']}', NOW(), '{$arr['mail']}', '$url', '$ip', '$post', '$get') ");
	}
}

function GetComments($id){
	 $arr =  $this->pagingQuery("SELECT `object_id`, `from`, `user_id`, `text`, `date`, `mail` FROM comments WHERE object_id = '$id' ", 5);
	 return $arr;
}

function NewsSearch($word){
      $word = mysql_real_escape_string($word);
      $arr =  $this->pagingQuery("SELECT  id, title, short_content, content, image_news, publish_date, cat_name FROM news WHERE ( MATCH(title,short_content)AGAINST ('$word' IN BOOLEAN MODE)) AND active = 1 ORDER BY publish_date DESC", 10);
      return $arr;
}    

 
function MoreNews($id, $cat_id){
	return $this->db->GetAll("SELECT `id`, `title` FROM news WHERE cat_id = '$cat_id' AND id != '$id' AND active = '1' ORDER BY id DESC LIMIT 0,3");
}




function GetNewsCat($cat_id){
    return $this->pagingQuery("SELECT id, title, image_news, short_content, content, image_news, cat_name FROM news WHERE cat_id = '$cat_id' ORDER BY publish_date DESC ",10);
    
}   

function GetTitleCat($cat_id){
        return $this->db->GetAll("SELECT id, name FROM categories WHERE id = '$cat_id'"); 
}


function GetGall($id){
	return $this->db->GetOne("SELECT COUNT(id) FROM images WHERE object_id = '{$id}'");
}

function GetWord(){
		$sql = "SELECT id, title, content, logo, publish_date, cat_name, views 
	            FROM news WHERE active = '1' AND category_path LIKE '1;16;38;%' AND NOW() > publish_date ORDER BY publish_date DESC LIMIT 0, 20";
		return $this->db->getAll($sql);
	}
	
	function DelNews($id){
		$this->db->Execute("DELETE FROM news WHERE id = '{$id}'");
	}
	
	function MyNews($id){
		$news_found = $this->db->GetOne("SELECT COUNT(id) FROM news WHERE id = '{$id}' AND user_id = '{$_SESSION['UserID']}'");
		if ($news_found == 1 || $_SESSION['admin'] == 1) return true;
		else return false;
	}
	
	function GetRssNews(){
		return $this->db->GetAll("SELECT n.id, n.title,n.image_news, n.short_content, n.content, n.publish_date, n.cat_name, c.name AS category FROM news AS n, categories AS c
         WHERE c.id = n.cat_id AND n.active = 1 ORDER BY n.id DESC LIMIT 0, 10");
	}
	
    function GetRssCat(){
        return $this->db->GetAll("SELECT id, name FROM categories ");
    }
    
    function GetFullRssNews(){
        return $this->db->GetAll("SELECT n.id, n.title,n.image_news, n.short_content, n.content, n.publish_date, n.cat_name, c.name AS category FROM news AS n, categories AS c
         WHERE c.id = n.cat_id AND n.active = 1 ORDER BY n.id DESC ");
    }
	
	function GetCatTree(){
		$parent_cats = $GLOBALS['db']->GetAll("SELECT id, name FROM categories WHERE parent = 0");
		foreach ($parent_cats as $k=>$v){
			$parent_cats[$k]['cats'] = $this->GetCats($v['id']);
		}
		return $parent_cats;
	}
	
	function GetCats($id){
		$cats = $GLOBALS['db']->GetAll("SELECT id, name FROM categories WHERE parent = '{$id}'");
		if ($cats){
			foreach ($cats as $k=>$v){
				$cats[$k]['cats'] = $this->GetCats($v['id']);
			}
		}
		return $cats;
	}
	
	function GetLinkedNews($news_id){
		$arr = $this->db->GetAssoc("SELECT attached_news_id, attached_news_id AS a_id FROM linked_news WHERE main_news_id = '$news_id'");
		$ids = implode($arr, ",");
		return $this->db->GetAll("SELECT id, title FROM news WHERE id IN ($ids) ORDER BY id DESC");
		//return $this->db->GetAll("SELECT n.id, n.title FROM news AS n, linked_news AS ln WHERE n.id = ln.attached_news_id AND ln.main_news_id = '{$news_id}' ORDER BY n.id DESC");
	}
	
	function DelLinkedNews($main_news_id){
		$this->db->Execute("DELETE FROM linked_news WHERE main_news_id = '{$main_news_id}'");
	}
	

    
    function GetPics(){
    	 return $this->PagingQuery("SELECT id, name, description, keywords, orig, 363×181, 160×126, 106×83, 597×420 FROM gallery WHERE id ORDER BY id DESC", 12);
    }
    function GetDictionary(){
    	 return $this->PagingQuery("SELECT id, name, `desc` FROM rechnik WHERE id ORDER BY id DESC", 12);
    }
    function GetAllDictionary($ord){
    	 if($ord == 1){
    	 	$order = " ORDER BY id DESC ";
    	 }  elseif ($ord == 2){
    	 	$order = " ORDER BY views DESC ";
    	 } else {
    	 	$order = " and LEFT(name, 1) = '".$ord."' ORDER BY name ASC";
    	 }
    	 return $this->PagingQuery("SELECT id, name, `desc`, date, views FROM rechnik WHERE id $order", 12);
    }
    

    
    function GetPics2(){
    	return $this->db->GetAll("SELECT id, name, description, keywords, orig, 363×181, 160×126, 106×83, 597×420 FROM gallery WHERE id ORDER BY id DESC LIMIT 0,20");
    }
    
    function DeleteGallPic($id){
    	$name = $this->db->GetOne("SELECT orig FROM gallery WHERE id = '$id'");
        $this->db->Execute("DELETE FROM gallery WHERE id = '$id'");
	    @unlink(LOCALPATH."/root/gal/".(int)($id/1000)."/orig_".$name.".jpg");
	    @unlink(LOCALPATH."/root/gal/".(int)($id/1000)."/thumb_".$name.".jpg");
    }
    
    function addTagCheck($word){
    	$ip = $_SERVER['REMOTE_ADDR'];
    	$referer = $_SERVER['HTTP_REFERER'];
    	$url = $_SERVER['REQUEST_URI'];
    	$word = str_replace("-", " ", $word);
	    $word = mysql_real_escape_string($word);
        $tag_id = $GLOBALS['db']->GetOne("SELECT id FROM goole_check WHERE tag = '{$word}'");
	    if ($tag_id){
			 $GLOBALS['db']->Execute("UPDATE goole_check SET views = views + 1, lastedit = NOW(),referer = '$referer', ip = '$ip', url = '$url' WHERE id = '$tag_id'");
		 }else{
			 $GLOBALS['db']->Execute("INSERT INTO goole_check (tag, lastedit, referer, ip, url) VALUES ('{$word}', NOW(), $referer, $ip, $url)");
		}
    }
    
    function GetListNewsRss($sort=1){
        if($sort == 1){$order = " publish_date DESC ";}
        if($sort == 2){$order = " views_day DESC ";}
        if($sort == 3){$order = " views_week DESC ";}
        if($sort == 4){$order = " views_month DESC ";}
        return $this->pagingQuery("SELECT id, title, short_content, content, logo, publish_date, cat_name, views FROM news WHERE net = 1 AND active = 1 AND NOW() > publish_date ORDER BY $order", 10);
    }
    function GetOtherInter($id)
    {
        $sql = "SELECT id, title, content, logo, publish_date, cat_name, views, short_content 
                FROM news WHERE active = '1' AND id!=$id AND category_path LIKE '1;15;' AND NOW() > publish_date ORDER BY id DESC LIMIT 0,2";
        return $this->db->GetAll($sql);        
    }
    function OtherRubrika($cat_id, $id)
    {
        $val = "SELECT id, title ,cat_name, publish_date, date_entered, top, views FROM news WHERE active = '1' AND cat_id = '$cat_id' AND id <> '$id' AND NOW() > publish_date ORDER BY id DESC LIMIT 0,2";       
        $ret = $this->db->GetAll($val); 
        foreach($ret as $k=>$v)
        {
            $ret[$k]['date'] = date("H:i | m-d-y", strtotime($ret[$k][publish_date]));
        }
        return $ret;
    }

    
    function UploadPicGallery($arr, $file){
        
        // add image 
        $file_name = mysql_real_escape_string($file);
        if( !$file_name )
        $file_name = mysql_real_escape_string($file['name']);
          
         $directory_pic = LOCALPATH."/root/news_img/gallery_img/";
         if(!is_dir($directory_pic))mkdir($directory_pic);
                                                                     
        $a = explode(".", $file['name']);
        $ext = $a[ count($a)-1 ];
        $file_name_md5 = md5(microtime());                                
        $new_file_path = $directory_pic.$file_name_md5.".".$ext;
        
        if( copy($file['tmp_name'], $new_file_path) ){
            $file_name_ins = $file_name_md5.".".$ext;
            $insert['img']=$file_name_ins; 
            
        }
        
        $arr['picture'] = $file_name_ins; 
        
        //var_dump($arr['picture']);
        
        $this->db->Execute("INSERT INTO gallery (`title`, `name`, `src`) VALUES ('{$arr['title']}', '{$arr['name']}', '{$arr['picture']}')");
     // $this->db->Execute("INSERT INTO about_us('txt','img') VALUES ('$txt','$img')");

       
    }
    
    function setAboutUstxt($txt){
        $GLOBALS[db]->Execute("UPDATE about_us SET txt = '$txt' WHERE id = 1");

    }
    
    function setPicDiscriber($txt, $file){
        
                
        // add image 
        $file_name = mysql_real_escape_string($file);
        if( !$file_name )
        $file_name = mysql_real_escape_string($file['name']);
          
         $directory_pic = LOCALPATH."/root/news_img/about_us_img/";
         if(!is_dir($directory_pic))mkdir($directory_pic);
                                                                     
        $a = explode(".", $file['name']);
        $ext = $a[ count($a)-1 ];
        $file_name_md5 = md5(microtime());                                
        $new_file_path = $directory_pic.$file_name_md5.".".$ext;
        
        if( copy($file['tmp_name'], $new_file_path) ){
            $file_name_ins = $file_name_md5.".".$ext;
            $insert['img']=$file_name_ins; 
            
        }
        $img = $file_name_ins;
        var_dump($img);
        
        $this->db->Execute("INSERT INTO about_us(`txt`,`img`) VALUES ('$txt','$img')");
    }
        
}
?>