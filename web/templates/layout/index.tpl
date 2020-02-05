<!-- Layout на Новинарския сайт--> 



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns:fb="http://ogp.me/ns/fb#">

<head>

<title>TNews</title>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>

<meta name="Copyright" content="" />

<link href="/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/js/jquery-1.2.min.js"></script>



</head>



<body class="body">

 

  <div class="main">  

   <div class="main_block"  style="min-height:1200px;">

	   <div class="main_in">

	    <div class="header">

	     <div class="logodate">

	      <div class="logo"><a href="{$WEBPATH}"><img alt="{$SITE_NAME}" src="/img/logoBG.png" /></a></div>

	      <div class="time">{$datelogo}</div>    <!--- date under logo--->

	     </div>

         

	     <div class="banner_top">

          <div style="float: right;margin-top: 40px;width: 560px;">

               <div class="search_box">  <!-- Search box -->

                <form method="post" action="/news/find/">

                 <input class="search" type="text" name="word" id="CityAjax" />

                 <input style="margin-right: 0px;" class="search_submit_button" type="submit" value="търси" />

                </form>

               </div> 

            </div>           

	     </div>  

	   </div>

        

        

	    <div class="top_buttons">          <!-- categories menu -->

           <div id="cssmenu">

                <ul>

                     <li><a href="{$WEBPATH}">Начало</a> </li>      

                     {foreach from=$sub_cat item=i name=iter}  

                     <li><a href="{$WEBPATH}news/index/{$i.id}.html">{$i.name}</a></li>

                      {/foreach} 

                </ul>  

            </div> 

	   </div>

          

       

	            

  <div class="main_content">

          

    <!--         SINOPTIK-->    

     <div class="right_box">

        <div class="tabs"><span>Синоптик</span></div>

        <div class="right mt3">&nbsp;</div>

        <div class="right_content">

            <div class="right_in">

               <h4> София<br/> </h4>

               {$itemS.description}

            </div>

            <div class="right_in">

                <h4>Пловдив<br/></h4>

               {$itemP.description}

            </div> 

            <div class="right_in">

               <h4> Варна<br/> </h4>

               {$itemV.description}

            </div>   

        </div>

        <div class="banner_right_bottom" style="position:block; margin-bottom:30px;">&nbsp;</div> 

                     

            

            

        <!-- Valuti -->  

    <div class="right_box">

     <div class="tabs"><span>Валутен Курс</span></div>

      <div class="right mt3">&nbsp;</div>

      <div class="right_content" style="height:210px;">

        <div class="right_in" style="height:190px;">

           <table class="table_valuti"> 

            <thead >

                <tr>

                    <td>Валута</td>

                    <td>Код</td>

                    <td>Лева</td><br />

                </tr>

            <thead>

                {foreach from=$valuti item=v}

                <tr>

                    <td><img src="{$WEBPATH}img/{$v.code}.png"/>  {$v.name}</td>

                    <td>{$v.code}</td>

                    <td>{$v.rate}</td><br />

                </tr>

                {/foreach}

            </table>

        </div>

     </div>

      <div class="banner_right_bottom" style="position:block; margin-bottom:30px;">&nbsp;</div>     

     </div>      

            

            



           <!-- SNIMKI -->  

    <div class="right_box" style="position:block; margin-top:40px;">

     <div class="tabs"><span>Снимки</span></div>

      <div class="right mt3">&nbsp;</div>

      <div class="right_content" style="height:223px; ">

        <div class="right_in" style="height:190px;">

            <div class="slides" style="margin-top:10px; margin-left:5px; margin-right:5px; height:200px;">

             {foreach from=$photosGallery item=p}

                <img src="{$WEBPATH}news_img/gallery_img/{$p.src}" title="{$p.name}{"  -  "}{$p.title}" alt="img" >

               {/foreach} 

             </div>

        </div>

     </div>

      <div class="banner_right_bottom">&nbsp;</div> 

           

         



      </div>                     

      </div>    

	     {$body}

	    </div> 

     </div>

   </div>

      

          

          

       

   <div class="footer">

            <img alt="footer" id="footer_focus" src="{$WEBPATH}img/focus.png"/>

            <div class="links">

                       <a href="https://www.facebook.com"><img alt="fb" id="fb" src="{$WEBPATH}img/Facebook.png"/></a>

                       <a href="https://www.twitter.com"><img alt="tw" id="tw" src="{$WEBPATH}img/Twitter.png"/></a> 

                       <a href="http://www.linkedin.com"><img alt="Lin" id="Lin" src="{$WEBPATH}img/lIn.png"/></a>

                       <a href="/rss/"><img alt="Lin" id="Lin" src="{$WEBPATH}img/RSS.png"/></a> 

            </div> 

   </div>       

            



   

   

   

   <br class="clear" />

   <div class="footer_final">                                

    <div style="clear: both;width: 90%;font-size: 9px;font-family:Arial !important;font-weight: nopmal;font-size:12px;" class="ff_left">

    &nbsp;&nbsp;&nbsp;&nbsp; Всички права запазени. Разработен от Антон M. - Технологично училище електронни системи към ТУ - София  |  <a href="{$WEBPATH}news/about_us" >За нас</a>

    </div> 

   </div>

  

   

   

  {literal}

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>       

  <script src="{/literal}{$WEBPATH}{literal}jquery.slides.min.js"></script>

  

    <script>

    $(function() {

      $('.slides').slidesjs({

        width: 940,

        height: 528,

        navigation: false

      });

    });

  </script>

  

 <script>

   

 </script>

 {/literal}     

         

   

   

  