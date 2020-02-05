<!--ГЛАВНАТА СТРАНИЦА-->


<!--Slider news--> 
{$scroll}
<div class="title_use"><span> &nbsp; Tоп новини  </span></div> 
     <div class="main_fix">
       <div class="index_box">
        <div class="big_cate_tab_top" style="width:1000px;">&nbsp;</div> 
         <div class="index_box_content">

             <div class="top_box_image">
            <!--the picture for the news -->
             <a id="main_news_href1" style="cursor: pointer; text-decoration: none;" href="{$WEBPATH}news/read/{$main_news[0].id}.html" title="{$main_news[0].title|escape}"><img style="height:238px; width:367px; border: 0px;" id="main_image" alt="{$main_news[0].title|escape}" src="{if $main_news[0].image_news}{$WEBPATH}news_img/{$main_news[0].image_news}{else}{$WEBPATH}img/noimage.jpg{/if}" /></a>  
             <!--the link under the picture-->         
             <a id="main_news_href2" style="cursor: pointer; text-decoration: none;" href="{$WEBPATH}news/read/{$main_news[0].id}.html" title="{$main_news[0].title|escape}" ><ins id="main_content" class="top_box_info"><p>{$main_news[0].short_content|strip_tags|truncate:150}</p></ins></a>          
            </div>
                   
            <div class="top_care_buttons">
            {foreach from=$main_news item=i name=iter}
            <a id="main_news_{$smarty.foreach.iter.iteration}" title="{$i.title|escape}" onmouseover="ChangeView('{$i.short_content|strip_tags|truncate:150}','{$WEBPATH}news_img/{$i.image_news}', this, '{$WEBPATH}{$i.title|seoname}{$NEWS_SEO}{$i.id}.html')" href="{$WEBPATH}news/read/{$i.id}.html" class="top_menu_href {if $smarty.foreach.iter.first}atm{/if}">{$i.title|truncate:45}</a>
            {/foreach}
            </div>
         </div>
         <div class="index_box_botton">&nbsp;</div>
       </div>
       <div class="clear"></div>  
       
       
                 
<!-- BLOCKS-->
<div class="blocks" style="position: inline-block;">
                           

      {foreach from=$cat_news item=c name=it}
            {if $smarty.foreach.it.iteration%2 EQ 1}
                <div class="chetno_new" style="position:block; ">
                <div class="tabs"><a href="{$WEBPATH}news/index/{$c.id}.html" ><span>{$c.name} </span></a></div> 
                <div class="big_cate_tab_top" style="width:270px;">&nbsp;</div> 
                <div class="index_box_content height289" style="height:300px; width:270px;">
                <div id="inter">
                 <div class="main_theme_news" style="margin-top:6px;">
                  
                {foreach from=$c.news item=n}
                 <div class="main_theme_news_in" style="width:200px; margin-top:10px;text-overflow: ellipsis;">
                    <div style='margin-top:-10px; height:35px; text-overflow: ellipsis; overflow: hidden;'><a class="sTxt" href="{$WEBPATH}news/read/{$n.id}.html">{$n.title}<br /></a></div> 
                    <a class="sIMG" href="{$WEBPATH}news/read/{$n.id}.html"><img alt="small_img" src="{$WEBPATH}news_img/{$n.image_news}" style="width:80px; height:80px;"/></a>
                    <div style='height:70px; text-overflow: ellipsis; overflow: hidden;'><a class="sCont" href="{$WEBPATH}news/read/{$n.id}.html" class="small_cont">{$n.short_content}<br /></a></div> 
                 </div> 
                {/foreach}
                
                 </div> 
                </div>
                </div>    
                <div class="index_box_botton" style="width:273px;">&nbsp;</div>
                </div>                     
                
            {else}
                <div class="nechetno_new">
                <div class="tabs"><a href="{$WEBPATH}news/index/{$c.id}.html"><span>{$c.name}</span></a></div> 
                <div class="big_cate_tab_top" style="width:270px;">&nbsp;</div> 
                <div class="index_box_content height289" style="height:300px; width:270px;">
                <div id="inter">
                <div class="main_theme_news" style="margin-top:6px;">
                
                {foreach from=$c.news item=n}
                    <div class="main_theme_news_in" style="width:200px; margin-top:10px;">
                        <div style='margin-top:-10px; height:35px; text-overflow: ellipsis; overflow: hidden;'><a class="sTxt" href="{$WEBPATH}news/read/{$n.id}.html">{$n.title}<br /></a></div>
                        <a class="sIMG" href="{$WEBPATH}news/read/{$n.id}.html"><img alt="small_img" src="{$WEBPATH}news_img/{$n.image_news}" style="width:85px; height:85px;"/></a>
                        <div style='height:70px; text-overflow: ellipsis; overflow: hidden;'><a class="sCont" href="{$WEBPATH}news/read/{$n.id}.html" class="small_cont">{$n.short_content}<br /></a>  </div> 
                    </div>
                {/foreach}
                
                </div>
                </div> 
                </div>
                <div class="index_box_botton" style="width:273px;">&nbsp;</div>
                </div>                    
            {/if}
      {/foreach}
      </div>  
       

     
     
</div>       
     
