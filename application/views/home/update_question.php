<?php $base_url = $this->config->item('base_url');  ?>
<div class="container" style="margin-top: 40px !important;">
	
	<!-- question row--->
	<div class="row" style="border: 2px solid #e3e3e3;padding: 15px !important;margin-bottom:50px;background: #d2d2d21a;
box-shadow: 0px 0px 2px black;">
		<div class="col-lg-8">
			<h2>Edit a Question</h2>
		<form class="form" action="<?php echo $base_url; ?>/submit-question" method="post" >
		  <div class="form-group">
			<input type="hidden" class="form-control" name="id" value="<?php echo $question->id; ?>">
			<input type="text" class="form-control" name="question" placeholder="Your Question" value="<?php echo $question->question; ?>">
			<span class="text-danger form_error form_error_question" style="display:none;"></span>
		  </div>
		  
		  <div class="form-group">
			<select  class="form-control" name="category" style="height:38px !important;" value="<?php echo $question->cats; ?>">
				<option value="">Select Categary </option>
				<?php foreach($category as $key=>$value){ 
				echo "<option value=".$value->id.">".$value->title."</option>"; } ?>
			</select>
			<span class="text-danger form_error form_error_category" style="display:none;"></span>
		  </div>
		  <div class="form-group">
			<textarea type="text" row="7" class="form-control" id="editor" name="description" placeholder="Enter question description and Solution Error" ><?php echo json_decode($question->description); ?></textarea>
			<span class="text-danger form_error form_error_description" style="display:none;"></span>
		  </div>
		  <div class="form-group">
			<input type="text" class="form_input tags" id="tags" name="tags" placeholder="Enter Related Tags" value="<?php echo $question->tags; ?>">
			<span class="text-danger form_error form_error_tags" style="display:none;"></span>
		  </div>
		  <input type="submit" class="btn btn-default w3-btn " value="Edit">
		</form> 
		</div>
		<div class="col-lg-4" style="float:right;background: #f6f6f6;">
			
			<h5 class="text-muted">Aks Question Online</h5>
			<br/>
			<p>Enter your Question</p>
			<br/>
			
			<p>Select your Question Categories</p>
			<br/>
			<p>Enter Some Description and Your Solution That Contain Error and Problems</p>
			<br/>
			<br/>
			<br/>
			<p>Enter Question Related Tags </p>
		</div>
	</div> <!-- question row-->
	
	
	
	
	
</div>

</div><!-- main -->


<script>

$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});


</script> 
<script type="text/javascript">
$(function() {
	$('#tags').tagsInput({width:'auto'});
});
</script>
<script>
			ClassicEditor
				.create( document.querySelector( '#editor' ) )
				.then( editor => {
					//console.log( editor );
				} )
				.catch( error => {
					console.error( error );
				} );
		</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/common_script.js"></script>
</body>
</html> 
