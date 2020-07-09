<?php
get_header();
global $filters;

if(isset($_COOKIE['natrilha_initial'])){
?>
		<div class="mid-section animation">
			<div class="container feature-home">
                <?php natrilha_component('post_feature',array( 'categories' => $filters['post_feature'] )); ?>
			<!--<div class="row ads-box ads-vertival">
				<img src="<?php bloginfo('template_directory'); ?>/assets/image/ads_1.jpg"/>
			</div>--><!-- ads-vertival -->
			<div class="row colums-aticles-home">
				<div class="col-md-8 col-sm-12 article-home">
					<?php natrilha_component('articles_home',array( 'categories' => $filters['articles_home'] )); ?>
					<?php natrilha_component('articles_row'); ?>
				</div><!-- article-home -->
				<div class="col-md-4 col-sm-12 aside-home">
				   <?php get_sidebar(); ?>
				</div><!-- aside-home -->
			</div><!-- colums-aticles-home -->
			</div>
		</div>
    </div>
<?php }else{
	natrilha_component('initial_page');
} ?>
<?php get_footer(); ?>