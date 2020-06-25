<?php 
    require_once ('config/Conexion.php');    
    class MovieModel {
        private $id;
        private $nombre;
        private $imagen;
        private $descripcion;
        private $trailer; 
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

        public function getTrailer(){
            return $this->trailer;
        }

        public function setTrailer($trailer){
            $this->trailer = $trailer;
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
            $sqlMovies = 'SELECT * FROM peliculas WHERE fk_estado = 1';
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
            $sqlMostPopular = "SELECT * FROM peliculas WHERE fk_estado = 1 ORDER BY fk_sala DESC LIMIT 6";
            $mostPopular = $this->conexion->prepare( $sqlMostPopular );
            $mostPopular->execute();
            return $mostPopular;
        }

        public function getMoviesCartelera() {
            $sqlCartelera = "SELECT * FROM peliculas WHERE fk_sala > 0 AND fk_estado = 1";
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

        public function updateMovieForId(){
            $sqlUpdate = "UPDATE peliculas SET nombre=:nom, imagen=:img, descripcion=:descrip, trailer = :trailer, fk_sala=:sala WHERE id = :id";
            $updateMov = $this->conexion->prepare( $sqlUpdate );
            $updateMov->execute( array( ':id' => $this->id, ':nom' => $this->nombre, ':img' => $this->imagen, ':descrip' => $this->descripcion, ':trailer' => $this->trailer, ':sala' => $this->fk_sala ) );
            return $updateMov;
        }

        public function insertMovie(){
            $sqlInsert = "INSERT INTO peliculas(nombre, imagen, trailer, descripcion, duracion, fk_sala) VALUES (:nombre, :imagen, :trailer, :descrip, :duracion, :sala)";
            $insertMov = $this->conexion->prepare( $sqlInsert );
            $insertMov->execute(array( ':nombre' => $this->nombre, ':imagen' => $this->imagen, ':trailer' => $this->trailer, ':descrip' => $this->descripcion, ':duracion' => $this->duracion, ':sala' => $this->fk_sala));
            return $insertMov;
        }

        public function deleteMovie(){
            $sqlDelete = "DELETE FROM peliculas WHERE id = :id";
            $deleteMov = $this->conexion->prepare( $sqlDelete );
            $deleteMov->execute( array( ":id" => $this->id ) );
        }

        public function desasignarSala(){

            for ($i=1; $i < 4; $i++) { 
                $sqlDesasignar ="UPDATE `peliculas` SET `fk_sala`= null WHERE `fk_sala` = $i ";
                $desasignar = $this->conexion->prepare( $sqlDesasignar );
                $desasignar->execute();
            }
            
        }

        public function asinarSala($p1, $p2, $p3){

            for ($i=1; $i < 4; $i++) { 
                if($i == 1){
                    $sqlAsignar ="UPDATE `peliculas` SET `fk_sala`= 1 WHERE `id` = $p1 ";
                    $asignar = $this->conexion->prepare( $sqlAsignar );
                    $asignar->execute();
                }
                if($i == 2){
                    $sqlAsignar ="UPDATE `peliculas` SET `fk_sala`= 2 WHERE `id` = $p2 ";
                    $asignar = $this->conexion->prepare( $sqlAsignar );
                    $asignar->execute();
                }
                if($i == 3){
                    $sqlAsignar ="UPDATE `peliculas` SET `fk_sala`= 3 WHERE `id` = $p3 ";
                    $asignar = $this->conexion->prepare( $sqlAsignar );
                    $asignar->execute();
                }
            }

            

        }

    }