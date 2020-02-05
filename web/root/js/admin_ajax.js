function EditCat(name,id,valen){$.ajax({type:'POST',url:'/ajaxtabs/edit_cat/'+name+'/'+id+'/'+valen,data:null,cache:false,success:function(html){valid=html;}});}
function subCategories_dropdown(cat2,selected,id){var cat=$("#"+cat2).val();$.ajax({type:"GET",url:'/ajaxtabs/category_dropdown/'+cat+'/'+selected,cache:false,success:function(html){$("#topic_"+id).html(html);}});}

var filesCount=1;

function addRowClone(tblId)
{
	if ( filesCount >= 10 ) return(alert('Maximum files reached'));
	var tblBody = document.getElementById(tblId).tBodies[0];
	newNode = tblBody.rows[0].cloneNode(true);
	var e = newNode.getElementsByTagName('span');
	e[0].style.display = 'inline';
	var f = newNode.getElementsByTagName('input');
	var first=document.getElementById('firstfile');
	f[0].value = '';
	f[0].id='';
	f[0].name='file[]';
	//e[0].style.display = 'none';
	filesCount++;
	tblBody.appendChild(newNode);
}

function removeCloneRow(node) {
	 document.getElementById('atrForm').removeChild(node);
}



function EditPic(id) {
$.ajax({
        type: "GET",
        url: '/ajaxtabs/edit_pic/'+id,
        cache: false,
        success: function(html){
         $('#edit_pic').html(html); 
         $("#edit_pic").show();
        }
     });
}

function HidePicEdit(){
	$("#edit_pic").hide();
}

function FinalPicEdit(id){
	link =  document.getElementById("link").value;
	text =  document.getElementById("text").value;
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/edit_pic_final/'+id,
        data: "link="+link+"&text="+text,  
        cache: false,
        success: function(resp){
         $("#edit_pic").hide();
         valid=html;
        }
     });
}

function touch_ajax(file)
{
     $.ajax({
        type: "GET",
        url: file,
        data: null,
        cache: false 
     });
}

function CatShow(id, obj){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/show_cat/'+id, 
        cache: false,
        success: function(html){
		 if(($(obj).attr("src")) == "/ico/no.png"){
			 $(obj).attr("src", "/ico/yes.png");
			 $(obj).attr("title", "Скрий от главното меню");
		 } else {
			 $(obj).attr("src", "/ico/no.png");
			 $(obj).attr("title", "Покажи в главното меню");
		 }
         valid=html;
        }
     });
}

function CatLayout(id, obj){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/cat_layout/'+id, 
        cache: false,
        success: function(html){
		 if(($(obj).attr("src")) == "/ico/1.png"){
			 $(obj).attr("src", "/ico/2.png");
		 } else {
			 $(obj).attr("src", "/ico/1.png");
		 }
         valid=html;
        }
     });
}

function deleteTag(id){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/del_tag/'+id,
        cache: false,
        success: function(resp){
         $("#hide_"+id).hide();
         valid=html;
        }
     });
}

function deleteTagGoogle(id){
	$.ajax({
		type: "POST",
		url: '/ajaxtabs/del_tag_google/'+id,
		cache: false,
		success: function(resp){
		$("#hide_"+id).hide();
		valid=html;
	}
	});
}
function ApproveTag(id){
	$.ajax({
		type: "POST",
		url: '/ajaxtabs/ApproveTag/'+id,
		cache: false,
		success: function(resp){
		$("#hide_"+id).hide();
		valid=html;
	}
	});
}


function CatShowFooter(id, obj){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/show_cat_footer/'+id, 
        cache: false,
        success: function(html){
		 if(($(obj).attr("src")) == "/ico/no.png"){
			 $(obj).attr("src", "/ico/yes.png");
			 $(obj).attr("title", "Скрий от футера");
		 } else {
			 $(obj).attr("src", "/ico/no.png");
			 $(obj).attr("title", "Покажи в футера");
		 }
         valid=html;
        }
     });
}

function deleteComment(id){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/delete_comment/'+id,
        cache: false,
        success: function(resp){
         $("#hide_"+id).hide();
        }
     });
}


function NewsList(news_id){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/get_news/'+news_id, 
        cache: false,
        success: function(html){
		 	var data = html.split("<->");
        }
     });
}

function AddLinkedNews(news_id){
	var title = $("#linked_news").val();
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/add_linked_news/'+news_id,
        data: "title="+title,   
        cache: false,
        success: function(html){
        	if(html != "Error"){
			 	$("#linked_news").val('');
			 	$("#linked_news_container").show();
			 	$("#linked_news_header").after(html);
			} else {
        		alert("Новината вече е въведена!");
        	}
		}
     });
}

function deleteLinkedNews(id){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/delete_linked_news/'+id,
        cache: false,
        success: function(resp){
         $("#linked_news_"+id).hide();
        }
     });
}


function GetPic(){
	$("#get_pic").fadeIn(400);

}
function GetPic_BigGal(){
	$("#get_pic_BigGal").fadeIn(400);
	
}
function GetPic_big_image(){
	$("#get_pic_big_image").fadeIn(400);
	
}

function SearchPic(id){
	text = $("#search_pic").val();
	if (text == ''){
	 text = 0;	
	}
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/get_pic/'+text+'/'+id,
        cache: false,
        success: function(html){
		 $('#gal_pic').html(html); 
        }
     });
}
function SearchPic_BigGal(id){
	text = $("#search_pic_BigGal").val();
	if (text == ''){
		text = 0;	
	}
	$.ajax({
		type: "POST",
		url: '/ajaxtabs/get_pic_BigGal/'+text+'/'+id,
		cache: false,
		success: function(html){
		$('#gal_pic_BigGal').html(html); 
	}
	});
}
function SearchPic_big_image(id){
	text = $("#search_pic_big_image").val();
	if (text == ''){
		text = 0;	
	}
	$.ajax({
		type: "POST",
		url: '/ajaxtabs/get_pic_big_image/'+text+'/'+id,
		cache: false,
		success: function(html){
		$('#gal_pic_big_image').html(html); 
	}
	});
}


function editmediaitem(mid){
	$("#ViewLogoHide").hide();
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/view_logo/'+mid,
        cache: false,
        success: function(html){
		 $('#ViewLogo').html(html); 
        }
     });
}

function editmediaitem_BigGal(mid){
	$("#ViewLogoHide_BigGal").hide();
	$.ajax({
		type: "POST",
		url: '/ajaxtabs/view_logo_BigGal/'+mid,
		cache: false,
		success: function(html){
		$('#ViewLogo_BigGal').html(html); 
	}
	});
}

function editmediaitem_big_image(mid){
	$("#ViewLogoHide_big_image").hide();
	$.ajax({
		type: "POST",
		url: '/ajaxtabs/view_logo_big_image/'+mid,
		cache: false,
		success: function(html){
		$('#ViewLogo_big_image').html(html); 
	}
	});
}

function UploadPicture(id){
	name =  document.getElementById("name").value;
	description =  document.getElementById("description").value;
	keywords =  document.getElementById("keywords").value;
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/upload/'+id,
        data: "name="+name+"&description="+description+"&keywords="+keywords,  
        cache: false,
        success: function(resp){
         $("#edit_pic").hide();
         valid=html;
        }
     });
}


function EditPicText(id){
	$.ajax({
        type: "GET",
        url: '/ajaxtabs/edit_pic_text/'+id,
        cache: false,
        success: function(html){
         $('#edit_pic').html(html); 
         $("#edit_pic").show();
        }
     });
}

function FinalPicEditText(id){
	name =  document.getElementById("name").value;
	description =  document.getElementById("description").value;
	keywords =  document.getElementById("keywords").value;
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/edit_pic_final_text/'+id,
        data: "name="+name+"&description="+description+"&keywords="+keywords,  
        cache: false,
        success: function(resp){
         $("#edit_pic").hide();
         valid=html;
        }
     });
}

function GetPicBig(obj){
	if ($(obj).is(':checked')) {
		$("#edit_pic_main").show();
	 } else {
		 $("#edit_pic_main").hide();
	 }
}


function CloseDjam(){
	$("#get_pic").fadeOut(400);
	$("#get_pic_BigGal").fadeOut(400);
	$("#get_pic_big_image").fadeOut(400);
}


function SetPic(size_id, news_id){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/set_pic/'+size_id+'/'+news_id,
        cache: false,
        success: function(html){
		 editmediaitem(news_id);
         $("#get_pic").hide();
         valid=html;
        }
     });
}

function SetPic2(size_id, news_id){
	$.ajax({
		type: "POST",
		url: '/ajaxtabs/set_pic2/'+size_id+'/'+news_id,
		cache: false,
		success: function(html){
		editmediaitem_big_image(news_id);
		$("#get_pic_big_image").hide();
		valid=html;
	}
	});
}

function DelImageSize(id, obj){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/dell_image_size/'+id,
        cache: false,
        success: function(html){
         valid=html;
         $(obj).parent().hide();
        }
     });
}

 

function SetCat(cat_id, id){
	$.ajax({
        type: "POST",
        url: '/ajaxtabs/SetCat/'+cat_id,
        cache: false,
        success: function(html){
         valid=html;
         SearchPic(id);
        }
     });
}
function SetCat_BigGal(cat_id, id){
	$.ajax({
		type: "POST",
		url: '/ajaxtabs/SetCat/'+cat_id,
		cache: false,
		success: function(html){
		valid=html;
		SearchPic_BigGal(id);
	}
	});
}
function SetCat_big_image(cat_id, id){
	$.ajax({
		type: "POST",
		url: '/ajaxtabs/SetCat/'+cat_id,
		cache: false,
		success: function(html){
		valid=html;
		SearchPic_big_image(id);
	}
	});
}

function SubmitAjax(field, content, div) {
    $.ajax({	
       type: "GET",        
       url: field+content,
       cache: false,
       success: function(html){
       	string=html.split("[DELIMITER]");
       	$("#"+div).html(string[0]);
       }      
    }); 
} 