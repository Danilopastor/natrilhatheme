<!-- //content-post -->
<?php
    global $weekday;
    global $category_single;
    while ( have_posts() ) :
    the_post();

    $category_single = get_the_terms(get_the_ID(), 'category');
?>
<div class="article-row content">
		<div class="row-small-1 clearfix">
            <div class="information-box">
                <div class="category-name">
                    <ul>

                        <?php if($category_single) : foreach($category_single as $category): ?>
                            <a href="<?php echo get_category_link($category); ?>">
                                <li><?php echo $category->name; ?></li>
                            </a>
                        <?php endforeach; endif; ?>
                    </ul>
                </div>
                <div class="data-post"><p><span><i class="far fa-clock"></i> <?php echo $weekday[date('w', strtotime(get_the_date('Y-m-d')))] .', '. get_the_date(); ?></span></p></div>
            </div>
            <div class="taxonomy-article">
                     <div class="inner"><h1><?php echo get_the_title(); ?></h1></div>
                     <p class="excerpt"><i><?php echo natrilha_excerpt(get_the_excerpt(),20); ?></i></p>
            </div><!-- taxonomy-aticle -->
			<div class="inner">
                <div class="box-post-thumb"><img class="animation" src="<?php echo getImagePost(get_the_ID()) ?>" alt="<?php echo get_the_title(get_the_ID()); ?>"/></div>
                <div class="row box-content">
                    <div class="col-md-3 data_post">
                        <?php natrilha_component('author_bio'); ?>
                        <?php natrilha_component('share_post'); ?>
                        <?php natrilha_component('tags'); ?>
                    </div>
                    <div class="col-md-9 the-post-content">
                        <?php echo the_content(); ?>
                    </div>
                </div>
			</div><!-- inner -->
		</div><!-- row-small-1 -->
        <?php  endwhile; ?>
        <?php natrilha_component('related'); ?>
</div>