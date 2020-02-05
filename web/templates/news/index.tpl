<!--Categories-->


<div class="main_box">
{foreach from=$title item=t}
     <div class="title_use"><span> &nbsp; {$t.name} </span></div> 
{/foreach}
        <div class="big_cate_tab_top" style="width:628px;">&nbsp;</div> 
  
 
  
 <div class="main_box_content">
 {foreach from=$all_news_CAT item=i name=iter}
   <div class="main_box_content_in">

        <div class="main_box_content_in_height">
        <!--IMAGE-->
         <a class="masca_small v10" title="{$i.title|escape}" href="{$WEBPATH}news/read/{$i.id}.html"><ins></ins><img alt="{$i.title|escape}" src="{$WEBPATH}news_img/{$i.image_news}" style="width:107px; height:84px;" /></a>
        
         <!-- MAIN TITLE-->
         <a class="main_box_content_a" title="{$i.title|escape}" href="{$WEBPATH}news/read/{$i.id}.html">{$i.title}</a>

         <!--SHORT CONTENT-->
         <p>{$i.short_content|strip_tags|truncate:450}</p>

        </div>
        <!--READ MORE-->
        <a class="more_l" title="{$i.title|escape}" href="{$WEBPATH}news/read/{$i.id}.html">още</a>
  </div>
 {/foreach}
   
<div class="pages">{$pages}</div>
      
 </div>
    <div class="main_box_bottom">&nbsp;</div>
</div>



