<?php
/**************************************************************
 *
 * Class pour la gestions global du theme
 *
 **************************************************************/

class Theme
{
    public $config;
    public $env;
    public $post_types;
    public $taxonomy;
    public $image;
    public $routes;

    private static $instance;

    /**
     * Recupérer l'instance de la classe partout dans le theme
     */
    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new Theme();
        }

        return self::$instance;
    }

    function __construct()
    {
    }

    /**
     * Recuper un config
     */
    public function get_config($key)
    {
        return $this->config->$key;
    }

    ////// Setup

    /**
     * Installer le theme avec le bon environement
     */
    public function install($env, $lang = 'fr')
    {
        $this->env = $env;

        $config_path = get_template_directory() . '/crocus/configs';
        $conf = include $config_path . '/config.php';

        $conf_assets = include $config_path . '/config-assets.php';
        $conf_images = include $config_path . '/config-images.php';

        $this->config = (object) array_merge($conf, $conf_assets, $conf_images);
        $this->post_types = include $config_path . '/post-type.php';
        $this->taxonomy = include $config_path . '/taxonomy.php';
        $this->image = new Image($this->config);
        $url_route = $config_path . '/routes-' . $env . '-' . $lang;
        $this->routes = include $url_route . '.php';
    }

    /**
     * Lancer les hook de configuration wordpress
     */
    public function setup()
    {
        add_action('after_setup_theme', [$this, 'setup_theme_capabilities']);
        add_filter('wp_mail_content_type', [$this, 'mail_set_content_type']);
        //add_filter('wp_mail_from', [$this, 'mail_set_from']);
        //add_action('nav_menu_css_class', [$this, 'hook_current_nav_class'], 10, 2 );
        add_action('init', [$this, 'register_post_type']);
        /* déclaration du textdomain du theme, ici wami */
        add_action('after_setup_theme', [$this, 'hook_load_theme_textdomain']);
    }

    /**
     * Hook : textdomain
     */
    public function hook_load_theme_textdomain()
    {
        load_theme_textdomain(
            $this->get_config('textdomain'),
            get_template_directory() . '/languages'
        );
    }

    /**
     * Hook : customisation css du wysiwyg
     */
    public function setup_css_wysiwyg()
    {
        add_action('after_setup_theme', function () {
            add_editor_style('css/main.css');
        });
    }

    /**
     * Hook : Enregistrer les customs post type
     */
    public function register_post_type()
    {
        $post_types = $this->post_types;
        add_action('init', function () use ($post_types) {
            foreach ($post_types as $key => $params) {
                register_post_type($key, $params);
            }
        });
    }

    /**
     * Hook : Enregistrer les taxonomy
     */
    public function register_taxonomy()
    {
        foreach ($this->taxonomy as $key => $params) {
            register_taxonomy($key, $params[0], $params[1]);
        }
    }

    /**
     * Hook : Enregistrer les menus
     */
    public function setup_menus()
    {
        if (!isset($this->config->menus)) {
            return;
        }

        foreach ($this->config->menus as $menu) {
            register_nav_menu($menu['location'], $menu['description']);
        }
    }

    /**
     * Hook : Enregistrer les tailles d'images
     */
    public function setup_images()
    {
        $this->image->add_image_size();
        remove_image_size('1536x1536');
        remove_image_size('2048x2048');
        remove_image_size('large');
        remove_image_size('medium_large');

    }

    /**
     * Hook : Supprimer taille d'image par default
     */
    public function remove_default_images_sizes()
    {
        add_filter('remove_intermediate_image_sizes', function ($sizes) {
            unset($sizes['thumbnail'], $sizes['medium'], $sizes['large']);
            return $sizes;
        });
    }

    /**
     * Hook : Supprimer le champs post du menu
     */
    public function remove_default_post_type()
    {
        add_action('admin_menu', function () {
            remove_menu_page('edit.php');
        });
    }

    /**
     * Hook : Supprimer le champs commentaire
     */
    public function remove_default_comments()
    {
        add_action('admin_menu', function () {
            remove_menu_page('edit-comments.php');
        });
    }

    public function show_tags_in_sidebar()
    {
        add_action(
            'admin_menu',
            function () {
                add_menu_page(
                    'Tags',
                    'Tags',
                    'add_users',
                    'edit-tags.php?taxonomy=post_tag',
                    '',
                    'dashicons-tag',
                    6
                );
            },
            999
        );
    }

    /**
     * Hook : Setup de différents truc
     */
    public function setup_theme_capabilities()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);
        add_theme_support('post-formats', ['video', 'audio', 'link']);
        //add_post_type_support('post', 'post-formats');
        //remove_theme_support('post-formats');
    }

    /**
     * Hook : Setup des scripts
     */
    public function setup_script()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_script']);
    }

    /**
     * Hook : Enregistrer les customs category
     */
    public function setup_category_label()
    {
        add_action('init', function () {
            global $wp_taxonomies;
            $labels = &$wp_taxonomies['category']->labels;

            foreach ($this->config->category_label as $key => $label) {
                $labels->$key = $label;
            }
        });
    }

    /**
     * Hook : Enregistrer des labels différent pour les post wp
     */
    public function setup_post_label()
    {
        add_action('admin_menu', function () {
            global $menu;
            global $submenu;
            $menu[5][0] = $this->config->post_label['name'];
            $submenu['edit.php'][5][0] = $this->config->post_label['name'];
            $submenu['edit.php'][10][0] = $this->config->post_label['add'];
        });

        add_action('init', function () {
            global $wp_post_types;
            $labels = &$wp_post_types['post']->labels;
            $labels->name = $this->config->post_label['name'];
            $labels->singular_name = $this->config->post_label['name'];
            $labels->add_new = $this->config->post_label['add'];
            $labels->add_new_item = $this->config->post_label['add'];
            $labels->edit_item = $this->config->post_label['edit'];
            $labels->new_item = $this->config->post_label['name'];
            $labels->view_item = 'Voir';
            $labels->search_items = $this->config->post_label['search'];
            $labels->not_found = 'Aucun item trouvé';
            $labels->not_found_in_trash = 'Aucun item trouvé';
            $labels->all_items = 'Voir tout';
            $labels->menu_name = $this->config->post_label['name'];
            $labels->name_admin_bar = $this->config->post_label['name'];
        });
    }

    public function include_js_lib($lib, $dependances, $in_footer)
    {
        $theme_dir = get_template_directory_uri();
        $id = uniqid();
        if (filter_var($lib, FILTER_VALIDATE_URL)) {
            wp_enqueue_script($id, $lib, $dependances, '', $in_footer);
        } else {
            wp_enqueue_script(
                $id,
                $theme_dir . '/assets\/' . $lib,
                $dependances,
                '',
                $in_footer
            );
        }

        return $id;
    }

    public function include_css_lib($lib)
    {
        $theme_dir = get_template_directory_uri();
        $id = uniqid();

        if (filter_var($lib, FILTER_VALIDATE_URL)) {
            wp_enqueue_style($id, $lib);
        } else {
            wp_enqueue_style($id, $theme_dir . '/assets\/' . $lib);
        }

        return $id;
    }

    /**
     * Installer les scripts et les css
     */
    public function register_script()
    {
        $assets_version = '3';
        $theme_dir = get_template_directory_uri();
        //wp_enqueue_script('jquery');
        wp_deregister_script('jquery');
        $dependances = [];

        $in_footer = true;
        foreach ($this->config->libs as $tpl => $lib) {
            if (is_array($lib)) {
                if ($tpl == 'home') {
                    foreach ($lib as $sub_lib) {
                        if (is_front_page() || is_home()) {
                            $dependances[] = $this->include_js_lib(
                                $sub_lib,
                                $dependances,
                                $in_footer
                            );
                        }
                    }
                } elseif (is_page_template($tpl)) {
                    foreach ($lib as $key => $sub_lib) {
                        $dependances[] = $this->include_js_lib(
                            $sub_lib,
                            $dependances,
                            $in_footer
                        );
                    }
                }
            } else {
                $dependances[] = $this->include_js_lib(
                    $lib,
                    $dependances,
                    $in_footer
                );
            }
        }

        $main_path =
            $this->config->assets['js']['dist'] .
            '/' .
            $this->config->assets['js']['main'];

        wp_enqueue_script(
            'main',
            $theme_dir . '/' . $main_path . '?v=' . $assets_version,
            $dependances,
            '',
            $in_footer
        );

        wp_localize_script('main', 'wami_js', [
            'themeurl' => $theme_dir,
            'ajaxurl' => admin_url('admin-ajax.php'),
            'siteurl' => site_url(),
        ]);

        wp_localize_script('main', 'crocus_js', [
            'themeurl' => $theme_dir,
            'ajaxurl' => admin_url('admin-ajax.php'),
            'siteurl' => site_url(),
        ]);

        /*** Styles ***/
        $assets_version = '2';
        wp_enqueue_style('theme', get_stylesheet_uri());

        $main_path =
            $this->config->assets['css']['dist'] .
            '/' .
            $this->config->assets['css']['main'];

        wp_enqueue_style(
            'main',
            $theme_dir . '/' . $main_path . '?v=' . $assets_version
        );

        foreach ($this->config->libs_css as $tpl => $lib) {
            $id = uniqid();
            if (is_array($lib)) {
                if ($tpl == 'home') {
                    if (is_front_page() || is_home()) {
                        foreach ($lib as $sub_lib) {
                            $dependances[] = $this->include_css_lib($sub_lib);
                        }
                    }
                } elseif (is_page_template($tpl)) {
                    foreach ($lib as $key => $sub_lib) {
                        $dependances[] = $this->include_css_lib($sub_lib);
                    }
                }
            } else {
                $this->include_css_lib($lib);
            }
        }
    }

    /**
     * Configurartion global des mail
     */
    public function mail_set_content_type()
    {
        return 'text/html';
    }

    /**
     * Configurartion global des mail
     */
    public function mail_set_from()
    {
        return $this->config->mail_from;
    }

    public function hook_current_nav_class()
    {
        // global $post;
        // $id = ( isset( $post->ID ) ? get_the_ID() : NULL );
        // if (isset( $id )){
        //   $current_post_type = get_post_type_object(get_post_type($post->ID));
        //   $current_post_type_slug = $current_post_type->rewrite['slug'];
        //   $menu_slug = strtolower(trim($item->url));
        //   if (strpos($menu_slug,$current_post_type_slug) !== false) {
        //     $classes[] = 'current-menu-item';
        //   }
        // }
        // return $classes;
    }

    /**
     * Verrouiller l'api REST pour que seuls les utilisateurs
     * connectés ou les admin y aient accès
     */
    public function secure_api()
    {
        add_filter('rest_authentication_errors', function ($result) {
            if (!empty($result)) {
                return $result;
            }
            if (!is_user_logged_in()) {
                return new WP_Error(
                    'rest_not_logged_in',
                    'You are not currently logged in.',
                    ['status' => 401]
                );
            }
            return $result;
        });
    }

    /**
     * Le XML RPC est un ancien protocole WordPress très peu utilisé
     * et qui peut facilement présenter des failles de sécurité
     */
    public function secure_xml_rcp()
    {
        add_filter('xmlrpc_enabled', '__return_false');
        remove_action('wp_head', 'rsd_link');
    }

    public function init_multilang()
    {
        add_action('wp_head', function () {
            global $wp;
            global $post;
            $site_url = str_replace('wp', '', site_url());
            $default_language = pll_default_language();
            echo '<link rel="alternate" href="' .
                $site_url .
                $default_language .
                '/" hreflang="x-default" />';
        });
    }

    //////// Options

    public function restrict_admin()
    {
        add_action('admin_init', function () {
            if (
                !current_user_can('administrator') &&
                !current_user_can('editor')
            ) {
                wp_redirect(get_bloginfo('url'));
                exit();
            }
        });
    }

    public function hide_admin_bar()
    {
        add_filter('show_admin_bar', function () {
            if (!current_user_can('edit_posts') && !is_admin()) {
                return false;
            }
            return true;
        });
    }

    //////// Autre

    public function is_prod()
    {
        return $this->env == 'prod';
    }

    public function is_dev()
    {
        return $this->env == 'dev';
    }
}
