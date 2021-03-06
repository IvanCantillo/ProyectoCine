<?php 
    require_once ('models/MovieModel.php');
    require_once ('models/SalaModel.php');
    require_once ('models/UserModel.php');
    require_once ('models/VentaModel.php');
    class ComprarController {
        
        public function index(){
            session_start();
            if (!isset( $_SESSION['usuario']['id'] )) {
                header('Location: '. URL_BASE .'user/login');
            }else {
                if( isset( $_POST['id'] ) && isset( $_POST['horario'] ) ){
                    $id = $_POST['id'];
                    $horario = $_POST['horario'];
    
                    $objMovie = new MovieModel();
                    $objSala = new SalaModel();
    
                    $objMovie->setId( $id );
                    $resMovie = $objMovie->getMovieBySala();
                    $sala = $resMovie['sala'];
                    $objSala->setSala( $sala );
                    $resChair =$objSala->listChairsOfSala();
                    
                    require_once ('views/comprar_tickets.php');
                }else {
                    header('location: '. URL_BASE .'inicio/');
                }
            }
        }
        public function reporte(){
            session_start();
            if($_SESSION && $_SESSION['usuario']['rol'] == 1){

                $objReport = new VentasModel();

                $resReporte = $objReport->AllVentas();

                require_once('views/reporte_comprar.php');
            }else{
                header('location: '. URL_BASE .'inicio/');
            }
        }
        public function lista(){
            session_start();
            if($_SESSION['usuario']['rol'] == 3 || $_SESSION['usuario']['rol'] == 2){

                $usuario = $_SESSION['usuario']['id'];
                
                $objList = new VentasModel();
                $objList->setFk_usuario($usuario);
                $listCompras = $objList->getVentasByUser();
                require_once('views/reporte_comprar_usuario.php');

            }else{
                header('location: '. URL_BASE .'inicio/');
            }
        }
        public function comprar_ticket() {
            session_start();
            if( isset( $_POST['id_pelicula']) ){
                $objVenta = new VentasModel();
                $objVenta->setFk_usuario( $_SESSION['usuario']['id'] );
                $objVenta->setFk_pelicula( $_POST['id_pelicula'] );
                $objVenta->setCantidad( $_POST['cantidad'] );
                $objVenta->setDescuento_silla( $_POST['descuento_silla'] );
                $objVenta->setDescuento_tarjeta( $_POST['descuento_tarjeta'] );
                $objVenta->setPrecio( $_POST['precio'] );
                $objVenta->setFecha_creacion( $_POST['fecha_creacion'] );
                $objVenta->setTotal( $_POST['total'] );
                $objVenta->comprar();

                require_once 'files/mpdf/vendor/autoload.php';
                // Create an instance of the class:
                $mpdf = new \Mpdf\Mpdf();
                $css = file_get_contents('files/pdf/style.css');
                $plantilla = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <title></title>
                        <link rel="stylesheet" href="style.css" media="all" />
                    </head>
                    <body>
                        <header class="clearfix">
                        <div id="logo">
                            <h2> <a href="http://127.0.0.1/Proyecto_cine/" style="text-decoration: none;"> CINE + </a>  </h2>
                        </div>
                        <h1>TICKED DE VENTA</h1>
                        <div id="company" class="clearfix">
                            <div>CINE +</div>
                            <div>Calle 67,<br /> Mundo feliz, COL</div>
                            <div>(+57) 300 254 8785</div>
                            <div><a href="mailto:cine+@support.com">cine+@support.com</a></div>
                        </div>
                        <div id="project">
                            <div><span> GERENTE </span> Administrador </div>
                            <div><span>CLIENTE</span> '. $_SESSION['usuario']['nombre'] .'</div>
                            <div><span>EMAIL</span> <a href="mailto:'. $_SESSION['usuario']['correo'] .'">'. $_SESSION['usuario']['correo'] .'</a></div>
                        </div>
                        </header>
                        <main>
                        <table>
                            <thead>
                                <tr>
                                    <th class="desc"> # </th>
                                    <th class="desc">NOMBRE</th>
                                    <th class="service">CANTIDAD</th>
                                    <th>PRECIO</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="desc"> 1 </td>
                                    <td class="service"> '. $_POST['nombre_pelicula'] .' </td>
                                    <td align="center"> '. $_POST['cantidad'] .' </td>
                                    <td class="total">$'. $_POST['precio'] .'</td>
                                    <td class="total">$'. ($_POST['precio'] * $_POST['cantidad']) .'</td>
                                </tr>
                            <tr>
                                <td colspan="4">DESCUENTO SILLAS</td>
                                <td class="total">$'. $_POST['descuento_silla'] .'</td>
                            </tr>
                            <tr>
                                <td colspan="4">DESCUENTO TARJETA</td>
                                <td class="total">$'. $_POST['descuento_tarjeta'] .'</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="grand total">GRAND TOTAL</td>
                                <td class="grand total">$'. $_POST['total'] .'</td>
                            </tr>
                            </tbody>
                        </table>
                        <div id="qr"> <img src="files/pdf/qr.png" alt=""> </div>
                        </main>
                        <footer>
                            Para poder ingresar al cine, presente este codigo en la taquilla.
                            <a href="http://127.0.0.1/Proyecto_cine/"> Volver al inicio </a>
                        </footer>
                    </body>
                    </html>';
    
                // Write some HTML code:
                $mpdf-> WriteHTML($css,1);
                $mpdf->WriteHTML($plantilla);
    
                // Output a PDF file directly to the browser
                $mpdf->Output();
            }else {
                header('location: '. URL_BASE .'inicio/');
            }
            
        }
        

        


     }