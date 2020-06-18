<?php
class WidgetTab extends WP_Widget {

    /**
   * Construtor
   */
  public function WidgetTab() { parent::WP_Widget(false, $name = 'Tabs Lateral'); }

  /**
   * Exibição final do Widget (já no sidebar)
   *
   * @param array $argumentos Argumentos passados para o widget
   * @param array $instancia Instância do widget
   */
  public function widget($argumentos, $instancia) {
      if(is_home()) require(__DIR__."/widget_bar_view.php");
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

    $widget['tab01'] = $instancia['tab01'];
    $widget['tab01_icon'] = $instancia['tab01_icon'];
    $widget['tab01_title'] = $instancia['tab01_title'];
    $widget['tab02'] = $instancia['tab02'];
    $widget['tab02_title'] = $instancia['tab02_title'];
    $widget_tab_categories = get_categories();
    ?>
    <div class="widget-content">
        <p>
            <label for="<?php echo $this->get_field_id('tab01'); ?>">
            <?php _e('Categoria a exibir no Tab 1'); ?>
                <select
                    class="widefat"
                    id="<?php echo $this->get_field_id('tab01'); ?>"
                    name="<?php echo $this->get_field_name('tab01'); ?>"
                >
                <option value="null">Não Exibir</option>
                <?php foreach($widget_tab_categories as $widget_tab_category) :  ?>
                    <?php if($widget_tab_category->count > 0)  : ?>
                       <option value="<?php echo $widget_tab_category->term_id ?>" <?php if($widget['tab01'] == $widget_tab_category->term_id) echo "selected" ?>><?php echo $widget_tab_category->name ?></option>
                <?php endif; endforeach; ?>
                </select>
            </label>
            <label for="<?php echo $this->get_field_id('tab01_title'); ?>">
            <?php _e('Titulo do Botão'); ?>
                <input 
                    type="text"
                    class="widefat"
                    id="<?php echo $this->get_field_id('tab01_title'); ?>"
                    name="<?php echo $this->get_field_name('tab01_title'); ?>"
                    value="<?php echo $widget['tab01_title']; ?>"
                />
            </label>
        </p>
        <hr>
        <p>
            <label for="<?php echo $this->get_field_id('tab02'); ?>">
                <?php _e('Categoria a exibir no Tab 2'); ?>
                <select
                    class="widefat"
                    id="<?php echo $this->get_field_id('tab02'); ?>"
                    name="<?php echo $this->get_field_name('tab02'); ?>"
                >
                <option value="null">Não Exibir</option>
                <?php foreach($widget_tab_categories as $widget_tab_category) :  ?>
                    <?php if($widget_tab_category->count > 0)  : ?>
                       <option value="<?php echo $widget_tab_category->term_id ?>" <?php if($widget['tab02'] == $widget_tab_category->term_id) echo "selected" ?>><?php echo $widget_tab_category->name ?></option>
                <?php endif; endforeach; ?>
                </select>
            </label>
            <label for="<?php echo $this->get_field_id('tab02_title'); ?>">
                <?php _e('Titulo do Botão'); ?>
                <input 
                    type="text"
                    class="widefat"
                    id="<?php echo $this->get_field_id('tab02_title'); ?>"
                    name="<?php echo $this->get_field_name('tab02_title'); ?>"
                    value="<?php echo $widget['tab02_title']; ?>"
                />
            </label>
        </p>
    </div>
  <?php
  }

}