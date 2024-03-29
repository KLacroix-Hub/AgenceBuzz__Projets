## Theme

> [lien de la doc](http://docmiwa.aureliendumont.fr/)

### ℹ️ Aides rapides

#### Creer un nouveau composant

##### Atome

```
docker-compose run --rm wp-cli wp wacli add_atome {nom-de-latome}
```

##### Molecule

```
docker-compose run --rm wp-cli wp wacli add_molecule {nom-de-la-molecule}
```

##### Organisme

```
docker-compose run --rm wp-cli wp wacli add_organisme {nom-de-lorganisme}
```

##### Template

```
docker-compose run --rm wp-cli wp wacli add_template {nom du template}
```

#### Creer un nouvel class + le single pour géré les posts types

```
docker-compose run --rm wp-cli wp wacli add_model_post "nom du type"
```

#### Creer une nouvelle taxo pour géré les posts terms

```
docker-compose run --rm wp-cli wp wacli add_model_taxonomy "nom de la taxo"
```

##### Récuperer des posts et afficher des datas

##### WP_Query

```
$args = [{argument classique d'une wp_query sans le post type}];
$ma_requette = Mon_Post::query($args);
if($ma_requette->have_posts()) :
	foreach($ma_requette->crocus as $post):
		echo $post->wp->post_title; // on accede au post wp
		echo $post->acf->sous_titre; // on accede au champs acf
	endforeach;
endif;
```

##### WP_Post

Tous l'object wp est dans le paramètre wp du post

```
echo $post->wp->post_title;
```

##### WP_Term

Tous l'object wp est dans le paramètre wp du post

```
echo $post->wp->name;
```

##### Options

les options du theme gérer avec un page d'option acf sont accessibles avec la class Options

```
$option = Options::get_instance();
echo $option->acf->acf_field;
```

##### Acf

Tous les champs acf sont accessible dans le paramètre acf du post ou du term ou de la page

```
echo $post->acf->acf_field;
echo $page->acf->acf_field;
echo $term->acf->acf_field;
```

_Si le champs acf doit retourner un post_type, il retournera l'instance du post_type_

```
$post_higlight =  $post->acf->article_higlight;
echo $post_higlight->wp->post_title
echo $post_higlight->acf->acf_field
```

_Si le champs acf doit retourner un Term, il retournera l'instance du term/taxo_

```
$category = $post->acf->article_cat;
echo $category->wp->name
echo $category->acf->acf_field
```

##### View

###### Afficher une vue

```
  View::show('organismes/o-header', []);
```

###### Récupérer une vue pour l'afficher plus tard

```
  $ma_vu = View::get('organismes/o-header', []);
```

##### Image

###### Déclarer un taille d'image :

Ajouter le tableau ci dessous dans `images_size` dans le fichier : `themes/wp_theme/crocus/configs/config.php`

```
 [
    'name' => '100x100',
    'width' => '100',
    'height' => '100',
    'crop' => false,
  ],
```

###### Afficher l'url de l'image :

```
<?php $visuel = $mon_post->acf->post_visuel; ?>
<img class="visuel" src="<?php echo Image::get_url(
        $visuel,
        '100x100'
    ); ?>" alt="<?php echo Image::get_alt($visuel); ?>">
```
