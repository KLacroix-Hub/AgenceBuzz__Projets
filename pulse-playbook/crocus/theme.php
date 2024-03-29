<?php

/**
 * Crocus V1
 * Documentation : http://aureliendumont.fr/doc-crocus
 */

$functions_directory = get_template_directory() . '/crocus';

/**
 * On ajoute tous les fichiers utilisé par le core du theme
 */
require $functions_directory . '/core/core.Helper.php';
require $functions_directory . '/core/core.Image.php';
require $functions_directory . '/core/core.View.php';
require $functions_directory . '/core/core.Router.php';
require $functions_directory . '/core/core.Wami_Metas.php';
require $functions_directory . '/core/core.Theme.php';
require $functions_directory . '/core/core.Post_Acf.php';
// require $functions_directory . '/core/core.Wami_Cli.php';

/**
 * On ajoute tous les fichiers utilisé par les hooks (customisable) utilisé pour dev le theme
 */
require $functions_directory . '/hook/hook.acf.php';
require $functions_directory . '/hook/hook.ajax.php';
require $functions_directory . '/hook/hook.rules.php';
require $functions_directory . '/hook/hook.admin.php';
require $functions_directory . '/hook/hook.rest.php';
require $functions_directory . '/hook/hook.dashboard.php';
require $functions_directory . '/hook/hook.template.php';

/**
 * On ajoute la function debug vital à tous developpement wami
 */
require $functions_directory . '/debug.php';

/**
 * On ajoute toutes les classes lier au contenus du theme
 */
require $functions_directory . '/theme/theme.Post.php';
require $functions_directory . '/theme/theme.Term.php';
require $functions_directory . '/theme/theme.Page.php';
require $functions_directory . '/theme/theme.Options.php';

require $functions_directory . '/theme/posts/post.Persona.php';
require $functions_directory . '/theme/posts/post.Custumer_Journey.php';
require $functions_directory . '/theme/posts/post.Case_Studie.php';
require $functions_directory . '/theme/posts/post.Agenda.php';
require $functions_directory . '/theme/posts/post.Nouvelle.php';
require $functions_directory . '/theme/posts/post.Collaborateur.php';
require $functions_directory . '/theme/posts/post.Templates.php';
require $functions_directory . '/theme/posts/post.Relationship_Map.php';
require $functions_directory . '/theme/posts/post.Toolkit.php';
require $functions_directory . '/theme/posts/post.Service.php';

require $functions_directory . '/theme/terms/term.Category.php';
require $functions_directory . '/theme/terms/term.Type_evenement.php';
require $functions_directory . '/theme/terms/term.Categorie_Casestudie.php';

require $functions_directory . '/theme/terms/term.Type_Persona.php';
require $functions_directory . '/theme/terms/term.Custumer_Groupe.php';
require $functions_directory . '/theme/terms/term.Specialty.php';
require $functions_directory . '/theme/terms/term.Location.php';
require $functions_directory . '/theme/terms/term.Contact_With_Sg.php';
require $functions_directory . '/theme/terms/term.Brand_Choice.php';
require $functions_directory . '/theme/terms/term.Market_Approach.php';
require $functions_directory . '/theme/terms/term.Location_Comunity.php';
require $functions_directory . '/theme/terms/term.Categorie_Toolkit.php';


/**
 * On recupère l'instance global du theme
 */
$theme = Theme::get_instance();

/**
 * On install la bonne config
 */

//$theme->install('prod', $curent_language);
$theme->install('prod', 'fr');

/**
 * On lance toutes les config/hook liez au theme courant.
 */
$theme->setup();
//$theme->init_multilang();

$theme->setup_script();
$theme->setup_images();

$theme->register_post_type();
$theme->register_taxonomy();
$theme->setup_menus();

//$theme->setup_post_label();
//$theme->setup_category_label();

// $theme->setup_css_wysiwyg();
// $theme->secure_api();
// $theme->secure_xml_rcp();
$theme->remove_default_post_type();
$theme->remove_default_comments();
$theme->remove_default_images_sizes();
//$theme->show_tags_in_sidebar();
// $theme->restrict_admin();
// $theme->hide_admin_bar();
?>
