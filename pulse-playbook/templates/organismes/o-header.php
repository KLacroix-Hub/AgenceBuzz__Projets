
<?php setlocale(LC_TIME, 'fr'); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php wp_title(''); ?></title>
  <?php wp_head(); ?>
</head>

<?php 

  /**
   * Le theme global de la page : 
   * 
   */
  global $post; 
  $theme = 'c-theme c-theme--';
  $set_default = true;
  if(isset($post->ID)):

    if($post->post_type == 'persona'){

        /** Si persona on prend la couleur du customer groupe */
        $curent = new Persona($post);
        $custumer_group = $curent->acf->persona_custumer_group;
        if($custumer_group && $custumer_group->acf->tax_theme){
            $set_default = false;
            $theme.= $custumer_group->acf->tax_theme;
        }

    }else if($post->post_type == 'custumer-journey'){

        /** Si custumer-journey on prend la couleur du customer groupe */
        $curent = new Custumer_Journey($post);
        $custumer_group = $curent->acf->journey_customer_groupe;
        if($custumer_group && $custumer_group->acf->tax_theme){
            $set_default = false;
            $theme.= $custumer_group->acf->tax_theme;
        }

    }else{

        /** Pour les page on prend la couleur du parent */
        $curent = new Page($post);
        $parent = $curent->get_parent();
        if($parent) $curent = $parent;
        
        if($couleur = $curent->acf->page_theme) {
            $set_default = false;
            $theme.= $couleur;
        }

    }

  endif;

  /** Si aucun theme n'a été selectionné */
  if($set_default) $theme.= 'light-blue'; 

?>

<body <?php body_class($theme); ?> data-theme="Theme : <?php echo $theme ?>">

<div id="main">