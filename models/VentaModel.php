<?php
require_once('config/Conexion.php');

class VentasModel{
    private $id;
    private $fk_usuario;
    private $fk_pelicula;
    private $cantidad;
    private $descuento_silla;
    private $descuento_tarjeta;
    private $precio;
    private $fecha_creacion;
    private $total;

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

	public function getFk_usuario(){
		return $this->fk_usuario;
	}

	public function setFk_usuario($fk_usuario){
		$this->fk_usuario = $fk_usuario;
	}

	public function getFk_pelicula(){
		return $this->fk_pelicula;
	}

	public function setFk_pelicula($fk_pelicula){
		$this->fk_pelicula = $fk_pelicula;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function getDescuento_silla(){
		return $this->descuento_silla;
	}

	public function setDescuento_silla($descuento_silla){
		$this->descuento_silla = $descuento_silla;
	}

	public function getDescuento_tarjeta(){
		return $this->descuento_tarjeta;
    }

	public function setDescuento_tarjeta($descuento_tarjeta){
		$this->descuento_tarjeta = $descuento_tarjeta;
    }

    public function getPrecio(){
		return $this->precio;
    }

	public function setPrecio($precio){
		$this->precio = $precio;
    }

    public function getFecha_creacion(){
		return $this->fecha_creacion;
    }

	public function setFecha_creacion($fecha_creacion){
		$this->fecha_creacion = $fecha_creacion;
    }

	public function getTotal(){
		return $this->total;
	}

	public function setTotal($total){
		$this->total = $total;
    }


    public function AllVentas() {
        $sqlVentas = 'SELECT ventas.*, usuarios.nombre AS nombre_usuario, peliculas.nombre AS nombre_pelicula FROM ventas INNER JOIN usuarios ON ventas.fk_usuario = usuarios.id INNER JOIN peliculas ON ventas.fk_pelicula = peliculas.id';
        $ventas = $this->conexion->prepare( $sqlVentas );
        $ventas->execute();
        return $ventas;
    }

    public function getVentasByUser() {
        $sqlVenta = 'SELECT ventas.*, usuarios.nombre AS nombre_usuario, peliculas.nombre AS nombre_pelicula FROM ventas INNER JOIN usuarios ON ventas.fk_usuario = usuarios.id INNER JOIN peliculas ON ventas.fk_pelicula = peliculas.id WHERE ventas.fk_usuario = :fk_usuario';
        $ventas = $this->conexion->prepare( $sqlVenta );
        $ventas->execute( array( ":fk_usuario" => $this->fk_usuario ) );
        return $ventas;
    }

    // public function getVentasByMovie() {
    //     $sqlVenta = 'SELECT ventas.*, usuarios.nombre AS nombre_usuario, peliculas.nombre AS nombre_pelicula FROM ventas INNER JOIN usuarios ON ventas.fk_usuario = usuarios.id INNER JOIN peliculas ON ventas.fk_pelicula = peliculas.id WHERE ventas.fk_pelicula = :fk_pelicula';
    //     $ventas = $this->conexion->prepare( $sqlVenta );
    //     $ventas->execute( array( ":fk_pelicula" => $this->fk_pelicula ) );
    //     return $ventas;
    // }

    // public function getVentasByFecha() {
    //     $sqlVenta = 'SELECT ventas.*, usuarios.nombre AS nombre_usuario, peliculas.nombre AS nombre_pelicula FROM ventas INNER JOIN usuarios ON ventas.fk_usuario = usuarios.id INNER JOIN peliculas ON ventas.fk_pelicula = peliculas.id WHERE fecha_creacion = :fecha_creacion';
    //     $ventas = $this->conexion->prepare( $sqlVenta );
    //     $ventas->execute( array( ":fecha_creacion" => $this->fecha_creacion ) );
    //     return $ventas;
    // }

}