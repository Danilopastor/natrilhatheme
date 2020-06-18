<?php 
	global $post_removed;
    global $weekday;
    global $catid;
	$box_format_blog = get_posts([
		'numberposts' => 10,
		'category'  =>  $catid,
		'post_status' => 'publish',
		'post__not_in' => $post_removed
	]);
?>
<div class="box-format-blog">
    <?php foreach($box_format_blog as $post) : setup_postdata($post);
        $post_removed[] = $post->ID;
        $categories = get_the_terms($post->ID,'category');
    ?>
    <a href="<?php echo get_the_permalink($post->ID); ?>">
        <div class="row item-post">
            <div class="col-md-4">
               <div class="box-article-thumb"> <img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/></div>
            </div>
            <div class="col-md-8">
                <div class="information">
                    <h1 class="animation"><?php echo get_the_title($post->ID); ?></h1>
                    <p class="excerpt"><i><?php echo natrilha_excerpt(get_the_excerpt(),15); ?></i></p>
                    <p class="excerpt"><span><i class="far fa-clock"></i> <?php echo $weekday[date('w', strtotime(get_the_date('Y-m-d',$post->ID)))] .', '. get_the_date('',$post->ID); ?> - <?php echo get_the_author($post->ID) ?></span></p>
				</div>
            </div>
        </div>
    </a>
    <?php endforeach; ?>
</div>