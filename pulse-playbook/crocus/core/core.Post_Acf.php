<?php

class Post_Acf
{
    public $post_id;

    /**
     * Contruct
     */
    public function __construct($post_id)
    {
        $this->post_id = $post_id;
    }

    public function map($field)
    {
        if (!is_array($field)) {
            if ($field instanceof WP_Post) {
                $class = str_replace('-', '_', ucfirst($field->post_type));
                $field = new $class($field);
            }
            if ($field instanceof WP_Term) {
                $class = str_replace('-', '_', ucfirst($field->taxonomy));
                $field = new $class($field);
            }
            return $field;
        }
        return array_map(function ($field) {
            return $this->map($field);
        }, $field);
    }

    public function unmap($field)
    {
        if (!is_array($field)) {
            if (isset($field->wp)) {
                $field = $field->wp;
            }
            return $field;
        }
        return array_map(function ($field) {
            return $this->unmap($field);
        }, $field);
    }

    public function __set($name, $value)
    {
        $field = $this->map($value);
        $this->$name = $field;
    }

    /**
     * Méthode Magic __get qui récupère directement le field ACF
     */
    public function __get($name)
    {
        $field = get_field($name, $this->post_id);
        $this->$name = $field;

        return $this->$name;
    }

    public function save()
    {
        foreach ($this as $key => $value) {
            if ($key == 'post_id') {
                continue;
            }
            $field = $this->unmap($value);
            update_field($key, $field, $this->post_id);
        }
    }
}
