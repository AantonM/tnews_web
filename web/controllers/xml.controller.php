<?
class xmlController extends Controllers {
    var $models = Array ('news'); // display other models if you want
    
    function index(){
        
        header('Content-Type: text/plain; charset=utf-8');
        header('Content-Type: application/xml');
        print "<?xml version=\"1.0\" encoding=\"utf-8\"?>
        <rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">
        <channel>       
                             <title>Tnews.bg</title>
                             <link>index.php</link>
                             <description>News</description>
                             <language>bg</language>
                            
        ";

        $cat = $this->news->GetRssCat();
        print"<categories>";
        
        foreach($cat as $element){
            
            $n_name=htmlspecialchars($element['name']);
            
            echo'
                <name>'.$n_name.'</name>
            
            ';   
        }
        
        print"</categories>";
        
        $news = $this->news->GetFullRssNews();
        foreach($news as $item ){
            
            $n_title=htmlspecialchars($item['title']); 
            
            echo '
            <item>
                     <title>'.$n_title.'</title>
                    <cat>'.$item['cat_name'].'</cat>
                    <link>'.$url.'</link>
                    <description> <![CDATA['.$item['short_content'].']]> </description>
                    <news><![CDATA['.$item['content'].']]></news>
                    <guid isPermaLink="true">'.$url.'</guid>
                    <dateEntered>'.$item['publish_date'].'</dateEntered>
                    <picture><![CDATA[url/news_img/'.$item['image_news'].' ]]></picture>
            </item>';
        }
        echo "</channel>
          </rss>";
        die;
    }
}
?>