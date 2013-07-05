<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
    <title>
    	<?php wp_title('|', true, 'right'); ?>
    	<?php bloginfo('name'); ?>
    </title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	    
<div class="wrapper">

	<!-- Header Start -->
    <header class="header">    
		<h1 class="logo">
			<a href="<?php echo home_url(); ?>"></a>
        </h1>	
    </header>
	<!-- Header End -->
	        
	<!-- Nav Start -->
	<nav class="nav">
		<?php 
			wp_nav_menu( array( 
				'theme_location'	=> 'header-menu',
				'menu_class'		=> 'menu',
			) ); 
		?>
		<div class="clear"></div>
	</nav>
	<!-- Nav End -->
	        
	<!-- Main Start -->
	<div class="main-content">