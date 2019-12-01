<?php
/*
Template Name: Insert Data in Wordpress Custom Template Code
*/

global $wpdb, $username, $gender, $email, $country, $address, $b;
$con = mysqli_connect("localhost","root","") or die("sorry data base not found");
mysqli_select_db($con, 'undertaking') or die(mysqli_error($con));

if($_POST['submit']) {
 global $wpdb;
 $table_name ='registration';
 $username = $_POST['username'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $country = $_POST['country'];
 $education = $_POST['education'];
  $b = implode(",", $education);
$address = $_POST["address"];

$success = $wpdb->insert("registration", array(
   "username" => $username,
   "email" => $email,
   "gender" => $gender,
   "education" => $b ,
   "country" => $country,
   "address" => $address
));
 if($success) {
echo "<script type=\"text/javascript\">".
        "alert('success');".
        "</script>";

      } else {
   echo 'not';
   }
}

?>

<?php get_header(); ?>

 <div class container>
	
	<h2 class="text-danger text-center">Registation in WordPress</h2>
			

	<form method="post" action="">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control col-lg-5" placeholder="Username">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="emai" name="email" class="form-control col-lg-5" placeholder="Email">
				</div>
				
				<div class="form-group">
					<label for="gender">Gender</label>
					<input type="radio" name="gender" value="Male"> Male <input type="radio" name="gender" value="Femail"> Female
				</div>

				<div class="form-group">
					<label for="education">Education :</label>
					<input type="checkbox" name="education[]" value="10th"> 10th
					<input type="checkbox" name="education[]" value="12th"> 12th
					<input type="checkbox" name="education[]" value="B.sci"> B.sci 
				</div>
				<div class="form-group">
					<label for="country">Country</label>
					<select name="country" >
						<option value="">Select Your Country </option>
						<option value="Inadia">India</option>
						<option value="U.S.A">U.S.A</option>
						<option value="U.K">U.K</option>	
					</select>
				</div>
				
				<div class="form-group">
					<label for="address">Address</label>
					<textarea name="address" class="form-control col-lg-5" placeholder="Address"></textarea>
				</div>
				<input type="submit" name="submit" value="Submit" class="btn btn-warning">
				<input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
			</form>


		<?php get_sidebar(); ?>
		
	</div><!-- /container -->
	
	<?php get_footer();

?>
