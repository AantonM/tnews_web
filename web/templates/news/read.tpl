<!--Прочитане на новина-->

    





<div class="main_box">

 <div class="main_box_top">&nbsp;</div>

 <div class="main_box_content">

   <div class="main_box_content_in margin_news_read">   

   

             

         

         <!--TITLE-->

         <h2 class="main_box_content_a">{$arr.title}</h2>    

         

         <!-- DATE UNDER THE TITLE-->

        {$arr.publish_date|date_format:'%m-%d-%y'}

         <br/><br/><br/> 



        <!--NEWS IMAGE-->         

  <img alt="{$arr.title|escape}" src="{$WEBPATH}news_img/{$arr.image_news}" style="position:block;  margin-left:27px; width:520px; height:320px;"/>



        <!--NEWS CONTENT-->

        <p>{$arr.content|stripslashes}</p><br class="clear" />          



         <!--LIKE BUTTON-->                                                

        <iframe src="http://www.facebook.com/plugins/like.php?href={$WEBPATH}news/read/{$arr.id}.html&title={$arr.title}&layout=button_count&show_faces=false&width=90&action=like&font=lucida+grande&colorscheme=light" allowtransparency="true" style="border: none; overflow: hidden; width: 90px; height: 21px;" frameborder="0" scrolling="no"></iframe>     

         

         

          </div>  

</div>  

             <div class="main_box_bottom">&nbsp;</div>



 

 

 

 

<!--  READ COMMENTS-->

 

      {if !$arr.no_comments}

      {if $comments}

     <div class="tabsn"><span>Коментари</span></div>

     <div class="main_box_top_tab">&nbsp;</div>

      <div class="main_box_content"> 

      {foreach from=$comments item=i}

      <div class="comments">

      <div><span>{$i.from}</span> - <span class="red">{$i.date|date_format:'%d-%m-%Y'} г. {$i.date|date_format:'%H:%M:%S'}</span></div>

      <p>{$i.text}</p>

      </div>

      {foreachelse} 

      {/foreach}

      {if $pages}

     <div class="pages" id="pages">{$pages}</div>

    {/if}

     </div>

     <div class="main_box_bottom">&nbsp;</div>

     {/if}

     {/if}

    



     

     

<!--  WRITE COMMENTS   -->

     

   {if !$arr.no_comments}

     <form method="post">

      <div class="tabsn"><span>Коментирай</span></div>

      <div class="main_box_top_tab">&nbsp;</div>

      <div class="main_box_content"> 

       <div class="comment">

       <span>Име:</span>

       <input type="text" name="from" value="{$smarty.post.from}" />

       </div>

       <br class="clear" />

       <div class="comment">

       <span>E-mail:</span>

       <input type="text" name="mail" value="{$smarty.post.mail}" />

       </div>

       <br class="clear" />

       <div class="comment">

       <span>Текст:</span>

       <textarea name="text">{$smarty.post.text}</textarea>

       </div>

       <br class="clear" />

       <div class="comment">

       <span>Код за <br/>сигурност:</span>

       <img src="/captcha.php" id="captcha" />

       <div style="float: left;">

           <p style="padding-bottom:10px;">Напишете символите в полето:</p><br />

           <input type="text" class="text_small" name="captcha" value="" />

       </div>

       </div>

       <br class="clear" />

       <input type="submit" name="add_comment" class="red_submit" value="Коментирай" />

       <br class="clear" />

      </div>

      <div class="main_box_bottom">&nbsp;</div>

      </form>

     {/if}



<!--     FACEBOOK COMMENTS-->

       

     

      <div class="tabsn"><span>Коментирай чрез facebook</span></div>

      <div class="main_box_top_tab">&nbsp;</div>

      <div class="main_box_content"> 

           {foreach from=$urlID item=u}

          <div id="fb-root" style="position:block; margin-left:35px;"></div>

          <div class="fb-comments" data-href="http://{WEBPATH}/news/read/{$u}.html" data-numposts="5" data-colorscheme="light" style="position:block; margin-left:35px;"></div>   

          {/foreach}

          </div>  

      <div class="main_box_bottom">&nbsp;</div>

     

</div>







{literal}

    <script>(function(d, s, id) {

      var js, fjs = d.getElementsByTagName(s)[0];

      if (d.getElementById(id)) return;

      js = d.createElement(s); js.id = id;

      js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";

      fjs.parentNode.insertBefore(js, fjs);

    }(document, 'script', 'facebook-jssdk'));

    </script>

{/literal}