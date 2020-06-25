<?php

require_once ('models/MovieModel.php');
require_once ('models/UserModel.php');

class AdminController{
    private $error;
    private $message;

    public function response( $error, $message ) {
        $data = [
            'error'=> $error,
            'message' => $message
        ];
        return $data;
    }
    public function listaUsuarios(){
        session_start();
        if (!isset( $_SESSION['usuario']['id'] )  || $_SESSION['usuario']['rol'] != 1) {
            header('Location: '. URL_BASE .'inicio/');
        }else{
            $objUser = new UserModel();
            $resUsers = $objUser->getAll();
            require_once ('views/lista_usuarios.php');
        }
    }
    public function asignar(){
        session_start();
        if($_SESSION && $_SESSION['usuario']['rol'] == 1){

            $objMov = new MovieModel();
            $peliculas = $objMov->AllMovies();
            $resPeliculas = array();
            foreach( $peliculas as $peli ){
                array_push( $resPeliculas, $peli );
            }
            require_once('views/asignar_salas_a_pelis.php');
        }else{
            header('Location: '. URL_BASE .'inicio/');
        }
    }
    public function asignamiento(){
        session_start();
        if($_SESSION && $_SESSION['usuario']['rol'] == 1 && $_POST['sala_1']){

            $asignar = new MovieModel();

            $asignar->desasignarSala();

            $asignar->asinarSala($_POST['sala_1'], $_POST['sala_2'], $_POST['sala_3']);

            
            header('Location: '. URL_BASE .'inicio/peliculas');

        }else{
            header('Location: '. URL_BASE .'inicio/');
        }
    }
    public function editar() {
        session_start();
        if ( isset( $_POST['id'] ) && $_SESSION['usuario']['rol'] == 1 ) {
            $objUser = new UserModel();
            $objUser->setId( $_POST['id'] );
            $resUser = $objUser->getUserById();
            require_once ('views/editar_usuario.php');
        }else {
            header('Location: '. URL_BASE .'inicio/');
        }
    }
    public function update() {
        session_start();
        if( isset( $_POST['email'] ) ){
            $objUser = new UserModel();
            $objUser->setId( $_POST['id'] );
            $objUser->setNombre( $_POST['nombre'] );
            $objUser->setApellido( $_POST['apellido'] );
            $objUser->setEmail( $_POST['email'] );
            $objUser->setTelefono( $_POST['telefono'] );
            $objUser->setFk_rol( $_POST['rol'] );
            $objUser->setFk_estado( $_POST['estado'] );
            $objUser->update();
            
            echo json_encode( $this->response( false, 'ok' ) );

        }else {
            header('Location: '. URL_BASE .'inicio/');
        }
    }
    public function eliminar() {
        session_start();  
        if (isset( $_POST['id'] )) {
            $objUser = new UserModel();
            $objUser->setId( $_POST['id'] );
            $objUser->delete();
            header('Location: '. URL_BASE .'Admin/listaUsuarios');
        }else {
            header('Location: '. URL_BASE .'inicio/');
        }      
    }
    public function solicitudesVip(){
        session_start();
        if( isset( $_SESSION['usuario']['rol'] ) && $_SESSION['usuario']['rol'] == 1 ){
            $objUser = new UserModel();
            $resSolicitudes = $objUser->getAllSolicitudes();
            require_once ('views/solicitudes_vip.php');
        }else{
            header('Location: '. URL_BASE .'inicio/');
        }
    }
}