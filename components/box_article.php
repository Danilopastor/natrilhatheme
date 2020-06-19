<?php
	global $post_removed;
	global $weekday;
	global $category_single;
	$category_in = null;
	if($props['related'] && !is_page()){
		foreach($category_single as $category){
			$category_in[] = $category->term_id;
		}
	}

    $post_feature_box_1 = get_posts([
		'category__in' => ($category_in) ? $category_in : null,
    	'numberposts' => (isset($props['numberposts'])) ? $props['numberposts'] : 1,
    	'category'  => (isset($props['categories'])) ? $props['categories'][0] : null,
    	'post_status' => 'publish',
    	'post__not_in' => (!isset($props['numberposts'])) ? $post_removed : null
    ]);
    foreach( $post_feature_box_1 as $post ) :  setup_postdata($post);
    $post_removed[] = $post->ID;
	$categories = get_the_terms($post->ID,'category');
	$cat_nums = count($categories);
?>
<!-- //box-article -->
<div class="col-md-3 col-sm-12 clearfix item-small">
    <a href="<?php echo get_the_permalink($post->ID); ?>">
    <div class="inner">
        <div class="taxonomy-mid-article animation"><?php echo $categories[array_rand($categories,1)]->name;?></div>
    		<div class="box-article-thumb"><img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/></div>
    		<div class="information">
    			<h1 class="animation"><?php echo get_the_title($post->ID); ?></h1>
    			<p><span><?php echo $weekday[date('w', strtotime(get_the_date('Y-m-d',$post->ID)))] .', '. get_the_date('',$post->ID); ?></span></p>
    		</div>
	</div><!-- inner -->	
	</a>
</div><!-- col-md-3 -->
<?php endforeach; wp_reset_postdata(); ?>