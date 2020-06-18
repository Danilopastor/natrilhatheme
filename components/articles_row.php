<!-- //articles-row -->
<?php global $filters; ?>
<div class="row article-row">
    <div class="col-md-12 row-mid-1">
        <div class="row">

		<?php
		natrilha_component('box_article',array('categories' => $filters['box_article'][0]));
		natrilha_component('box_article',array('categories' => $filters['box_article'][1]));
		natrilha_component('box_article',array('categories' => $filters['box_article'][2]));
		natrilha_component('box_article',array('categories' => $filters['box_article'][3]));
		?>
        </div><!-- row-mid-1 -->
    </div>
</div>