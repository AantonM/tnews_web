<!--За нас-->

<div id="screenDimmer"></div>

<div class="main_box" style="height:1000px;">

 <div class="main_box_top">&nbsp;</div>

 <div class="main_box_content" >
 

	  <div> 

	  <div class="main_box_content_in margin_news_read">

	  <h2 class="main_box_content_a">ЗА НАС</h2>

	  <div class="contents" style="margin: 0pt 3px 3px 0pt;"> 

           Сайтът и мобилното приложение са разработени от <strong>Антон</strong> и <strong>Мартин</strong>. Ученици в Технологично училище електронни системи към ТУ - град София.

            <img id="Anton" class="Anton" src="{$WEBPATH}img/A.png" alt="A"></img>

            <img id="Jenq" class="Jenq" src="{$WEBPATH}img/M.png" alt="M"></img>   

	  </div> 

	  </div>

	  </div>

 </div>

<div class="main_box_bottom">&nbsp;</div>

</div>

 

 <div id="info_A" style="display:none;">

 <img class="x" src="{$WEBPATH}img/x.png" style="position:block; margin-top:0px; margin-left:430px; width:50px; height:50px;"></img>

        <div><br />     

        <img class="info_pic" src="{$WEBPATH}img/A.png" ></img>

        <div class="main_box_us">                                                                               
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                    diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                    no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                    At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </div>

        </div>

 </div> 

  <div id="info_M" style="display:none;">

  <img class="x" src="{$WEBPATH}img/x.png" style="position:block; margin-top:0px; margin-left:430px; width:50px; height:50px;"></img>

        <div>

        <br />   

        <img class="info_pic" src="{$WEBPATH}img/M.png"></img>                                        
        <div class="main_box_us">                                                                               
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                    diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                    no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                    At vero eos et accusam et justo duo dolores et ea rebum.
                    Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </div>
        </div>
 </div>
 {literal}

 <script>
   

     var $videoA = $('#screenDimmer, #info_A, #footer_focus');

     var $videoM = $('#screenDimmer, #info_M, #footer_focus');



    $('.Toni').click(function() {

        $videoA.fadeIn();

    });



    $('.Jenq').click(function() {

        $videoM.fadeIn();

    }); 

 </script>

 {/literal}