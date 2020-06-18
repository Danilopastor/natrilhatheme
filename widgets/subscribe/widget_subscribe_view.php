<?php 
$iconposition = -57*-2;
?>
<div id="widget-subscribe" class="tab-aside">
    <div class="title-content-aside">
        <div class="side-content">
           <span>Assine o Podcast</span>
        </div>
    </div>
    <div class="content-widget-subscribe">
        <ul>

            <?php if(isset($instancia['widget_subscribe_apple']) and $instancia['widget_subscribe_apple'] != '' ) : ?>
            <li><a class="animation" href="<?php echo$instancia['widget_subscribe_apple']; ?>">
            <div class="icon"
                style="background-image:url('<?php echo get_bloginfo('template_directory')  ?>/assets/image/modern_icon_sprite.svg');background-position: <?php echo $iconposition; ?>px 0;">
            </div>
            <div class="name animation">Apple Podcasts</div></a></li>
            <?php endif; ?>

            <?php if(isset($instancia['widget_subscribe_google']) and $instancia['widget_subscribe_google'] != '' ) : ?>
            <li><a class="animation" href="<?php echo$instancia['widget_subscribe_google']; ?>">
            <div class="icon"
                style="background-image:url('<?php echo get_bloginfo('template_directory')  ?>/assets/image/modern_icon_sprite.svg');background-position: <?php echo $iconposition; ?>px -<?php echo 57*3; ?>px;">
            </div>
            <div class="name animation">Google Podcast</div></a></li>
            <?php endif; ?>

            <?php if(isset($instancia['widget_subscribe_spotify']) and $instancia['widget_subscribe_spotify'] != '' ) : ?>
            <li><a class="animation" href="<?php echo$instancia['widget_subscribe_spotify']; ?>">
            <div class="icon"
                style="background-image:url('<?php echo get_bloginfo('template_directory')  ?>/assets/image/modern_icon_sprite.svg');background-position: <?php echo $iconposition; ?>px -<?php echo 57*6; ?>px;">
            </div>
            <div class="name animation">Spotify</div></a></li>
            <?php endif; ?>

            <?php if(isset($instancia['widget_subscribe_android']) and $instancia['widget_subscribe_android'] != '' ) : ?>
            <li><a class="animation" href="<?php echo$instancia['widget_subscribe_android']; ?>">
            <div class="icon"
                style="background-image:url('<?php echo get_bloginfo('template_directory')  ?>/assets/image/modern_icon_sprite.svg');background-position: <?php echo $iconposition; ?>px -<?php echo 57*1; ?>px;">
            </div>
            <div class="name animation">Android</div></a></li>
            <?php endif; ?>

            <?php if(isset($instancia['widget_subscribe_email']) and $instancia['widget_subscribe_email'] != '' ) : ?>
            <li><a class="animation" href="<?php echo$instancia['widget_subscribe_email']; ?>">
            <div class="icon"
                style="background-image:url('<?php echo get_bloginfo('template_directory')  ?>/assets/image/modern_icon_sprite.svg');background-position: <?php echo $iconposition; ?>px -<?php echo 57*2; ?>px;">
            </div>
            <div class="name animation">Por Email</div></a></li>
            <?php endif; ?>

            <?php  if(isset($instancia['widget_subscribe_rss']) and $instancia['widget_subscribe_rss'] != '' ) : ?>
            <li><a class="animation" href="<?php echo$instancia['widget_subscribe_rss']; ?>">
            <div class="icon"
                style="background-image:url('<?php echo get_bloginfo('template_directory')  ?>/assets/image/modern_icon_sprite.svg');background-position: <?php echo $iconposition; ?>px -<?php echo 57*7; ?>px;">
            </div>
            <div class="name animation">RSS</div></a></li>
            <?php endif; ?>

        </ul>
    </div>
</div>