<?php

/*

Template Name:  Display Data in Wordpress Custom Template Code

*/

get_header(); ?>

	
	<!-- site-contaiener -->
	
 <div class container>
	
	<h2 class="text-danger text-center">Registation in WordPress</h2>
		
		<h2 class="text-danger text-center">Fetch Records in WordPress</h2>
			
<?php 

 global $wpdb;
 $results = $wpdb->get_results("select * from registration");
 echo '<table class="table">
  <tr>
    <th>Username</th>
    <th>Email</th>
    <th>Gender</th>
 	<th>Education</th>
 	<th>country</th>
 	<th>Address</th>
  </tr>';

 foreach( $results as $user_data) {
 echo "<tr>
    <td>$user_data->username</td>
    <td>$user_data->email</td>
    <td>$user_data->gender</td>
    <td>$user_data->education</td>
     <td>$user_data->country</td>
    <td>$user_data->address</td>

  </tr>";

 }
 echo '</table>';
 



?>

		<?php get_sidebar(); ?>
		
	</div><!-- /container -->
	
	<?php get_footer();

?>
