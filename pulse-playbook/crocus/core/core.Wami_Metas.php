<?php
/**************************************************************
 *
 * Class et fonctions permettant d'ajouter les metas du site
 *
 **************************************************************/

class Wami_Meta
{
    private $attr;
    private $key;
    private $value;

    public function __construct($attr, $key, $value = '')
    {
        $this->attr = $attr;
        $this->key = $key;
        $this->value = $value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getHtml()
    {
        return '<meta ' .
            $this->attr .
            '="' .
            $this->key .
            '" content="' .
            $this->value .
            '" />';
    }
}

class Wami_Metas
{
    private $metas;

    public function __construct($array = [])
    {
        $this->hooks();
        $this->metas = [
            'viewport' => new Wami_Meta(
                'name',
                'viewport',
                'width=device-width, initial-scale=1.0'
            ),
            'og:image' => new Wami_Meta('property', 'og:image', ''),
            'robots' => new Wami_Meta('name', 'robots', ''),
            'X-UA-Compatible' => new Wami_Meta(
                'http-equiv',
                'X-UA-Compatible',
                'IE=edge,chrome=1'
            ),
        ];
        if (!empty($array)) {
            foreach ($array as $k => $v) {
                $this->set($k, $v);
            }
        }
    }

    private function hooks()
    {
        add_action('wp_head', [$this, 'display'], 1);
    }

    public function set($key, $val)
    {
        $meta = $this->metas[$key];
        $meta->setValue($val);
    }

    public function get($key)
    {
        return $this->metas[$key];
    }

    //private function getAll(){ }

    public function display()
    {
        echo '<!-- Wami_Metas -->' . PHP_EOL;
        //debug( $this->metas );
        foreach ($this->metas as $meta) {
            echo $meta->getHtml() . PHP_EOL;
        }
        echo '<!-- /Wami_Metas -->' . PHP_EOL;
    }
}

add_action('init', 'wami_metas_init');
function wami_metas_init()
{
    $instance = new Wami_Metas([
        'viewport' =>
            'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no',
        'og:image' => 'imagedefault',
    ]);
    $instance->set('og:image', 'imagefront');
}

?>
