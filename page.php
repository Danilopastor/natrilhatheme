<?php get_header(); ?>
		<div class="mid-section animation">
			<div class="container not-home">
			<div class="row colums-aticles-home">
				<div class="col-md-9 article-home">
					<?php natrilha_component('content_post',array( 'categories' => [5] )); ?>
				</div><!-- article-home -->
				<div class="col-md-3 aside-home">
				   <?php get_sidebar(); ?>
				</div><!-- aside-home -->
			</div><!-- colums-aticles-home -->
			</div>
		</div>
    </div>
<?php get_footer(); ?>