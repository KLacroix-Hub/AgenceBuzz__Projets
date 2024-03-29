<?php
/**************************************************************
 *
 * Classe pour la gestions des helpers
 *
 **************************************************************/

class Helper
{
    public static function get_asset($path)
    {
        return get_template_directory_uri() . '/assets' . '/' . $path;
    }

    public static function get_flag($pays)
    {
        $pays = strtolower($pays);
        $flags = [
            'france' => '🇨🇵',
            'italie' => '🇮🇹',
            'espagne' => '🇪🇸',
            'belgique' => '🇧🇪',
            'allemagne' => '🇩🇪',
        ];

        if (isset($flags[$pays])) {
            return $flags[$pays];
        }

        return '🏳️‍🌈';
    }

    public static function get_mounths()
    {
        return [
            '',
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Aout',
            'Septembre',
            'Octobre',
            'Novembre',
            'Décembre',
        ];
    }

    public static function remove_accent($string)
    {
        $unwanted_array = [
            'Š' => 'S',
            'š' => 's',
            'Ž' => 'Z',
            'ž' => 'z',
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'A',
            'Å' => 'A',
            'Æ' => 'A',
            'Ç' => 'C',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'Ñ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'O',
            'Ø' => 'O',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'U',
            'Ý' => 'Y',
            'Þ' => 'B',
            'ß' => 'Ss',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'a',
            'å' => 'a',
            'æ' => 'a',
            'ç' => 'c',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'ð' => 'o',
            'ñ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ö' => 'o',
            'ø' => 'o',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ý' => 'y',
            'þ' => 'b',
            'ÿ' => 'y',
        ];

        return strtr($string, $unwanted_array);
    }

    public static function shorten_text(
        $text,
        $max_length = 140,
        $cut_off = '...',
        $keep_word = false
    ) {
        if (strlen($text) <= $max_length) {
            return $text;
        }

        if (strlen($text) > $max_length) {
            if ($keep_word) {
                $text = substr($text, 0, $max_length + 1);

                if ($last_space = strrpos($text, ' ')) {
                    $text = substr($text, 0, $last_space);
                    $text = rtrim($text);
                    $text .= $cut_off;
                }
            } else {
                $text = substr($text, 0, $max_length);
                $text = rtrim($text);
                $text .= $cut_off;
            }
        }

        return $text;
    }

    public static function human_filesize($size, $precision = 1)
    {
        $units = [' B', ' kB', ' MB', ' GB', ' TB', ' PB', ' EB', ' ZB', ' YB'];
        $step = 1024;
        $i = 0;
        while ($size / $step > 0.9) {
            $size = $size / $step;
            $i++;
        }
        $result = round($size, $precision) . $units[$i];
        return str_replace('.', ',', $result);
    }

    public function get_format($post_ID)
    {
        return get_post_format($post_ID) ?: 'standard';
    }

    public static function the_content($content)
    {
        echo apply_filters('the_content', $content);
    }

    public static function get_date($page_id)
    {
        return get_the_date('d F Y', $page_id);
    }

    public static function get_thumb($page_id)
    {
        $img = get_field('article_thumb', $page_id);
        if (!$img) {
            $img = get_post_thumbnail_id($page_id);
        }
        return $img;
    }

    public static function get_link($page)
    {
        return get_permalink($page);
    }

    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function get_browser_language(
        $available = [],
        $default = 'en'
    ) {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

            if (empty($available)) {
                return empty($langs) ? $default : $langs[0];
            }

            foreach ($langs as $lang) {
                $lang = substr($lang, 0, 2);
                if (in_array($lang, $available)) {
                    return $lang;
                }
            }
        }
        return $default;
    }

    public static function find_value_in_nested_array($array, $value, $key) {
        foreach ($array as $item) {
            if (is_array($item)) {
                if (isset($item[$key]) && Helper::slugify($item[$key]) === $value) {
                    return $item;
                } else {
                    $foundItem = self::find_value_in_nested_array($item, $value, $key);
                    if ($foundItem !== null) {
                        return $foundItem;
                    }
                }
            }
        }
        return null;
    }
}
