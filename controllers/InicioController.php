<?php 
    require_once ('models/MovieModel.php');

    class InicioController {
        
        public function index() {
            session_start();
   
            $objMovie = new MovieModel();
            $movies = $objMovie->getMostPopularMovie();
            $resMovies = array();
            foreach ($movies as $pelicula) {
               array_push($resMovies, $pelicula);
            }
            $seccion_1 = [
                [
                    'id' => $resMovies[0]['id'],
                    'nombre' => $resMovies[0]['nombre'],
                    'imagen' => $resMovies[0]['imagen'],
                    'descripcion' => $resMovies[0]['descripcion'],
                    'fk_sala' => $resMovies[0]['fk_sala'],
                ],
                [
                    'id' => $resMovies[1]['id'],
                    'nombre' => $resMovies[1]['nombre'],
                    'imagen' => $resMovies[1]['imagen'],
                    'descripcion' => $resMovies[1]['descripcion'],
                    'fk_sala' => $resMovies[1]['fk_sala'],
                ],
                [
                    'id' => $resMovies[2]['id'],
                    'nombre' => $resMovies[2]['nombre'],
                    'imagen' => $resMovies[2]['imagen'],
                    'descripcion' => $resMovies[2]['descripcion'],
                    'fk_sala' => $resMovies[2]['fk_sala'],
                ]
            ];
            $seccion_2 = [
                [
                    'id' => $resMovies[3]['id'],
                    'nombre' => $resMovies[3]['nombre'],
                    'imagen' => $resMovies[3]['imagen'],
                    'descripcion' => $resMovies[3]['descripcion'],
                    'fk_sala' => $resMovies[3]['fk_sala'],
                ],
                [
                    'id' => $resMovies[4]['id'],
                    'nombre' => $resMovies[4]['nombre'],
                    'imagen' => $resMovies[4]['imagen'],
                    'descripcion' => $resMovies[4]['descripcion'],
                    'fk_sala' => $resMovies[4]['fk_sala'],
                ],
                [
                    'id' => $resMovies[5]['id'],
                    'nombre' => $resMovies[5]['nombre'],
                    'imagen' => $resMovies[5]['imagen'],
                    'descripcion' => $resMovies[5]['descripcion'],
                    'fk_sala' => $resMovies[5]['fk_sala'],
                ]
            ];
            
            require_once ('views/index.php');
        }
        public function peliculas() {
            session_start();
            $objMovies = new MovieModel();
            $resMoviesCartelera = $objMovies->getMoviesCartelera();
            $resMoviesExtreno = $objMovies->getMoviesExtreno();
            require_once ('views/peliculas.php');
        }
        public function detalle() {
            session_start();
            if (isset( $_POST['id'] )) {
                $id = $_POST['id'];
                $objMovie = new MovieModel();
                $objMovie->setId( $id );
                $resMovie = $objMovie->getMovieById();
                require_once ('views/detalle_pelicula.php');
            }else {
                header(('location: '. URL_BASE .'inicio'));
            }
        }
    }