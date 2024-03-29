<?php
/**************************************************************
 *
 * Class pour la gestions des vues
 *
 **************************************************************/

class View
{
    /**
     * Afficher un template part
     * $tpl : String - chemin du fichier contenue dans templates
     * $params : Array key/value - paramètre disponnible dans la vue chaque key deviendra une variable
     */
    public static function show($tpl, $params = false)
    {
        echo self::get($tpl, $params);
    }

    public static function is_exist($tpl)
    {
        return file_exists(locate_template('templates/' . $tpl . '.php'));
    }

    public static function ob($callback)
    {
        ob_start();

        $callback();
        $view = ob_get_contents();

        ob_end_clean();

        return $view;
    }

    public static function new_link($title, $url, $target = ''){
        return [
            'title' => $title,
            'url' => $url,
            'target' => $target
        ];
    }

    /**
     * Recupérer dans un l'afficher un template part
     * $tpl : String - chemin du fichier contenue dans templates
     * $params : Array key/value - paramètre disponnible dans la vue chaque key deviendra une variable
     */
    public static function get($tpl, $params = false)
    {
        ob_start();

        if(!isset($params['class_css'])){
            $params['class_css'] = '';   
        }

        if ($params) {
            foreach ($params as $key => $param) {
                $$key = $param;
            }

        }

        include locate_template('templates/' . $tpl . '.php');
        $view = ob_get_contents();

        ob_end_clean();

        return $view;
    }
}
