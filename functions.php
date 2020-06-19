<?php
    global $post_removed;
    global $category_single;

    $filters = array(
        'post_feature' => [59,5,57],
        'articles_home' => [6],
        'box_article' => [179,58,59,5],

    );

    $post_removed = array();
    $weekday = array(
        'Domingo',
        'Segunda',
        'Terça',
        'Quarta',
        'Quinta',
        'Sexta',
        'Sábado'
    );
    $color_category = array(
        59 => ['bg-color' => "#440063", 'bg-image' => 'http://localhost/natrilhawp/wp-content/themes/natrilha/assets/image/bg-cat/natilha.jpg']
    );

    function natrilha_wp_scripts(){

        wp_enqueue_style('avenirlt_font','//db.onlinewebfonts.com/c/2a01178a765f83ae2b7764a3cfbe4303?family=Avenir+LT+Pro+45+Book');
        wp_enqueue_style('fontawesome_css', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
        wp_enqueue_style( 'icons_natrilha', get_stylesheet_directory_uri().'/assets/css/natrilha-icon.css' );

        wp_enqueue_style('style_css', get_stylesheet_uri());
        wp_enqueue_style('bootstrap_css', get_stylesheet_directory_uri().'/assets/css/bootstrap.css');
        wp_enqueue_style('stylesheet_css', get_stylesheet_directory_uri().'/assets/css/stylesheet.css');
        

        wp_enqueue_script( 'bootstrap_bundle_js', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array('jquery'), '',true );
        wp_enqueue_script( 'script_js', get_template_directory_uri().'/assets/js/script.js', array(), '',true );
    }
    add_action( 'wp_enqueue_scripts', 'natrilha_wp_scripts');
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support(
        'post-formats',
        array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        )
    );
    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(136, 136, true);
        set_post_thumbnail_size(248, 177, true);
        add_image_size('side-thumb', 80, 70, true);
        add_image_size('related-thumb', 100, 100, true);
        add_image_size('300', 300, 300, true);
    }
    function getImagePost( $postId, $size = 'high' ){
    $retorno = wp_get_attachment_image_src( get_post_thumbnail_id( $postId ), $size );
    $retorno = ($retorno[0]) ? $retorno[0] : get_bloginfo('template_directory').'/assets/images/noimageavailable.png';
    return $retorno;
    }
    function format_date($date){
        $day = date("d",strtotime($date));
        $month = date("M",strtotime($date));

        switch($month){
            case "Jan" : $month = 'Jan'; break;
            case "Feb" : $month = 'Fev'; break;
            case "Mar" : $month = 'Mar'; break;
            case "Apr" : $month = 'Abr'; break;
            case "May" : $month = 'Maio'; break;
            case "June" : $month = 'Jun'; break;
            case "July" : $month = 'Jul'; break;
            case "Aug" : $month = 'Ago'; break;
            case "Sept" : $month = 'Set'; break;
            case "Oct" : $month = 'Out'; break;
            case "Nov" : $month = 'Nov'; break;
            case "Dec" : $month = 'Dez'; break;
        }

        $year = date("Y",strtotime($date));
        return "$day $month $year";
    }
    function natrilha_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'natrilha_excerpt_length'); 
    function natrilha_excerpt($text, $limit = 20){
        $words = explode(' ',$text);
        $new_text = '';
        $totalWD = 1;
        if(count($words) > $limit){
            foreach($words as $word):
                if($totalWD > $limit) break;
                $new_text .= $word;
                if($totalWD < $limit) : $new_text .= ' ';
                else : $new_text .= '...';
                endif;
                $totalWD++;
            endforeach;
        }else{
            $new_text = $text;
        }
        return $new_text; // Retorna o valor formatado
    }

    if ( function_exists('register_sidebar') )
    //Código para o widget.
    register_sidebar(array(
    'name' => __( 'Barra Lateral' ),
    'id' => 'side-bar',
    'description' => __( 'Area da Barra Lateral' ),
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    function register_navwalker(){
        require_once get_template_directory() . '/admin/menu/nav_menu.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'natrilha' ),
    ) );

    require_once(__DIR__."/widgets/tab/widget_tab.php");
    add_action('widgets_init', create_function('', 'return register_widget("WidgetTab");'));

    require_once(__DIR__."/widgets/subscribe/widget_subscribe.php");
    add_action('widgets_init', create_function('', 'return register_widget("SubscribeWidget");'));

    require_once(__DIR__."/admin/profile_fields.php");

    function natrilha_component($file,$props = false){
        $compentdir = __DIR__."/components";
        return require($compentdir.'/'.$file.'.php');
    }