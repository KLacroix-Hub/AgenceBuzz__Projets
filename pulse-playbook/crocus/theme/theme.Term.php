<?php
/**************************************************************
 *
 * Class pour la des posts en front
 *
 **************************************************************/

class Term
{
    public $wp;
    public $acf;
    const TAXONOMY = 'category';

    /**
     * Contruct
     */
    public function __construct($term)
    {
        $this->wp = $term;
        $this->acf = new Post_Acf(self::TAXONOMY . '_' . $term->term_id);
    }

    public function get_permalink()
    {
        return home_url('/') . $this->wp->taxonomy . '/' . $this->wp->slug;
    }

    public static function get_terms($args = [])
    {
        $args['taxonomy'] = static::TAXONOMY;
        $terms = get_terms($args);

        if (!$terms) {
            return false;
        }

        return array_map(function ($term) {
            return new static($term);
        }, $terms);
    }

    public static function get_by_slug($slug_cat)
    {
        $term = get_term_by('slug', $slug_cat, static::TAXONOMY);
        if (!$term) {
            return false;
        }
        return new static($term);
    }
}
