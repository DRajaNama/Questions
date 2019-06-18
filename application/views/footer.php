<style>
  .footer{background-color:#2e3458 !important;padding:60px 48px;color:white !important; margin-top:100px;}
  .input-group-btn,input{height:40px !important;border-radius:0px !important;}
.list>li>a{color:white; text-decoration:none}
  .social-link{color:#fd3768 !important; text-decoration:none;}
  .col-lg-4{border: 0px solid white;}
  h3{text-align:left}
  </style>
<div class="footer">
  <div class="container">
    <div class="row text-center" style="color:#fd3768 !important">
		<div class="col-lg-3">
			<a href="http://www.facebook.com" class="social-link"><h1><i class="fa fa-facebook"></i></h1></a>
		</div>
		<div class="col-lg-3">
			<a href="http://www.google.com" class="social-link"><h1><i class="fa fa-google" ></i></h1></a>
		</div>
		<div class="col-lg-3">
			<a href="http://www.twitter.com" class="social-link"><h1><i class="fa fa-twitter"></i></h1></a>
		</div>
		<div class="col-lg-3">
			<a href="http://www.instagram.com" class="social-link"><h1><i class="fa fa-instagram"></i></h1></a>
		</div>
	</div>
	<hr/>
	<div class="row">
			<div class="col-lg-3">
				<h3>STAY CONNECTED</h3><br/>
				<p>Join Over 10500 people who post Question and Answers Daily</p><br/>
				<div class="input-group">
					<input type="email" class="form-control" name="email" id="subscribe_mail" placeholder="Enter Your Email">
					<div class="input-group-btn">
					  <button class="btn btn-default w3-btn" onclick="subscribe()" type="submit" style="height: 40px !important;width: 70px !important; border-radius:0px !important;border:1px solid #fd3768;">
						<i class="fa fa-envelope"></i>
					  </button>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<h3>COMMITED TO KOTA</h3><br/>
				<p class="text-capitalize text-justify">we strive to educate and collaborate with like minded businessess to make difference environmentally and socially. Let's Collaborate...</p><br/>
			</div>
			<div class="col-lg-2">
			<h3>NEVIGATE</h3><br/>
			
				<!--p><a href="javascript:" class="footer_link">About Us</a></p-->
				<p><a href="developer" class="footer_link">Developer Blog</a></p>
				<!--p><a href="<?php echo base_url(); ?>business" class="footer_link">Business</a></p-->
				<p><a href="<?php echo base_url(); ?>contact" class="footer_link">Contact us</a></p>
		
			</div>
			<div class="col-lg-4">
				<h3>ADDRESS</h3><br/>
			<ul class="list list-unstyled">
				<p>363, Near Shiv Template Mansarovar Colony <br/> Raipura Kota (Rajasthan) India</p>
				<p style="letter-spacing:4px;color:#fd3768"><strong>(+91)-8888888888</strong></p>
				<p style="letter-spacing:4px"><strong>Questions@gmail.com</p>
			</ul>
			</div>
	</div>
	<hr/>
	<div class="row">
		<div class="col-lg-6 col-xs-offset-3 text-center">
			<h5 style="letter-spacing:4px">copy-right By Questions.com, 2018</h5>
		</div>
	</div>
  </div>
      
</div>
<script>
function myFunction(x) {
	var nav = document.getElementById("mySidenav").clientWidth;;
	if(nav == 0){
		//alert('open');
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
	}else{
		//alert('close');
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
	}
    x.classList.toggle("change");
}
function subscribe()
{
	var email = document.getElementById("subscribe_mail").value;
	$.ajax({
		url:'<?php echo base_url(); ?>subscribe',
		method:"POST",
		data:{email:email},
		dataType:'json',
		success:function(response){
			//console.log(response);
			$("body").append('<div class="alert alert-success alert-dismissable" style="position:fixed;  top:100px;  right:30px;  z-index:9999;" >'+
    '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+
    '<strong>Success!</strong> '+response.success+'</div>');
		}
	});
}


</script>
 <!--script>
			// ClassicEditor
				// .create( document.querySelector( '#editor' ) )
				// .then( editor => {
					// console.log( editor );
				// } )
				// .catch( error => {
					// console.error( error );
				// } );
		</script-->
<!--Start of Tawk.to Script
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a5da203d7591465c706c845/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script><?php //'username = rajanamdav@gmail.com or password = 123456789 ?>
End of Tawk.to Script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/common_script.js"></script>