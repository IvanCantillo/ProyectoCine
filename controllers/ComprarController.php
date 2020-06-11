<?php 
    require_once ('models/MovieModel.php');
    require_once ('models/SalaModel.php');
    class ComprarController {
        
        public function index(){
            session_start();
            if (!isset( $_SESSION['usuario']['id'] )) {
                header('Location: '. URL_BASE .'user/login');
            }
            if( isset( $_POST['id'] ) ){
                $id = $_POST['id'];

                $objMovie = new MovieModel();
                $objSala = new SalaModel();

                $objMovie->setId( $id );
                $resMovie = $objMovie->getMovieBySala();
                $sala = $resMovie['sala'];
                $objSala->setSala( $sala );
                $resChair =$objSala->listChairsOfSala();
                
                require_once ('views/comprar_tickets.php');
            }else {
                header('location: '. URL_BASE .'inicio/');
            }
        }   
     }