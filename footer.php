<footer>
    <div class="container">
        <div class="row inner">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <p class="text-medium-centered">Copyright © 2020 <i class="icon-icon_natrilha f18" ></i> natrilha. Todos os direitos reservados - Versão Beta 2.0</p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</footer>
<div class="mobile-menu animation">
				<div class="container inner-menu">
					<?php 
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
						'container'       => 'div',
						/*'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'bs-example-navbar-collapse-1',
						'menu_class'      => 'navbar-nav mr-auto',*/
						'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						'walker'          => new WP_Bootstrap_Navwalker(),
					) );
					?>
					<div class="icon-search"></div>
                </div>
                <div id="toogle-menu" class="close"><i class="fa fa-bars" aria-hidden="true"></i></div>
</div>
<?php wp_footer(); ?>
</body>
</html>