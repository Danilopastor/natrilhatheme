<?php 
global $post_removed;
global $weekday;
global $catid;

?>
<!-- //post-feature -->
<h1 class="title-archive"><?php single_cat_title(); ?></h1>
<div class="row">
                    <?php
							$post_category = get_posts([
								'category' => array($catid),
								'numberposts' => 2,
								'post_status' => 'publish',
								'post__not_in' => $post_removed
							]);
							foreach( $post_category as $post ) :  setup_postdata($post);
							$post_removed[] = $post->ID;
							$categories = get_the_terms($post->ID,'category');
					?>
					<div class="col-md-6 item">
						<a href="<?php echo get_the_permalink($post->ID); ?>">
					        <div class="inner-item w-item">
						        <img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/>
								<div class="information-post center-row animation">
									<h1><?php echo get_the_title($post->ID); ?></h1>
									<p><?php echo $weekday[date('w', strtotime(get_the_date('Y-m-d',$post->ID)))] .', '. get_the_date('',$post->ID); ?> - <?php echo get_the_author($post->ID) ?></p>
								</div>
							</div>
						</a>
					</div>
					<?php endforeach; wp_reset_postdata(); ?>
</div> <!-- row 1 -->