
<?php
	  if(is_home()){
		if(isset($_COOKIE['natrilha_initial'])){
		  natrilha_component('footer_page');
		}
	}else{
		natrilha_component('footer_page');
	}
wp_footer();
?>
</body>
</html>