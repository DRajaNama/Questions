$(document).ready(function(){
 var referrer =  document.referrer;
console.log(referrer);
$(".form").on('submit',(function(e){
	
			e.preventDefault();
		
        	var data = new FormData(this);//$(this).serialize();
        	var url = $(this).attr('action');
        	var method = $(this).attr('method');
        	$(".form_error").html('');
        	$(".alert-danger").html('');
            $.ajax({
        	type:method,
        	url:url,
        	data:data,
        	dataType:'JSON',
        	cache:false,
            contentType: false,
            processData: false,
        	success: function(e) {
				 
                		if(e.errors){
                            $.each(e.errors,function(key,value){
                                $(".form_error_"+key).show();
                				$(".form_error_"+key).html(value);
                			});
                             $('.alert-danger').fadeOut(5000);
                		}
                		
                         if(e.success_login)
                		 {  
                			 $(".form_error").html('');
                			 $('.form')[0].reset();
							 setTimeout(function(){ location.href= referrer; },5000);
                		 }
						 if(e.success_business)
                		 {  
                			 $(".form_error").html('');
                			 $('.form')[0].reset();
							 location.href= 'plans';
                		 }
						 if(e.success)
						 {
							 $(".form_error").html('');
							 $('.form')[0].reset();
							 flashshow(e.success);
							 setTimeout(function(){ location.href= referrer; },5000);
						 }
						 if(e.success_th)
						 {
							 $(".form_error").html('');
							 $('.form')[0].reset();
							 flashshow(e.success_th);
							 //setTimeout(function(){ location.reload(); },5000);
						 }
						 if(e.success_up)
						 {
							 $(".form_error").html('');
							 $('.form')[0].reset();
							 flashshow(e.success_up);
							 setTimeout(function(){ location.href= referrer; },5000);
						 }
						 if(e.success_BMS)
						 {
							 $(".form_error").html('');
							 $('.form')[0].reset();
							 flashshow(e.success_BMS);
							 setTimeout(function(){ location.href= 'BMS'; },3000);
						 }
						 
             }//success
                 });////ajax
		}));///form

function flashshow(data){
	$("body").append('<div class="alert alert-success alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+
    '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
    '<strong>Success!</strong>'+data+'</div>');
}



///// image upload/////
$(document).on('change', '#file', function(){
var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var url = $(this).attr('data-url');
 
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
	alert("Invalid Image File");
  }else{
	  var oFReader = new FileReader();
	  oFReader.readAsDataURL(document.getElementById("file").files[0]);
	  var f = document.getElementById("file").files[0];
	  var fsize = f.size||f.fileSize;
		 if(fsize > 2000000)
		 {
		   alert("Image File Size is very big");
		 }
		 else
		{
			form_data.append("image", document.getElementById('file').files[0]);
		   $.ajax({
			url:url,
			method:"POST",
			data: form_data,
			contentType: false,
			cache: false,
			dataType:"JSON",
			processData: false,
			beforeSend:function(){
				console.log('loading');
			},   
			success:function(data)
			{
				flashshow(data.success);
			    setTimeout(function(){ location.reload();}, 5000);
			}
		   });
		}
	}
 });
 
////// image upload //////	

});////ready function

