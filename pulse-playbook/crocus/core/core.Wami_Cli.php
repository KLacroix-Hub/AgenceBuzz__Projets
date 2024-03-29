<?

class Wami_Cli {

	/**
	 * Returns 'Hello World'
	 */
	public function hello_world() {
		WP_CLI::line( 'Hello World!' );
	}

	private function format_name($name){
		$name = str_replace('-', '_', $name);
		$name = str_replace(' ', '_', $name);
		$name = ucwords($name, '_');
		return $name;
	}

	private function create_file($file_path, $tpl){
		$path = get_template_directory() . $file_path;
		if(file_exists($path)){
			WP_CLI::line('| 🛑 Le fichier "' . $file_path . '" existe déjà.');
			return false;
		}else{
			$file = fopen($path, "w");
			fwrite($file, $tpl);
			WP_CLI::line('| ✅ Le fichier "' . $file_path . '" à été créé.');
			return true;
		}
	}

	private function echo_head(){
		WP_CLI::line('');
		WP_CLI::line('==============================================================================================');
		WP_CLI::line('| ');
	}

	private function echo_footer(){
		WP_CLI::line('| ');
		WP_CLI::line('==============================================================================================');
		WP_CLI::line('');
	}

	/**
	 * Returns 'Post'
	 */
	public function add_model_taxonomy($args) {

		$name = $this->format_name($args[0]);
		$taxonomy = strtolower(Helper::slugify($args[0]));
		
		$tpl = <<<'EOT'
		<?php
		class {name} extends Term
		{
			const TAXONOMY = "{taxonomy}";
		}
		EOT;

		$this->echo_head();

		$tpl = str_replace('{name}', $name, $tpl);
		$tpl = str_replace('{taxonomy}', $taxonomy, $tpl);

		$file_path = '/crocus/theme/terms/term.' . $name  . '.php';
		$is_ok = $this->create_file($file_path, $tpl);

		if($is_ok){
			
			$retour = <<<'EOT'
			'{taxonomy}' => [
				[],
				[
						'labels' => [
								'name' => '{name}',
								'singular_name' => '{name}s',
						],
						'public' => true,
						'show_ui' => true,
						'show_in_nav_menus' => false,
						'show_tagcloud' => false,
						'show_admin_column' => false,
						'hierarchical' => true,
						'meta_box_cb' => false,
				]
			],
			EOT;
	
			$retour = str_replace('{taxonomy}', $taxonomy, $retour);
			$retour = str_replace('{name}', $name, $retour);
			
			WP_CLI::line('|');
			WP_CLI::line('| 👉 Inclure le fichier dans crocus/theme.php');
			WP_CLI::line('|    require $functions_directory . \'/theme/terms/term.' . $name  . '.php\';');
			WP_CLI::line('|');
			WP_CLI::line('| 👉 Déclarer la taxonomy dans wp');
			WP_CLI::line('|    En Copier le code si dessous dans le tableau du fichier crocus/configs/taxonomy.php :');
			WP_CLI::line('|');
			WP_CLI::line('---------------------------------------------------------------------------------------------');
			WP_CLI::line('');
			WP_CLI::line(' '. $retour);
			WP_CLI::line('');
			WP_CLI::line('---------------------------------------------------------------------------------------------');

			
		}

	}

	/**
	 * Returns 'Post'
	 */
	public function add_model_post($args) {

		$name = $this->format_name($args[0]);
		$post_type = strtolower(Helper::slugify($args[0]));
		
		$tpl = <<<'EOT'
		<?php
		class {name} extends Post
		{
			const POST_TYPE = "{post_type}";
		}
		EOT;

		$this->echo_head();

		$tpl = str_replace('{name}', $name, $tpl);
		$tpl = str_replace('{post_type}', $post_type, $tpl);
		
		$file_path = '/crocus/theme/posts/post.' . $name  . '.php';
		$post_is_ok = $this->create_file($file_path, $tpl);

		$tpl = '<?php get_header();

		while (have_posts()):
				the_post();
				${post_type} = new {name}($post);
		
				
		endwhile;
		
		get_footer();
		';

		$tpl = str_replace('{name}', $name, $tpl);
		$tpl = str_replace('{post_type}', $post_type, $tpl);
		
		$file_path = '/single-' . $post_type  . '.php';
		$is_ok = $this->create_file($file_path, $tpl);
		
		if($post_is_ok){
			
			$retour = <<<'EOT'
			'{post_type}' => [
				'labels' => [
						'name' => __('{name}s'),
						'singular_name' => __('{name}'),
				],
				'public' => true,
				'has_archive' => false,
				'rewrite' => ['slug' => '{post_type}'],
				'menu_position' => 5,
				'menu_icon' => 'dashicons-carrot',
			]
			EOT;
	
			$retour = str_replace('{post_type}', $post_type, $retour);
			$retour = str_replace('{name}', $name, $retour);
			
			WP_CLI::line('|');
			WP_CLI::line('| 👉 Inclure le fichier dans crocus/theme.php');
			WP_CLI::line('|    require $functions_directory . \'/theme/posts/post.' . $name  . '.php\';');
			WP_CLI::line('|');
			WP_CLI::line('| 👉 Déclarer le post_type dans wp');
			WP_CLI::line('|    En Copier le code si dessous dans le tableau du fichier crocus/configs/post_type.php :');
			WP_CLI::line('|');
			WP_CLI::line('---------------------------------------------------------------------------------------------');
			WP_CLI::line('');
			WP_CLI::line(' '. $retour);
			WP_CLI::line('');
			WP_CLI::line('---------------------------------------------------------------------------------------------');

			
		}

		$this->echo_footer();

	}

	/**
	 * Returns 'Page'
	 */
	public function add_model_page($args) {

		$name = $this->format_name($args[0]);

		$_tpl = <<<'EOT'
		<?php
		class Page_{name} extends Page
		{
		}
		EOT;

		$this->echo_head();

		$tpl = str_replace('{name}', $name, $_tpl);

		$file_path = '/crocus/theme/pages/page.Page_' . $name  . '.php';
		$is_ok = $this->create_file($file_path, $tpl);
		if($is_ok){
			WP_CLI::line('|');
			WP_CLI::line('| 👉 Inclure le fichier dans crocus/theme.php');
			WP_CLI::line('|    require $functions_directory . \'/theme/pages/theme.Page_' . $name  . '.php\';');
		}

		$this->echo_footer();

	}

	/**
	 * Returns 'tpl'
	 */
	public function add_template($args) {
				
		$_tpl = <<<'EOT'
		<?php /*
		Template Name: TPL - {name}
		*/
		
		get_header();
		
		while (have_posts()):
				the_post();
				$page = new Page($post);
		endwhile;
		
		get_footer();
		EOT;

		$this->echo_head();

		$slug = Helper::slugify(strtolower($args[0]));
		
		$tpl = str_replace('{name}', ucfirst($args[0]), $_tpl);
		
		$file_path = '/templates/tpl-' . $slug  . '.php';
		$is_ok = $this->create_file($file_path, $tpl);

		$this->echo_footer();

	}

	/**
	 * Returns 'Organisme'
	 */
	public function add_organisme($args) {

		$this->echo_head();

		$config_path = get_template_directory() . '/crocus/configs';
		$config = include $config_path . '/config-assets.php';

		$slug = Helper::slugify(strtolower($args[0]));
		
		$_tpl = '<section class="o-{name} <?php echo $class_css ?>"></section>';
		$tpl = str_replace('{name}', $slug, $_tpl);
		$file_path = '/templates/organismes/o-' . $slug  . '.php';
		$is_ok = $this->create_file($file_path, $tpl);

		$_tpl = '.o-{name}{}';
		$tpl = str_replace('{name}', $slug, $_tpl);

		$file_path = '/'. $config['assets']['css']['dev']. '/_THEME/organismes/o-' . $slug  . '.scss';
		$is_ok = $this->create_file($file_path, $tpl);
		if($is_ok){
			WP_CLI::line('|');
			WP_CLI::line('| 👉 Inclure le fichier dans mains.scss ');
			WP_CLI::line('|    @import \'_THEME/organismes/o-' . $slug  . '\';');
		}

		$this->echo_footer();

	}

	/**
	 * Returns 'Component'
	 */
	public function add_molecule($args) {

		$config_path = get_template_directory() . '/crocus/configs';
		$config = include $config_path . '/config-assets.php';

		$slug = Helper::slugify(strtolower($args[0]));
		$_tpl = '<div class="m-{name} <?php echo $class_css ?>"></div>';
		$tpl = str_replace('{name}', $slug, $_tpl);
		
		$this->echo_head();

		$file_path = '/templates/molecules/m-' . $slug  . '.php';
		$is_ok = $this->create_file($file_path, $tpl);

		$_tpl = '.m-{name}{}';
		$tpl = str_replace('{name}', $slug, $_tpl);

		$file_path = '/'. $config['assets']['css']['dev']. '/_THEME/molecules/m-' . $slug  . '.scss';
		$is_ok = $this->create_file($file_path, $tpl);
		if($is_ok){
			WP_CLI::line('|');
			WP_CLI::line('| 👉 Inclure le fichier dans mains.scss ');
			WP_CLI::line('|    @import \'_THEME/molecules/m-' . $slug  . '\';');
		}

		$this->echo_footer();

	}


	/**
	 * Returns 'Component'
	 */
	public function add_atome($args) {

		$config_path = get_template_directory() . '/crocus/configs';
		$config = include $config_path . '/config-assets.php';

		$slug = Helper::slugify(strtolower($args[0]));
		$_tpl = '<div class="a-{name} <?php echo $class_css ?>"></div>';
		$tpl = str_replace('{name}', $slug, $_tpl);
		
		$this->echo_head();

		$file_path = '/templates/atomes/a-' . $slug  . '.php';
		$is_ok = $this->create_file($file_path, $tpl);

		$_tpl = '.a-{name}{}';
		$tpl = str_replace('{name}', $slug, $_tpl);

		$file_path = '/'. $config['assets']['css']['dev']. '/_THEME/atomes/a-' . $slug  . '.scss';
		
		$is_ok = $this->create_file($file_path, $tpl);
		if($is_ok){
			WP_CLI::line('|');
			WP_CLI::line('| 👉 Inclure le fichier dans mains.scss ');
			WP_CLI::line('|    @import \'_THEME/atomes/a-' . $slug  . '\';');
		}

		$this->echo_footer();

	}
	
}

/**
 * Registers our command when cli get's initialized.
 *
 * @since  1.0.0
 * @author Scott Anderson
 */
function wami_cli_register_commands() {
	WP_CLI::add_command( 'wacli', 'Wami_Cli' );
}

add_action( 'cli_init', 'wami_cli_register_commands' );