<!--Търсене-->

<div class="main_box">
 <div class="main_box_top">&nbsp;</div>
 <div class="main_box_content">
 
 {foreach from=$news item=i name=iter}
   <div class="main_box_content_in">
        <div class="main_box_content_in_height">
        
<!--        IMAGE-->
         <a class="masca_small v10" title="{$i.title|escape}" href="{$WEBPATH}news/read/{$i.id}.html"><img alt="{$i.title|escape}" src="{$WEBPATH}news_img/{$i.image_news}" style="width:107px; height:84px;"/></a>
<!--         TITLE-->
         <a class="main_box_content_a" title="{$i.title|escape}" href="{$WEBPATH}news/read/{$i.id}.html">{$i.title}</a><br/>
<!--         DATE-->
         <span style="margin-left:20px; width: 460px;">{$i.publish_date|date_format:'%m-%d-%y'}</span>
<!--         SHORT CONTENT-->
         <p>{$i.short_content|strip_tags|truncate:450}</p>
        </div>
        
        <a class="more_l" title="{$i.title|escape}" href="{$WEBPATH}news/read/{$i.id}.html">още</a>
  </div>  
  
 {foreachelse}
 <p style="margin-left: 10px;font-weight: bold;">Няма намерени резултати</p>
 {/foreach}
 
 <div class="pages" style="width: 600px;" id="pages">{$pages}</div>
 
 </div>
 <div class="main_box_bottom">&nbsp;</div>

</div>