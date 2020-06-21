<?php

require_once ('models/MovieModel.php');

class MovieController{
    public function index(){
        session_start();
        if ($_SESSION['usuario']['rol'] == 1) {
            require_once('views/crear_movie.php');
        }else{
            header('Location:'. URL_BASE);
        }
        
    }

    public function insertar(){
        session_start();
        if(isset($_POST['crear']) && $_SESSION['usuario']['rol'] == 1){
            
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_POST['imagen'];
            $trailer = $_POST['trailer'];
            $duracion = $_POST['duracion'];
            $sala = $_POST['sala'];

            $crearMov = new MovieModel();
            $crearMov->setNombre($nombre);
            $crearMov->setDescripcion($descripcion);
            $crearMov->setImagen($imagen);
            $crearMov->setTrailer($trailer);
            $crearMov->setDuracion($duracion);
            $crearMov->setFk_sala($sala);

            $crearMov->insertMovie();

            header('Location:'. URL_BASE .'Inicio/peliculas');

        }else{
            header('Location:'. URL_BASE);
        }


    }


    public function editar(){
        session_start();
        if(isset($_POST['id']) && $_SESSION['usuario']['rol'] == 1){
            $id = $_POST['id'];
            $objMovie = new MovieModel();
            $objMovie->setId( $id );
            $resMovie = $objMovie->getMovieById();

            require_once ('views/editar_movie.php');
        }else{
            header('Location:'. URL_BASE);
        }
        
    }

    public function actualizar(){
        session_start();
        if(isset($_POST['actualizar']) && $_SESSION['usuario']['rol'] == 1){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_POST['imagen'];
            $trailer = $_POST['trailer'];
            $duracion = $_POST['duracion'];
            $sala = $_POST['sala'];

            $updateMov = new MovieModel();
            $updateMov->setId($id);
            $updateMov->setNombre($nombre);
            $updateMov->setDescripcion($descripcion);
            $updateMov->setImagen($imagen);
            $updateMov->setTrailer($trailer);
            $updateMov->setDuracion($duracion);
            $updateMov->setFk_sala($sala);

            $updateMov->updateMovieForId();

            header('Location:'. URL_BASE . 'Inicio/peliculas');

        }else{
            header('Location:'. URL_BASE);
        }
    }

    public function eliminar(){
        session_start();
        if ($_SESSION['usuario']['rol'] == 1 && $_POST['id']) {
            
            $id = $_POST['id'];

            $deleteMovie = new MovieModel();

            $deleteMovie->setId($id);
            $deleteMovie->deleteMovie();

            header('Location:'. URL_BASE . 'Inicio/peliculas');


        }else{
            header('Location:'. URL_BASE);
        }
    }
    
}



?>