<?php
/**************************************************************
 *
 * Class pour la gestions des routings
 *
 **************************************************************/

class Router
{
    /**
     * Récupere un url (voir fichier de config routes-{env})
     * @params_query : Array devient ma-route/mon-premier-param/mon-deuxieme-param
     * @params : Array key/value devient ma-route/?mon-premier-key=mon-premier-value
     */
    public static function get_url(
        $name,
        $params_query = false,
        $params = false
    ) {
        $theme = Theme::get_instance();
        $routes = $theme->routes;

        if (!isset($routes[$name])) {
            return '';
        }

        $url = $routes[$name];
        if (is_array($params_query)) {
            foreach ($params_query as $param) {
                $url .= '/' . $param;
            }
        }

        if ($params) {
            $url .= '?' . http_build_query($params);
        }
        return $url;
    }

    /**
     * Redirection 404 via un template
     */
    public static function redirect_404()
    {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        get_template_part(404);
        exit();
    }

    /**
     * Redirection des paramètre GET
     */
    public static function get($key, $default = false)
    {
        return isset($_GET[$key]) ? stripslashes($_GET[$key]) : $default;
    }

    /**
     * Redirection des paramètre POST
     */
    public static function post($key, $default = false)
    {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    /**
     * Redirection des paramètre REQUEST
     */
    public static function request($key, $default = false)
    {
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }

    /**
     * Redirection des paramètre SESSION
     */
    public static function session($key, $default = false)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    /**
     * Récupérer le referer
     */
    public static function get_post_referer()
    {
        //url_to_postid
        $url = wp_get_referer();
        $post_id = url_to_postid($url);
        if (!$post_id) {
            return false;
        }

        return get_post($post_id);
    }

    /**
     * Récupérer la route courente
     */
    public static function get_curent_url()
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'
            ? 'https'
            : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public static function url_is_external($url)
    {
        $components = parse_url($url);
        return !empty($components['host']) &&
            strcasecmp($components['host'], $_SERVER['SERVER_NAME']); // empty host will indicate url like '/relative.php'
    }

    /**
     * Home url mais gérer pour par le multilangue
     */
    public static function get_page_link($nameorid)
    {
        if (!function_exists('pll_get_post')) {
            if (is_numeric($nameorid)) {
                return get_permalink($nameorid);
            } else {
                return site_url($nameorid);
            }
        }

        $post_id = false;
        if (is_numeric($nameorid)) {
            $post_id = $nameorid;
        } else {
            $post = get_page_by_path($nameorid, OBJECT, [
                'post',
                'page',
                'dossier',
                'document',
            ]);
            if ($post) {
                $post_id = $post->ID;
            }
        }
        if ($post_id) {
            $post_id_lang = pll_get_post($post_id);
            if ($post_id_lang) {
                return get_permalink($post_id_lang);
            }
            return get_permalink($post_id);
        } else {
            return site_url($nameorid);
        }
    }
}
