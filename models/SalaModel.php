<?php 
    require_once ('config/conexion.php');
    class SalaModel {
        private $id;
        private $silla;
        private $fk_pelicula;
        private $fk_estado;
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
    
        public function getFk_pelicula(){
            return $this->fk_pelicula;
        }
    
        public function setFk_pelicula($fk_pelicula){
            $this->fk_pelicula = $fk_pelicula;
        }
    
        public function getFk_estado(){
            return $this->fk_estado;
        }
    
        public function setFk_estado($fk_estado){
            $this->fk_estado = $fk_estado;
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
        
