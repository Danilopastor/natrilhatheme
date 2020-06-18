<?php
if ( (bool) get_the_author_meta( 'description' ) ) : ?>
<div class="author-bio">
    <div class="author-gravatar">
        <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '50' ); }?>
    </div>
	<div class="author-description">
        <h2 class="author-title">
                <?php echo get_the_author() ?>
        </h2>
        <p><a target="_blank" href="https://twitter.com/<?php the_author_meta( 'twitteruser' ); ?>" ><?php the_author_meta( 'twitteruser' ); ?></a></p>
        <!--<p><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">ver mais posts</a></p> -->
    </div>
</div><!-- .author-bio -->
<?php endif; ?>