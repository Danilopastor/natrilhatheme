<?php
if($instancia['tab01'] != 'null' || $instancia['tab02'] != 'null') :
?>
<div class="tab-aside">
    <div class="row title-content-aside">
        <?php if($instancia['tab01'] != 'null') : ?>
            <div class="<?php if($instancia['tab02'] == 'null') { echo "col-md-12"; }else{ echo "col-md-6"; } ?> tab-content-row active" rel="tab-podcast"><span><i class="fas fa-podcast"></i> <?php echo $instancia['tab01_title'] ?></span></div>
        <?php endif; ?>
        <?php if($instancia['tab02'] != 'null') : ?>
            <div class="<?php if($instancia['tab01'] == 'null') { echo "col-md-12"; }else{ echo "col-md-6"; } ?> tab-content-row" rel="tab-colunas"><span><i class="fas fa-align-justify"></i> <?php echo $instancia['tab02_title'] ?></span></div>
        <?php endif; ?>
    </div><!-- title-content-aside -->
    <?php if($instancia['tab01'] != 'null') : ?>
    <div class="content-tab">
    	<div class="tab-content-inner tab-podcast tab-active">
            <?php
                    $tab_widget_01 = get_posts([
                        'numberposts' => 5,
                        'category'  => array($instancia['tab01']),
                        'post_status' => 'publish',
                    ]);
                    if($tab_widget_01) :
                    foreach( $tab_widget_01 as $post ) :  setup_postdata($post);
            ?>
    		<div class="row item-tab">
                <div class="col-md-4 thumb"><i class="fas fa-play animation"></i><img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/></div>
                <div class="col-md-8 content-item">
                    <h1><?php echo get_the_title($post->ID); ?></h1>
                    <p><?php echo natrilha_excerpt(get_the_excerpt($post->ID),10); ?></p>
            </div>
    		</div><!-- item-tab -->
            <?php endforeach; wp_reset_postdata(); else : ?>
                <div class="tab-content-empty">
                    <h1><i class="fab fa-ello"></i></h1>
                    <p>Sem conteúdo por aqui</p>
    		    </div>
            <?php endif; ?>
    	</div>
        <?php endif; ?>
        <?php if($instancia['tab02'] != 'null') : ?>
    	<div class="tab-content-inner tab-colunas">
            
            <?php
                    $tab_widget_02 = get_posts([
                        'numberposts' => 5,
                        'category'  => array($instancia['tab02']),
                        'post_status' => 'publish',
                    ]);
                    if($tab_widget_02) :
                    foreach( $tab_widget_02 as $post ) :  setup_postdata($post);
            ?>
    		<div class="row item-tab">
                <div class="col-md-4 thumb"><img class="animation" src="<?php echo getImagePost($post->ID) ?>" alt="<?php echo get_the_title($post->ID); ?>"/></div>
                <div class="col-md-8 content-item">
                    <h1><?php echo get_the_title($post->ID); ?></h1>
                    <p><?php echo natrilha_excerpt(get_the_excerpt($post->ID),10); ?></p>
            </div>
    		</div><!-- item-tab -->
            <?php endforeach; wp_reset_postdata(); else : ?>
                <div class="tab-content-empty">
                    <h1><i class="fab fa-ello"></i></h1>
                    <p>Sem conteúdo por aqui</p>
    		    </div>
            <?php endif; ?>

    	</div>
        <?php endif; ?>
    </div><!-- content-tab -->
</div><!-- tab-aside -->
<?php endif; ?>