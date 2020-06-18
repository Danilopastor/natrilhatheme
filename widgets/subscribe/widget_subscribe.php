<?php
class SubscribeWidget extends WP_Widget {

    /**
   * Construtor
   */
  public function SubscribeWidget() { parent::WP_Widget(false, $name = 'Assine o Podcast'); }

  public function widget_tab_admin_enqueue(){
    global $pagenow;

    if($pagenow == 'widgets.php'){
        
    }
    wp_enqueue_style('widget_css', get_stylesheet_directory_uri().'/assets/css/widgets.css');
  }
  /**
   * Exibição final do Widget (já no sidebar)
   *
   * @param array $argumentos Argumentos passados para o widget
   * @param array $instancia Instância do widget
   */
  public function widget($argumentos, $instancia) {
      add_action('admin_enqueue_scripts', $this->widget_tab_admin_enqueue());
      require(__DIR__."/widget_subscribe_view.php");
  }

  /**
   * Salva os dados do widget no banco de dados
   *
   * @param array $nova_instancia Os novos dados do widget (a serem salvos)
   * @param array $instancia_antiga Os dados antigos do widget
   */
  public function update($nova_instancia, $instancia_antiga) {
    $instancia = array_merge($instancia_antiga, $nova_instancia);
    return $instancia;
  }

  /**
   * Formulário para os dados do widget (exibido no painel de controle)
   *
   * @param array $instancia Instância do widget
   */
  public function form($instancia) {

    $widget['widget_subscribe_apple'] = $instancia['widget_subscribe_apple'];
    $widget['widget_subscribe_google'] = $instancia['widget_subscribe_google'];
    $widget['widget_subscribe_spotify'] = $instancia['widget_subscribe_spotify'];
    $widget['widget_subscribe_android'] = $instancia['widget_subscribe_android'];
    $widget['widget_subscribe_email'] = $instancia['widget_subscribe_email'];
    $widget['widget_subscribe_rss'] = $instancia['widget_subscribe_rss'];

    $fields = array();
    $fields[] = [
        "icon" => "-30px 0",
        "placeholder" =>"Link do Podcast na iTunes",
        "value" => 'widget_subscribe_apple'
    ];
    $fields[] = [
        "icon" => "-30px -90px",
        "placeholder" =>"Link do Podcast na Google",
        "value" => 'widget_subscribe_google'
    ];
    $fields[] = [
        "icon" => "-30px -180px",
        "placeholder" =>"Link do Podcast no Spotify",
        "value" => 'widget_subscribe_spotify'
    ];
    $fields[] = [
        "icon" => "-30px -30px",
        "placeholder" =>"Link do Podcast no Android",
        "value" => 'widget_subscribe_android'
    ];
    $fields[] = [
        "icon" => "-30px -60px",
        "placeholder" =>"Link do Podcast no Email",
        "value" => 'widget_subscribe_email'
    ];
    $fields[] = [
        "icon" => "-30px -210px",
        "placeholder" =>"Link Rss do podcast",
        "value" => 'widget_subscribe_rss'
    ];
    ?>
    <div class="widget-content">
        <p>
            <?php foreach($fields as $field) : ?>
            <div style="margin-bottom:5px;">
                <label for="<?php echo $this->get_field_id($field['value']); ?>" style="display:flex">
                <div style="width: 30px;height: 30px;background-image: url('<?php echo get_bloginfo('template_directory')  ?>/assets/image/modern_icon_sprite.svg');background-size: 90px;background-position: <?php echo $field['icon']; ?>;"></div>
                    <input 
                        type="text"
                        id="<?php echo $this->get_field_id($field['value']); ?>"
                        name="<?php echo $this->get_field_name($field['value']); ?>"
                        value="<?php echo $widget[$field['value']]; ?>"
                        placeholder="<?php echo $field['placeholder'] ?>"
                        style="width: 350px;margin-left: 10px;"
                    />
                </label>
            </div>
            <?php endforeach; ?>
        </p>
    </div>
  <?php
  }

}