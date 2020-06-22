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
                    echo json_encode( $resTarjeta );
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
        public function generador_pdf() {
            require_once 'files/mpdf/vendor/autoload.php';
            // Create an instance of the class:
            $mpdf = new \Mpdf\Mpdf();
            $css = file_get_contents('files/pdf/style.css');
            $plantilla = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <title>Example 1</title>
                    <link rel="stylesheet" href="style.css" media="all" />
                </head>
                <body>
                    <header class="clearfix">
                    <div id="logo">
                        <h2> CINE + </h2>
                    </div>
                    <h1>TICKED DE VENTA</h1>
                    <div id="company" class="clearfix">
                        <div>CINE +</div>
                        <div>Calle 67,<br /> Mundo feliz, COL</div>
                        <div>(+57) 300 254 8785</div>
                        <div><a href="mailto:cine+@support.com">cine+@support.com</a></div>
                    </div>
                    <div id="project">
                        <div><span>GERENTE</span> Website development</div>
                        <div><span>CLIENTE</span> John Doe</div>
                        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
                    </div>
                    </header>
                    <main>
                    <table>
                        <thead>
                            <tr>
                                <th class="desc"> ID </th>
                                <th class="desc">NOMBRE</th>
                                <th class="service">CANTIDAD</th>
                                <th>PRECIO</th>
                                <th>TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="desc"> 1 </td>
                                <td class="service"> PELICULA </td>
                                <td align="center"> 4 </td>
                                <td class="total">$40.00</td>
                                <td class="total">$1,040.00</td>
                            </tr>
                        <tr>
                            <td colspan="4">DESCUENTO SILLAS</td>
                            <td class="total">$5,200.00</td>
                        </tr>
                        <tr>
                            <td colspan="4">DESCUENTO TARJETA</td>
                            <td class="total">$1,300.00</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="grand total">GRAND TOTAL</td>
                            <td class="grand total">$6,500.00</td>
                        </tr>
                        </tbody>
                    </table>
                    <div id="qr"> <img src="files/pdf/qr.png" alt=""> </div>
                    </main>
                    <footer>
                        Para poder ingresar al cine, presente este codigo en la taquilla.
                    </footer>
                </body>
                </html>';

            // Write some HTML code:
            $mpdf-> WriteHTML($css,1);
            $mpdf->WriteHTML($plantilla);

            // Output a PDF file directly to the browser
            $mpdf->Output();
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