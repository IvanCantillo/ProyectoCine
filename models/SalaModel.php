<?php 
    require_once ('config/conexion.php');
    class SalaModel {
        private $id;
        private $silla;
        private $funcion;
        private $fk_pelicula;
        private $fk_estado_funcion_1;
        private $fk_estado_funcion_2;
        private $fk_estado_funcion_3;
        private $sala;
        private $conexion;

        public function __construct() {
            $this->conexion = Conexion::Conectar();
        }

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getSilla(){
            return $this->silla;
        }
    
        public function setSilla($silla){
            $this->silla = $silla;
        }

        public function getFuncion(){
            return $this->function;
        }
    
        public function setFuncion($funcion){
            $this->funcion = $funcion;
        }
    
        public function getFk_pelicula(){
            return $this->fk_pelicula;
        }
    
        public function setFk_pelicula($fk_pelicula){
            $this->fk_pelicula = $fk_pelicula;
        }
    
        public function getFk_estado_funcion_1(){
            return $this->fk_estado_funcion_1;
        }
    
        public function setFk_estado_funcion_1($fk_estado_funcion_1){
            $this->fk_estado_funcion_1 = $fk_estado_funcion_1;
        }

        public function getFk_estado_funcion_2(){
            return $this->fk_estado_funcion_2;
        }
    
        public function setFk_estado_funcion_2($fk_estado_funcion_2){
            $this->fk_estado_funcion_2 = $fk_estado_funcion_2;
        }

        public function getFk_estado_funcion_3(){
            return $this->fk_estado_funcion_3;
        }
    
        public function setFk_estado_funcion_3($fk_estado_funcion_3){
            $this->fk_estado_funcion_3 = $fk_estado_funcion_3;
        }

        public function getSala(){
            return $this->sala;
        }
    
        public function setSala($sala){
            $this->sala = $sala;
        }

        // -------------------------------------

        public function listChairsOfSala() {
            $sqlSala = 'SELECT * FROM ' . $this->sala;
            $sillas = $this->conexion->prepare( $sqlSala );
            $sillas->execute();
            return $sillas;
        }

    }
        
