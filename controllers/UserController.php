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
                if( $resLogin == 'user-bloqueado' ){
                    $this->error = true;
                    $this->message = 'user-bloqueado';
                }else if ($resLogin == 'user-not-exist') {
                    $this->error = true;
                    $this->message = 'El usuario no existe';
                }else if( $resLogin == 'password-error' ){
                    $this->error = true;
                    $this->message = 'password-error';
                }else{
                    $_SESSION['usuario'] = [
                        'id' => $resLogin['id'],
                        'correo' => $resLogin['email'],
                        'nombre' => $resLogin['nombre']  .' '. $resLogin['apellido'],
                        'nombre_usu' => $resLogin['nombre'],
                        'apellido_usu' => $resLogin['apellido'],
                        'telefono' => $resLogin['telefono'],
                        'tarjeta' => $resLogin['tarjeta'],
                        'estado_vip' => $resLogin['estado_vip'],
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

                $objUser->setNombre( $nombre );
                $objUser->setApellido($apellido); 
                $objUser->setEmail($email); 
                $objUser->setPassword( $password ); 
                $objUser->setTelefono($telefono); 
                $objUser->setFk_rol( 3 );
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
                        'nombre_usu' => $resLogin['nombre'],
                        'apellido_usu' => $resLogin['apellido'],
                        'telefono' => $resLogin['telefono'],
                        'tarjeta' => $resLogin['tarjeta'],
                        'estado_vip' => $resLogin['estado_vip'],
                        'rol' => $resLogin['fk_rol'],
                        'tarjeta' => $resLogin['tarjeta']
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
                $objTarjeta->setId( $_SESSION['usuario']['id'] );
                $resTarjeta = $objTarjeta->tarjeta();
                if( $resTarjeta == 'tarjeta-no-exist' ){
                    echo json_encode( 'error' );
                }else{
                    echo json_encode( $resTarjeta );
                }
            }else{
                header('Location:'. URL_BASE .'inicio/');
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
        public function passwordreset(){
            session_start();
            if ($_SESSION && $_SESSION['usuario']['id']) {

                require_once('views/cambiar_contraseña.php');
                
            }else{
                header('Location: '. URL_BASE .'inicio/');
            }
        }
        public function updatePerfil(){
            session_start();
            if( $_SESSION && isset( $_SESSION['usuario']['id']) && $_POST['upda_nombre'] ){

                $objUpdatePerfil = new UserModel();

                $objUpdatePerfil->setId($_SESSION['usuario']['id']);

                $objUpdatePerfil->setNombre($_POST['upda_nombre']);
                $objUpdatePerfil->setApellido($_POST['upda_apellido']);
                $objUpdatePerfil->setTelefono($_POST['upda_telefono']);
                $objUpdatePerfil->setEmail($_POST['upda_email']);

                $objUpdatePerfil->updateProfile();

                header('Location: '. URL_BASE .'User/perfil');
            }else{
                header('Location: '. URL_BASE .'inicio/');
            }
        }
        public function actualizarpassword(){
            session_start();
            if (isset($_POST['nuevapass']) && $_SESSION) {

                $nueva_pass = $_POST['nuevapass'];

                $objUpPass = new UserModel();
                $objUpPass->setId($_SESSION['usuario']['id']);
                $nueva_contra = $objUpPass->password_encrypt($nueva_pass);
                $objUpPass->setPassword($nueva_contra);
                $objUpPass->update_password();

                header('Location: '. URL_BASE .'User/perfil');

            }else{
                header('Location: '. URL_BASE .'inicio/');
            }
        }
        public function user_vip(){
            session_start();
            if( isset( $_POST['id'] ) ){
                $objUser = new UserModel();
                $objUser->setId( $_POST['id'] );
                $objUser->setEstado_vip( isset( $_POST['vip'] ) ? $_POST['vip'] : '3' );
                $_SESSION['usuario']['estado_vip'] = isset( $_POST['estado_vip'] ) ? $_POST['estado_vip'] : '3';
                $objUser->setTarjeta( isset( $_POST['tarjeta'] ) ? $_POST['tarjeta'] : null );
                $objUser->setFk_rol( isset( $_POST['rol'] ) ? $_POST['rol'] : 3 );
                $objUser->updateEstadoSolicitud();
                if( isset( $_POST['usuario'] ) ){
                    header( 'Location: '. URL_BASE .'user/perfil' );
                }else {
                    echo json_encode( 'ok' );
                }                
            }else{
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