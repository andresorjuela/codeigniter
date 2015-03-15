<?php

// include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/f_error.inc.php';
// include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/serverDomainDbSetup.inc.php';
// include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/rotationSetup.inc.php';
 	
?>

<!DOCTYPE html><html lang='en'>

<html>

	<head>
	
	<?php echo $fonts_link;?>
	<?php echo $style_link;?>

	<meta charset="utf-8" />
	
	<?php
	// include('inc/google_analytics.htm');
	?>
	
	<?php 
	// include($_SERVER['DOCUMENT_ROOT'] . '/inc/page_title.inc.htm.php');
	// include($_SERVER['DOCUMENT_ROOT'] . '/inc/current_file.inc.php');
	?>

	</head>
	
	<body>
	
	<div id="wrapper">
	
		<div id="header">
		
			<?php $this->load->view('header'); ?>
		
		</div>
		
		<div id="navigation">
		
			<?php // $this->load->view('navigation'); ?>
		
		</div>
	
		
		<div id="main"> template <?php echo $user_menu; ?>
		
			<?php // $this->load->view('main'); ?>
		
		</div>
		
		<div id="footer">
		
			<?php // $this->load->view('footer'); ?>
		
		</div>

	</div> <!-- wrapper -->
	</body>
	
</html> 