<?php
    require_once './Autoload.php';

    if(isset($_GET['controller'])){
        $class_name = $_GET['controller'] . "Controller";
    }else {
        $class_name = null;
    } 

    if( isset( $_GET['method'] ) ){
        $method_name = $_GET['method'];
    }else {
        $method_name = null;
    }

    if (class_exists( $class_name )) {
        if(method_exists($class_name, $method_name)){
            $obj = new $class_name();
            $obj->$method_name();
        }else{
            if ($method_name == null) {
                $obj = new InicioController();
                $obj->index();
            }else {
                $obj = new NotFoundController();
                $obj->index();
            }
        }
    }else {
        if ($class_name == null) {
            $obj = new InicioController();
            header('location: '. URL_BASE .'Inicio/');
        }else {
            $obj = new NotFoundController();
            $obj->index();
        }
    }