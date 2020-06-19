<?php 
	global $post_removed;
    global $weekday;
    global $catid;
	$post_feature_box_1 = get_posts([
		'numberposts' => 4,
		'category'  =>  $catid,
		'post_status' => 'publish',
		'post__not_in' => $post_removed
	]);
?>
<!-- //post-list -->
<div class="row article-row">
    <?php foreach($post_feature_box_1 as $post) : setup_postdata($post);
        $post_removed[] = $post->ID;
        $categories = get_the_terms($post->ID,'category');
        ?>
		<div class="col-md-3 col-sm-12 row-small-1 clearfix">
			<a href="<?php echo get_the_permalink($post->ID); ?>">
			<div class="inner">
				<div class="box-article-thumb"> <img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/></div>
				<div class="information">
					<h1 class="animation"><?php echo get_the_title($post->ID); ?></h1>
				</div>
			</div><!-- inner -->
	        </a>
		</div><!-- row-small-1 -->
	<?php endforeach; wp_reset_postdata(); ?>
</div>