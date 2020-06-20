<?php global $tDir; 
global $array_query;
global $data;
?>

<?php 			
		// $currentQuery = $_GET['s']; 
		// $counter = $_COOKIE['_counter']; // set counter variable

		// if(!$_COOKIE['_querys']){ // if _QUERY cookie
		// $default = 1; // set default value to 1
		// setcookie("_counter",$default,time()+7200); // set counter cookie
		// setcookie("_querys[$default]",$currentQuery, time()+3600); // set cookie  
		// }
		// else{ // if ! _Pages cookie 
		// $default = $counter+1; // set default value to +1
		// setcookie("_counter",$default,time()+7200); // set counter cookie
		// }

		// if(@in_array($currentQuery, @$_COOKIE['_querys'])){ // if same query found
		// }
		// else{ // if new query found
		// setcookie("_querys[$default]",$currentQuery, time()+3600); // set cookie  
		// }

		// $array_query = $_COOKIE['_querys'];


 ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=11">
	<meta name="format-detection" content="telephone=no"/>
	<script type="text/javascript">
	var siteUrl = '<?= get_site_url() ?>';
	</script>
	<?php wp_head(); ?>
	<link rel='stylesheet' id='sancho-css'  href='<?php echo $tDir; ?>/css/styles.css' type='text/css' media='all' />
	<link rel='stylesheet' id='sancho-css'  href='<?php echo $tDir; ?>/css/styles_responsive.css' type='text/css' media='all' />
	<link rel='stylesheet' id='sancho-css'  href='<?php echo $tDir; ?>/css/jquery-ui.css' type='text/css' media='all' />
	<link rel='stylesheet' id='sancho-css'  href='<?php echo $tDir; ?>/slick/slick.css' type='text/css' media='all' />
	<link rel='stylesheet' id='sancho-css'  href='<?php echo $tDir; ?>/slick/slick-theme.css' type='text/css' media='all' />
	
</head>