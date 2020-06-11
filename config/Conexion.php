<?php
class Conexion{

    public static function Conectar() {

        include __DIR__ . "/Datos.php"; 
        $datos = $CONEXION['desarrollo'];

        $con = 'mysql:host=' . $datos['host'];
        $con .= ';dbname=' . $datos['db'];
        try {
            $conexion = new PDO($con, $datos['user'], $datos['pass']);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET UTF8");
        } catch (Exception $e) {
            echo "<b> Hubo un error </b>";
        }
        return $conexion;
    }

}