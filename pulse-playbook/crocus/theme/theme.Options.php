<?php
/**************************************************************
 *
 * Class pour la gestion des options acf en front
 *
 **************************************************************/

class Options
{
    private static $_instance = null;
    public $acf;

    /**
     * Contruct
     */
    public function __construct()
    {
        $this->acf = new Post_Acf('options');
    }

    public static function get_instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Options();
        }

        return self::$_instance;
    }
}
