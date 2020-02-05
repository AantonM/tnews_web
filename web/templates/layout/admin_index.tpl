<!-- Layout на Админ панел-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="/css/admin.css" rel="stylesheet" />
<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/admin_ajax.js"></script>
<!--<script type="text/javascript" src="/js/jquery-1.2.min.js"></script>-->




<title>Administration Panel</title>

</head>

<body>
      
<h2 class="admin_header">&nbsp;Система за управление на съдържанието на {$SITE_NAME}</h2>
<div class="path"><a href="/admin/">Начало</a>
</div>                                                    
                                                           
        <div id="if_h" style="width: 15%; float: left;" > 
            <div class="basic" style ="float:left;" id="list1b">

            <a>Структура</a>
            <div><a href="/admin/category/index/">Категории</a></div>
            <a>Новини</a>
            <div>
              <a href="/admin/news/add/">Добави новина</a>
              <a href="/admin/news/list_news/1/">Активни новини</a>
              <a href="/admin/news/list_news/2/">Неактивни новини</a>
              <a href="/admin/news/top/">Топ новини</a>
            </div>
            <a>Галерия</a>
            <div>
                <a href="/admin/news/gallery/">Добави снимка на деня</a>
            </div>
            <a>Коментари</a>
            <div>
                <a href="/admin/comments/list_comments/1">Всички коментари</a>  
            </div>
            <a>Валути</a>
            <div><a href="/admin/news/valuti/">Редактирай валутите</a></div>
            <a>За нас</a>
            <div><a href="/admin/news/about_us">Редактирай страницата</a></div>
            <a>Потребители</a>
            <div><a href="/admin/users/list_users/">Списък с потребители</a></div>

            
            
            <a href="/users/logout">Изход</a>
            <div></div>
        </div>
    
        </div>
 <div style="width: 85%; float: left;">
  <div style="margin-left: 15px;">
 {$body}
 </div>
</div>
<br style="clear: both;" />

</body>
</html>
{if $time_queries}
 <div style="clear: both;float: left;">{$time_queries}</div>
{/if}