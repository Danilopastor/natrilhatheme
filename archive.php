<?php get_header(); ?>
<?php
global $color_category;
$category = single_term_title("", false);
$catid = get_cat_ID( $category );
?>
		<div class="mid-section page-archive animation">
            <div class="bg-page-archive" style="<?php if(isset($color_category[$catid])){ echo "background-color:".$color_category[$catid]['bg-color'].";"; } ?>">
                <img src="<?php echo $color_category[$catid]['bg-image'] ?>" />
            </div>
			<div class="container feature-home inner-page-archive">
                <?php natrilha_component('archive_page'); ?>
                <div class="article-home">
                 <?php natrilha_component('posts_list'); ?>
                </div>
			<div class="row colums-aticles-home">
				<div class="col-md-8 article-home">
                     <?php natrilha_component('box-format-blog'); ?>
				</div><!-- article-home -->
				<div class="col-md-4 aside-home">
				   <?php get_sidebar(); ?>
				</div><!-- aside-home -->
			</div><!-- colums-aticles-home -->
			</div>
		</div>
    </div>
<?php get_footer(); ?>