<head>	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<?php wp_enqueue_media(); ?>


<body>

<div class="container">

	<div class="row">
		<div class="col" style="padding-top:20px;">
			<h3 class="text-center">WP-Media</h3>

		<form action="#" id="frmPost">

		<div class="form-group">
        <label>Name :</label>
        <input type="text" name="name" placeholder="Enter your name" class="form-control">
    	</div>

	    <div class="form-group">
	        <label>Email :</label>
	        <input type="email" name="email" placeholder="Enter your Email Address" class="form-control">
	    </div>

	    <div class="form-group">
        <label>Upload Image</label>
        <input type="button" class="form-control" id="btnImage" name="btnImage" value="Upload Image">
   	    </div>

         <button type="submit"  class="btn btn-outline-info">Upload</button>

     	</form>
     	
		</div>


		<div class="col" style="padding-top: 20px;">

			<h3 class="text-center">Upload Image</h3>

	<div class="form-group">
				
	 <img src="" id="getImage" class="form-control" style="height: 100%; width: 100%;"/>

   </div>




		</div>
	</div>

</div>




<script type="text/javascript">
	
	var a = $('label');
	var b = $('col');
	b.css("padding-top","20px");
	a.css("font-size","20px");


	
	jQuery(function() {

		jQuery("#btnImage").on("click", function() {

				var images = wp.media({
					title: "Upload Image",
					multiple: false

				}).open().on("select", function(e){
					var uploadedImages = images.state().get("selection").first();
					var selectedImages = uploadedImages.toJSON();

					jQuery("#getImage").attr("src",selectedImages.url);



					/*

					//console.log(uploadedImages.toJSON());

					selectedImages.map(function(image){
							var itemDetails = image.toJSON();
							console.log(itemDetails.url);
					});

									jQuery.each(selectedImages , function(index,image){
							console.log("Image URL: "+image.url+"and Title:"+image.title);
					});
				*/
			});	

		});

});		




</script>

</body>

