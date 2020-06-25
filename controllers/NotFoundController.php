<?php
    require_once 'Config/Parametros.php';

    class NotFoundController {
        function index() {
            session_start();
            require_once 'views/404.php';
        }
    }
