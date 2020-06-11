<?php 
    require_once ('config/Conexion.php');    
    class MovieModel {
        private $id;
        private $nombre;
        private $imagen;
        private $descripcion;
        private $duracion;
        private $fk_sala;
        private $conexion;

        public function __construct(){
            $this->conexion = Conexion::Conectar();
        }
        
        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getNombre(){
            return $this->nombre;
        }
    
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    
        public function getImagen(){
            return $this->imagen;
        }
    
        public function setImagen($imagen){
            $this->imagen = $imagen;
        }
    
        public function getDescripcion(){
            return $this->descripcion;
        }
    
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
    
        public function getDuracion(){
            return $this->duracion;
        }
    
        public function setDuracion($duracion){
            $this->duracion = $duracion;
        }

        public function getFk_sala(){
            return $this->fk_sala;
        }
    
        public function setFk_sala($fk_sala){
            $this->fk_sala = $fk_sala;
        }

        // ----------------------------------------------------

        public function AllMovies() {
            $sqlMovies = 'SELECT * FROM peliculas';
            $movies = $this->conexion->prepare( $sqlMovies );
            $movies->execute();
            return $movies;
        }

        public function getMovieById() {
            $sqlMovie = 'SELECT * FROM peliculas WHERE id = :id';
            $movie = $this->conexion->prepare( $sqlMovie );
            $movie->execute( array( ":id" => $this->id ) );
            return $movie->fetch( PDO::FETCH_ASSOC );
        }

        public function getMovieBySala() {
            $sqlMovie = "SELECT peliculas.id, peliculas.nombre, salas.sala FROM peliculas INNER JOIN salas ON peliculas.fk_sala = salas.id WHERE peliculas.id = :id";
            $movie = $this->conexion->prepare( $sqlMovie );
            $movie->execute( array( ':id' => $this->id ) );
            return $movie->fetch( PDO::FETCH_ASSOC );
        }

        public function getMostPopularMovie() {
            $sqlMostPopular = "SELECT * FROM peliculas LIMIT 6";
            $mostPopular = $this->conexion->prepare( $sqlMostPopular );
            $mostPopular->execute();
            return $mostPopular;
        }

        public function getMoviesCartelera() {
            $sqlCartelera = "SELECT * FROM peliculas WHERE fk_sala > 0";
            $cartelera = $this->conexion->prepare( $sqlCartelera );
            $cartelera->execute();
            return $cartelera;
        }

        public function getMoviesExtreno() {
            $sqlExtreno = "SELECT * FROM peliculas WHERE fk_sala is NULL";
            $extreno = $this->conexion->prepare( $sqlExtreno );
            $extreno->execute();
            return $extreno;
        }

    }