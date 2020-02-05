<?
class mainModel extends Models {

	function getNews() {
		//print $this->Language;
		$fields = $this->fields('name','description');
		return $this->db->getAll("SELECT id, {$fields} FROM pages WHERE type=".NEWS." AND published=1 ORDER BY id DESC");
	}
	
    function GetSubCat($cat_id){
        return $this->db->GetAll("SELECT id, name, path FROM categories WHERE top = '1' AND id != '107'");
    }
   
	function GetNovini(){
		$sql = "SELECT id, title, content, publish_date, cat_name, views , short_content
	            FROM news WHERE active = '1' AND category_path LIKE '1;16;%' AND NOW() > publish_date ORDER BY publish_date DESC LIMIT 0,10";
		return $this->db->getAll($sql);
	}
    
	function GetMainNews(){
        $memcache_obj = Core::mc_connect();

        $key = "g_get_main";
        $value = $memcache_obj->get($key);   
        if ($value) {
           return unserialize($value);
        } else {
           $v = $this->db->GetAll("SELECT id, title, image_news, short_content, content
            FROM news
            WHERE active = '1' AND top = '1' AND NOW() > publish_date ORDER BY publish_date DESC LIMIT 0,5");
           $count = $GLOBALS['db']->GetOne("SELECT FOUND_ROWS()");
           $memcache_obj->add($key, serialize($v), false, 300);
           return $v;
       }

    }
    
    function getMainNewsIndexNew(){
        $results = $this->db->GetAll("SELECT id, name, path FROM categories ORDER BY ID");    
        foreach($results as $k=>$v)
        {
            $results[$k]['news'] = $this->db->GetAll("SELECT id, title, image_news, short_content, content
            FROM news
            WHERE active = '1' AND cat_id = '{$v['id']}' ORDER BY publish_date DESC LIMIT 0,2");
        }
        
        return $results;
    }
    
    function GetGallery(){
        $result = $this->db->GetAll("SELECT * FROM gallery ORDER BY ID DESC LIMIT  0,4");
        return $result;
    }
    
    function GetCat(){
        $result = $this->db->GetAll("SELECT id, name, path FROM categories ORDER BY ID");
        return $result;    
    }

    function GetSnews($cat){
         $result = $this->db->GetAll("SELECT id, title, short_content FROM news ORDER BY ID WHERE cat_id = '$cat' DESC LIMIT 2");   
         return $result;
    }
        
}
?>