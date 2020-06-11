<?php
    require_once 'config/Parametros.php';
    
    function Autoload($class_name) {
        if (file_exists('controllers/' . $class_name . '.php')) {
            require_once 'controllers/' . $class_name . '.php';
        }else {
            require_once 'controllers/NotFoundController.php';
        }
    }

    spl_autoload_register('Autoload');