<?php 
    
    require_once ('models/UserModel.php');
    class UserController {

        private $error;
        private $message;

        public function response( $error, $message ) {
            $data = [
                'error'=> $error,
                'message' => $message
            ];
            return $data;
        }

        public function login() {
            session_start();
            if (isset( $_SESSION['usuario']['id'] )) {
                header('Location: '. URL_BASE .'inicio/');
            }
            require_once ('views/login.php');
        }
        public function register() {
            session_start();
            if (isset( $_SESSION['usuario']['id'] )) {
                header('Location: '. URL_BASE .'inicio/');
            }
            require_once ('views/register.php');
        }

        public function signin() {
            session_start();
            if( isset($_POST['email']) ){
                $objUser = new UserModel();
                $email = $_POST['email'];
                $password = $objUser->password_encrypt($_POST['password']);
                $objUser ->setEmail( $email );
                $objUser->setPassword( $password );
                $resLogin = $objUser->login();

                if ($resLogin == 'user-not-exist') {
                    $this->error = true;
                    $this->message = 'El usuario no existe';
                }else{
                    $_SESSION['usuario'] = [
                        'id' => $resLogin['id'],
                        'correo' => $resLogin['email'],
                        'nombre' => $resLogin['nombre']  .' '. $resLogin['apellido'],
                        'rol' => $resLogin['fk_rol']
                    ];
                    $this->error = false;
                    $this->message = 'ok';
                }
                echo json_encode( $this->response( $this->error, $this->message ) );
                
            }else{
                header('Location:'. URL_BASE .'user/login');
            }
        }

        public function signup() {
            session_start();
            if( isset($_POST['email']) ){
                $objUser = new UserModel();

                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];
                $password = $objUser->password_encrypt($_POST['password']);
                $telefono = $_POST['telefono'];
                $tarjeta = ($_POST['tarjeta'] == '') ? NULL: $_POST['tarjeta'];
                $nacimiento = ($_POST['nacimiento'] == '') ? NULL: $_POST['nacimiento'];

                $objUser->setNombre( $nombre );
                $objUser->setApellido($apellido); 
                $objUser->setEmail($email); 
                $objUser->setPassword( $password ); 
                $objUser->setTelefono($telefono); 
                $objUser->setTarjeta($tarjeta); 
                $objUser->setFecha_nacimiento($nacimiento);
                $objUser->setFk_rol( ($tarjeta == null)? 3 : 2 );
                $objUser->setFk_estado( 1 );

                $resRegister = $objUser->register();

                if( $resRegister == 'user-exist' ){
                    $this->error = true;
                    $this->message = 'El correo ya se encuentra registrado.';
                }else{
                    $resLogin = $objUser->login();
                    $_SESSION['usuario'] = [
						'id' => $resLogin['id'],
						'correo' => $resLogin['email'],
                        'nombre' => $resLogin['nombre']  .' '. $resLogin['apellido'],
                        'rol' => $resLogin['fk_rol']
					];
                    $this->error = false;
                    $this->message = 'ok';
                }
                echo json_encode( $this->response( $this->error, $this->message ) );
            }else{
                header('Location:'. URL_BASE .'inicio/');
            }
        }

        public function tarjetas(){
            if( isset($_POST['tarjetas']) ){
                $objUsers = new UserModel();
                $resTarjetas = $objUsers->tarjetas();
                $tarjetas = array();
                foreach ($resTarjetas as $value) {
                    array_push($tarjetas, $value);
                }
                echo json_encode($tarjetas);
            }else {
                header('Location:'. URL_BASE .'inicio/');
            }
        }

        public function cerrar_session() {
            session_start();
            session_destroy();
            header('Location:'. URL_BASE .'inicio/');
        }

        public function test() {
            $user = $_POST['email'];
            $this->error = false;
            $this->message = $user;
            echo json_encode( $this->response( $this->error, $this->message ) );
        }
    }