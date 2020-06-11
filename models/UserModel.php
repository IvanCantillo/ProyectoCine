<?php 
    require_once ('config/Conexion.php');
    class UserModel {
        private $id;
        private $nombre;
        private $apellido;
        private $telefono;
        private $tarjeta;
        private $fecha_nacimiento;
        private $email;
        private $password;
        private $fk_rol;
        private $fk_estado;
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
    
        public function getApellido(){
            return $this->apellido;
        }
    
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
    
        public function getTelefono(){
            return $this->telefono;
        }
    
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
    
        public function getTarjeta(){
            return $this->tarjeta;
        }
    
        public function setTarjeta($tarjeta){
            $this->tarjeta = $tarjeta;
        }
    
        public function getFecha_nacimiento(){
            return $this->fecha_nacimiento;
        }
    
        public function setFecha_nacimiento($fecha_nacimiento){
            $this->fecha_nacimiento = $fecha_nacimiento;
        }
    
        public function getEmail(){
            return $this->email;
        }
    
        public function setEmail($email){
            $this->email = $email;
        }
    
        public function getPassword(){
            return $this->password;
        }
    
        public function setPassword($password){
            $this->password = $password;
        }
    
        public function getFk_rol(){
            return $this->fk_rol;
        }
    
        public function setFk_rol($fk_rol){
            $this->fk_rol = $fk_rol;
        }
    
        public function getFk_estado(){
            return $this->fk_estado;
        }
    
        public function setFk_estado($fk_estado){
            $this->fk_estado = $fk_estado;
        }

        public function password_encrypt( $password ){
            return hash("sha256", $password);
        }

        public function login() {
            $sqlEmail = "SELECT * FROM usuarios WHERE email = :email";
            $email = $this->conexion->prepare( $sqlEmail );
            $email->execute( array( ":email" => $this->email ) );
            if( $email->rowCount() > 0 ){
                $sqlLogin = $sqlEmail .=  " AND password = :password";
                $login = $this->conexion->prepare( $sqlLogin );
                $login->execute( array( ":email" => $this->email, ":password" => $this->password ) );
                return $login->fetch( PDO::FETCH_ASSOC );
            }else {
                return 'user-not-exist';
            }   
        }

        public function register() {
            $sqlEmail = 'SELECT * FROM usuarios WHERE email = :email';
            $email = $this->conexion->prepare( $sqlEmail );
            $email->execute( array( ':email' => $this->email ) );
            if ($email->rowCount() > 0) {
                return 'user-exist';
            } else {
                $sqlRegister = 'INSERT INTO `usuarios`(`nombre`, `apellido`, `telefono`, `email`, `password`, `tarjeta`, `fecha_nacimiento`, `fk_rol`, `fk_estado`) VALUES (:nom, :ape, :tel, :email, :pass, :tar, :naci, :fk_rol, :fk_estado)';
                $register = $this->conexion->prepare( $sqlRegister );
                $register->execute( array( ':nom' => $this->nombre, ':ape' => $this->apellido, ':tel' => $this->telefono, ':email' => $this->email, ':pass' => $this->password, ':tar' => $this->tarjeta, ':naci' => $this->fecha_nacimiento, ':fk_rol' => $this->fk_rol, ':fk_estado' => $this->fk_estado ) );
                return $register;
            }
        }

        public function tarjetas() {
            $sqlTarjetas = 'SELECT tarjeta FROM usuarios WHERE fk_rol = 2';
            $tarjetas = $this->conexion->prepare( $sqlTarjetas );
            $tarjetas->execute();
            return $tarjetas;
        }
    }