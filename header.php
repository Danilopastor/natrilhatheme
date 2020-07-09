<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
	<?php
	  if(is_home()){
		  if(isset($_COOKIE['natrilha_initial'])){
			natrilha_component('header_page');
		  }
	  }else{
		  natrilha_component('header_page');
	  }
    ?>