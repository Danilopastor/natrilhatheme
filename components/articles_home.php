<?php 
	global $post_removed;
	global $weekday;
	$post_feature_box_1 = get_posts([
		'numberposts' => 5,
		'category'  => (isset($props['categories'])) ? $props['categories'][0] : null,
		'post_status' => 'publish',
		'post__not_in' => $post_removed
	]);
	$this_post = array();
	$countpost = 1;
	$categories = '';
	if($post_feature_box_1) :
	foreach( $post_feature_box_1 as $post ) :  setup_postdata($post);
		if($countpost <= 1 ){
			$categories = get_the_terms($post->ID,'category');
			$this_post[0][] = $post;
		}else{
			$this_post[1][] = $post;
		}
		$post_removed[] = $post->ID;
		$countpost++;
	endforeach; wp_reset_postdata();
     
?>
<!-- //articles-home -->
<div class="taxonomy-article">
   <div class="inner"><?php echo $categories[0]->name; ?></div>
</div><!-- taxonomy-aticle -->
<div class="row article-row">
	<?php foreach($this_post[0] as $post) :	?>
		<div class="col-md-7 col-sm-12 row-small-1 clearfix">
			<a href="<?php echo get_the_permalink($post->ID); ?>">
			<div class="inner">
				<div class="box-article-thumb"> <img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/></div>
				<div class="information text-box-pl-30">
					<h1 class="animation"><?php echo get_the_title($post->ID); ?></h1>
					<p><span><?php echo $weekday[date('w', strtotime(get_the_date('Y-m-d',$post->ID)))] .', '. get_the_date('',$post->ID); ?> - <?php echo get_the_author($post->ID) ?></span></p>
					<p><?php echo natrilha_excerpt(get_the_excerpt($post->ID),15); ?></p>
				</div>
			</div><!-- inner -->
	        </a>
		</div><!-- row-small-1 -->
	<?php endforeach; ?>
	<div class="col-md-5 col-sm-12 row-mid-1">
			<div class="row">
			<?php foreach($this_post[1] as $post) :	?>
				<div class="col-md-12 clearfix">
					<a href="<?php echo get_the_permalink($post->ID); ?>">
						<div class="row inner flex-collum-center">
								<div class="col-md-4 col-sm-12 box-article-thumb thumb-min"> <img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/></div>
								<div class="col-md-8 col-sm-12 information">
									<h1 class="animation"><?php echo get_the_title($post->ID); ?></h1>
									<p><span><?php echo get_the_date('',$post->ID); ?> - <?php echo get_the_author($post->ID) ?></span></p>
								</div>
						</div><!-- inner -->
					</a>	
				</div><!-- col-md-6 -->
			<?php endforeach; ?>
			</div>
	</div><!-- row-mid-1 -->
</div>
<?php endif; ?>