<?php 
global $post_removed;
global $weekday;
?>
<!-- //post-feature -->
<div class="row">
					<div class="col-md-3 col-sd-12 item">
						<?php
							$post_feature_box_1 = get_posts([
								'numberposts' => 1,
								'category'  => (isset($props['categories'])) ? $props['categories'][0] : null,
								'post_status' => 'publish',
								'post__not_in' => $post_removed
							]);
							foreach( $post_feature_box_1 as $post ) :  setup_postdata($post);
							$post_removed[] = $post->ID;
							$categories = get_the_terms($post->ID,'category');
						?>
						<a href="<?php echo get_the_permalink($post->ID); ?>">
						    <div class="inner-item l-item">
								<img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php the_title(); ?>"/>
								<div class="information-post animation">
									<ul class="clearfix">
										<li class="animation"><?php echo $categories[0]->name; ?></li>
									</ul>
									<h1><?php echo get_the_title($post->ID); ?></h1>
								</div>
							</div>
						</a>
					    <?php endforeach; wp_reset_postdata(); ?>
				    </div>
					<div class="col-md-6 col-sd-12 item">
					    <?php
							$post_feature_box_2 = get_posts([
								'numberposts' => 1,
								'category'  => (isset($props['categories'])) ? $props['categories'][1] : null,
								'post_status' => 'publish',
								'post__not_in' => $post_removed
							]);
							foreach( $post_feature_box_2 as $post ) :  setup_postdata($post);
							$post_removed[] = $post->ID;
							$categories = get_the_terms($post->ID,'category');
						?>
						<a href="<?php echo get_the_permalink($post->ID); ?>">
					        <div class="inner-item w-item">
						        <img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/>
								<div class="information-post center-row animation">
									<ul class="clearfix">
										<li class="animation"><?php echo $categories[0]->name; ?></li>
									</ul>
									<h1><span class="titulo-podcast">NaTrilha #50</span> <?php echo get_the_title($post->ID); ?></h1>
									<p><?php echo $weekday[date('w', strtotime(get_the_date('Y-m-d',$post->ID)))] .', '. get_the_date('',$post->ID); ?> - <?php echo get_the_author($post->ID) ?></p>
								</div>
							</div>
						</a>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
					<div class="col-md-3 col-sd-12 item r-item">
					<?php
							$post_feature_box_3 = get_posts([
								'numberposts' => 2,
								'category'  => (isset($props['categories'])) ? $props['categories'][2] : null,
								'post_status' => 'publish',
								'post__not_in' => $post_removed
							]);
							foreach( $post_feature_box_3 as $post ) :  setup_postdata($post);
							$post_removed[] = $post->ID;
							$categories = get_the_terms($post->ID,'category');
					?>
					<a href="<?php echo get_the_permalink($post->ID); ?>">
						<div class="inner-item w-item rigth-mid-section">
						<img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/>
								<div class="information-post animation">
									<ul class="clearfix">
										<li class="animation"><?php echo $categories[0]->name; ?></li>
									</ul>
									<h1><?php echo get_the_title($post->ID); ?></h1>
								</div>
						</div>
						<div class="information-post information-mobile">
							<h1><?php echo get_the_title($post->ID); ?></h1>
							<p><?php echo natrilha_excerpt(get_the_excerpt($post->ID),15); ?></p>
						</div>
					</a>
					<?php endforeach; wp_reset_postdata(); ?>
					</div>
</div> <!-- row 1 -->