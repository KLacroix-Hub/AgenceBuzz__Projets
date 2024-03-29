<?php
/**************************************************************
 *
 * Classe pour la gestions des images
 *
 **************************************************************/

@ini_set('upload_max_size', '20M');
@ini_set('post_max_size', '20M');
@ini_set('max_execution_time', '300');

class Image
{   
    public $images_size;

    public function __construct($config)
    {
        $this->images_size = $config->images_size;
    }

    public static function get_svg($file, $theme = 'blue-dark', $class_css = '')
    {   
        ob_start();

        $theme = '';
        if($theme) $theme = ' c-theme--svg c-theme-' . $theme;
        
        echo '<span class="'. $class_css . $theme .'">';
        include locate_template('assets/img/' . $file . '.svg');
        echo '</span>';
        
        $view = ob_get_contents();

        ob_end_clean();

        return $view;
    }


    public function add_image_size()
    {
        if (!isset($this->images_size)) {
            return;
        }

        foreach ($this->images_size as $size) {
            add_image_size(
                $size['name'],
                $size['width'],
                $size['height'],
                $size['crop']
            );
        }
    }

    public static function get_url($image, $size, $default = false)
    {
        $service = 'http://via.placeholder.com/';
        //$service = 'https://gradientjoy.com/';
        if ($image) {
            if (!is_array($image)) {
                $image = wp_get_attachment_image_src($image, $size);
                return $image[0];
            } else {
                //if(!is_array($image)) $image = wp_get_attachment_metadata($image);
                if ($size == 'full') {
                    return $image['url'];
                }
                if (!isset($image['sizes'][$size])) {
                    return $service . '100x100/c9c8ff?text=';
                }
                return $image['sizes'][$size];
            }
        }

        if ($default) {
            return $default;
        }

        return $service . '100x100/c9c8ff?text=';
    }

    public static function get_alt($image, $default = false)
    {
        if (isset($image['alt'])) {
            return $image['alt'];
        } elseif ($default) {
            return $default;
        } else {
            $img_id = is_array($image) ? $image['ID'] : $image;
            $image_title = $img_id ? get_the_title($img_id) : '';
            return $image_title;
        }
    }

    public static function get_caption($image, $default = false)
    {
        if (isset($image['caption'])) {
            return $image['caption'];
        } elseif ($default) {
            return $default;
        } else {
            return false;
        }
    }

    public static function get_url_from_theme($image, $folder = 'img')
    {
        return get_template_directory_uri() .
            '/assets' .
            '/' .
            $folder .
            '/' .
            $image;
    }
}
