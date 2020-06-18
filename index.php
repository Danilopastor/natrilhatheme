<?php get_header(); ?>
		<div class="mid-section animation">
			<div class="container feature-home">
                <?php natrilha_component('post_feature',array( 'categories' => [2,3,4] )); ?>
			<div class="row ads-box ads-vertival">
				<img src="<?php bloginfo('template_directory'); ?>/assets/image/ads_1.jpg"/>
			</div><!-- ads-vertival -->
			<div class="row colums-aticles-home">
				<div class="col-md-8 article-home">
					<?php natrilha_component('articles_home',array( 'categories' => [5] )); ?>
					<?php natrilha_component('articles_row'); ?>
				</div><!-- article-home -->
				<div class="col-md-4 aside-home">
				   <?php get_sidebar(); ?>
				</div><!-- aside-home -->
			</div><!-- colums-aticles-home -->
			</div>
		</div>
    </div>
<?php get_footer(); ?>