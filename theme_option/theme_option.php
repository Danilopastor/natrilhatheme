<?php
/**
 * Classe NatrilhaThemeOption - Carrega as opções do tema
 *
 * Este é um template básico para suas criações mais avançadas.
 */
 
// Verifica se a classe já existe
if ( ! class_exists('NatrilhaThemeOption') ) {

	// Cria a classe
	class NatrilhaThemeOption
	{
		// As opções
		protected $options;

		/**
		 * Construtor
		 *
		 * Carrega todas as funções.
		 */
		public function __construct () {
		
			// Variável de opções que está no functions.php
			global $natrilha_theme_option;
			
			// Configura as opções dentro da classe
			$this->options = $natrilha_theme_option;
				
			/* Essa classe só executa ações para a área administrativa */
			if ( is_admin() ) {
				
				// Carrega os scripts e styles necessários
				add_action( 
					'admin_enqueue_scripts', 
					array( $this, 'carrega_scripts' ) 
				);

				// Adiciona o menu de opções
				add_action('admin_menu', array( $this, 'adiciona_menu' ) );
				
				// Registra nossas opções
				add_action( 'admin_init', array( $this, 'registra_opcoes' ) );
			} // is_admin
			
		} // __construct
		
		/**
		 * Função para adicionar o menu na área administrativa
		 */
		public function adiciona_menu() {
		
			// Creates a page for editing the theme options
			add_theme_page(
				'Opções do tema',            // Título da página
				'Opções do tema',            // Título do menu
				'edit_themes',               // Permissões
				'natrilha_opcoes',        //	Slug do menu
				array( $this, 'admin_html' ) // Função de callback
			);
			
		} // adiciona_menu
		
		/**
		 * Função para registrar nossas opções
		 */
		public function registra_opcoes() {
		
			register_setting( 
				'natrilha_opcoes', 
				'natrilha_opcoes', 
				array( $this, 'valida_campos' ) // Função de callback
			);
			
		} // registra_opcoes
		
		// Callback para validar os campos enviados (se necessário)
		public function valida_campos( $input ) {
			
			// Vamos validar apenas o fundo, só para você entender
			/*if( isset( $input['feature-1'] ) ) {
				$input['feature-1'] = sanitize_text_field( $input['feature-1'] );
			}*/
			
			return $input;
			
		} // valida_campos
		
		/**
		 * Carrega a página HTML que será apresentada na área administrativa
		 */
		public function admin_html() {
            
        $categories = get_categories();
?>

<div class="wrap">

	<form method="post" action="options.php">
		<?php
			settings_fields( 'natrilha_opcoes' );
			do_settings_sections( 'natrilha_opcoes' );
		?>
		
		<h3>Opções do tema</h3>
			
		Posts Em Destaque:<br><br>
        <label for="natrilha_opcoes[feature-1]">
        <span>1- </span>
        <select name="natrilha_opcoes[feature-1]" >
            <?php foreach($categories as $category){ ?>
            <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'feature-1' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>

        <label for="natrilha_opcoes[feature-2]">
        <span>2- </span>
        <select name="natrilha_opcoes[feature-2]" >
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'feature-2' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>

        <label for="natrilha_opcoes[feature-3]">
        <span>3- </span>
        <select name="natrilha_opcoes[feature-3]" >
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'feature-3' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>

        <label for="natrilha_opcoes[feature-4]">
        <span>4- </span>
        <select name="natrilha_opcoes[feature-4]" >
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'feature-4' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>

        <label for="natrilha_opcoes[feature-5]">
        <span>5- </span>
        <select name="natrilha_opcoes[feature-5]" >
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'feature-5' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>

        <hr/>

        Atigos:<br><br>
        <label for="natrilha_opcoes[articles_home]">
        <span>1- </span>
        <select name="natrilha_opcoes[articles_home]" >
            <?php foreach($categories as $category){ ?>
            <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'articles_home' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>

        <hr/>

        Artigos unicos:<br><br>
        <label for="natrilha_opcoes[box-article-1]">
        <span>1- </span>
        <select name="natrilha_opcoes[box-article-1]" >
            <?php foreach($categories as $category){ ?>
            <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'box-article-1' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>

        <label for="natrilha_opcoes[box-article-2]">
        <span>2- </span>
        <select name="natrilha_opcoes[box-article-2]" >
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'box-article-2' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>

        <label for="natrilha_opcoes[box-article-3]">
        <span>3- </span>
        <select name="natrilha_opcoes[box-article-3]" >
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'box-article-3' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>

        <label for="natrilha_opcoes[box-article-4]">
        <span>4- </span>
        <select name="natrilha_opcoes[box-article-4]" >
            <?php foreach($categories as $category){ ?>
                <option value="<?php echo $category->term_id ?>" <?php if($category->term_id == esc_attr( natrilha_chk( $this->options, 'box-article-4' ))){ echo "selected"; } ?> ><?php echo $category->name ?></option>
            <?php } ?>
        </select>
        </label><br><br>
		
		<p>
			<?php submit_button(); ?>
		</p>
	</form>
</div>

<?php

		} // admin_html
		
		/**
		 * Carrega scripts e styles
		 */
		public function carrega_scripts() {
		
			// Caixa de upload de imagem
			wp_enqueue_script('media-upload');
			
			// Thickbox
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
			
			// Color picker (para cores)
			wp_enqueue_style( 'wp-color-picker' );
			
			// Nosso script
			wp_enqueue_script( 
				'admin_settings', 
				get_template_directory_uri() . '/js/admin-settings.js', 
				array('wp-color-picker'), 
				'1.0.0', 
				true 
			);
			
		} // carrega_scripts
	
	} // Class NatrilhaThemeOption

	// Carrega a classe
	$natrilha_opcoes = new NatrilhaThemeOption();
}