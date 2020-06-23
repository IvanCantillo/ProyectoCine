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
            }else{
                require_once ('views/login.php');
            }
        }
        public function register() {
            session_start();
            if (isset( $_SESSION['usuario']['id'] )) {
                header('Location: '. URL_BASE .'inicio/');
            }else{
                require_once ('views/register.php');
            }
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
                        'telefono' => $resLogin['telefono'],
                        'tarjeta' => $resLogin['tarjeta'],
                        'rol' => $resLogin['fk_rol'],
                        'tarjeta' => $resLogin['tarjeta']
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
                        'telefono' => $resLogin['telefono'],
                        'tarjeta' => $resLogin['tarjeta'],
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
        public function tarjeta() {
            session_start();
            if( isset( $_POST['tarjeta'] ) ){
                $objTarjeta = new UserModel();
                $objTarjeta->setTarjeta( $_POST['tarjeta'] );
                $resTarjeta = $objTarjeta->tarjeta();
                if( $resTarjeta == 'tarjeta-no-exist' ){
                    echo json_encode( 'error' );
                }else{
                    if( $_SESSION['usuario']['tarjeta'] == $resTarjeta ){
                        echo json_encode( $resTarjeta );
                    }else{
                        echo json_encode( 'tarjeta-error' );
                    }
                }
            }else{
                header('Location:'. URL_BASE .'inicio/');
            }
        }
        public function lista(){
            session_start();
            if (!isset( $_SESSION['usuario']['id'] )  || $_SESSION['usuario']['rol'] != 1) {
                header('Location: '. URL_BASE .'inicio/');
            }else{
                $objUser = new UserModel();
                $resUsers = $objUser->getAll();
                require_once ('views/lista_usuarios.php');
            }
        }
        public function perfil(){
            session_start();
            if( isset( $_SESSION['usuario']['id'] ) ){
                require_once ('views/perfil.php');
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
                header('Location: '. URL_BASE .'user/lista');
            }else {
                header('Location: '. URL_BASE .'inicio/');
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