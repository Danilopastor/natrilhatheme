<?php

$taglist = get_the_tags();

$colors = array('rgba(255, 114, 36, 1);','rgba(65, 48, 142, 1);','rgb(255, 0, 0);','rgb(0, 37, 255);');
$keycolor = 0;
if($taglist) :
?>
<div class="meta-box">
    <p class="meta-title">Mais Sobre</p>
    <ul class="meta-tags">
        <?php
           
            foreach($taglist as $tag) :
            if($keycolor == count($colors)) $keycolor = 0;
        ?>
        <li><a href="<?php echo get_tag_link($tag) ?>" style="border-left-color: <?php echo $colors[$keycolor]; ?>"><?php echo $tag->name ?></a></li>
        <?php $keycolor++; endforeach; ?>
    </ul>
</div>
<?php endif; ?>