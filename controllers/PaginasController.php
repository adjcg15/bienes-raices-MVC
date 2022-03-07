<?php
namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router) {
        $id = validarORedireccionar('/propiedades');

        //Buscar la propiedad por su id
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $router->render('paginas/blog');
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router) {  
        $mensaje = null;
        $errores = [];

        $campos = [
            "nombre" => $_POST["contacto"]["nombre"] ?? "",
            "mensaje" => $_POST["contacto"]["mensaje"] ?? "",
            "tipo" => $_POST["contacto"]["tipo"] ?? "",
            "precio" => $_POST["contacto"]["precio"] ?? "",
            "contacto" => $_POST["contacto"]["contacto"] ?? "",
        ];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];
            
            if(!$respuestas['nombre']) {
                $errores[] = "Debes agregar tu nombre";
            }

            if(strlen($respuestas['mensaje']) < 30) {
                $errores[] = "Debes de agregar un mensaje de al menos 30 caracteres";
            }

            if(!isset($respuestas['tipo'])) {
                $errores[] = "Escoge si deseas comprar o vender";
            }

            if(!$respuestas['precio']) {
                $errores[] = "Por favor propon un precio";
            }

            if(!isset($respuestas['contacto'])) {
                $errores[] = "Debes elegir un método de contacto";
            } else {
                if($respuestas['contacto'] == 'telefono') {
                    if(!$respuestas['telefono']) {
                        $errores[] = "Agrega un número de contacto";
                    }
    
                    if(!$respuestas['fecha']) {
                        $errores[] = "Agrega una fecha para ser contactado";
                    }
    
                    if(!$respuestas['hora']) {
                        $errores[] = "Agrega una hora para ser contactado";
                    }
                }
    
                if($respuestas['contacto'] == 'email') {
                    if(!$respuestas['email']) {
                        $errores[] = "Agrega un email de contacto";
                    }
                }
            }

            if(empty($errores)) {
                //Crear instancia de phpmailer
                $mail = new PHPMailer();

                //Configurar SMTP
                $mail->isSMTP();
                $mail->Host = $_ENV["MAIL_HOST"];
                $mail->SMTPAuth = true;
                $mail->Username = $_ENV["MAIL_USER"] ;
                $mail->Password = $_ENV["MAIL_PASS"];
                $mail->SMTPSecure = 'tls';
                $mail->Port = $_ENV["MAIL_PORT"];

                //Configurar el contenido del email
                $mail->setFrom('admin@bienesraices.com');
                $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
                $mail->Subject = 'Tienes un nuevo mensaje';

                //Habilitar html
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';

                //Definir el contenido
                $contenido = '<html>'; 
                $contenido .= '<p>Tienes un nuevo mensaje</p>'; 
                $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

                //Enviar de forma condicional algunos campos de email o teléfono
                if($respuestas['contacto'] === 'telefono') {
                    $contenido.= '<p>Eligió ser contactado por Teléfono:</p>';
                    $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
                    $contenido .= '<p>Fecha de contacto: ' . $respuestas['fecha'] . '</p>';
                    $contenido .= '<p>Hora de contacto: ' . $respuestas['hora'] . '</p>';
                } else {
                    $contenido.= '<p>Eligió ser contactado por Email:</p>';
                    $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
                }

                $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
                $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
                $contenido .= '<p>Precio o presupuesto: $' . $respuestas['precio'] . '</p>';
                $contenido .= '</html>';

                $mail->Body = $contenido;
                $mail->AltBody = 'Esto es texto alternativo sin HTML';

                //Enviar el email
                if($mail->send()) {
                    $mensaje = "Mensaje Enviado Correctamente";
                    $campos = [
                        "nombre" => "",
                        "mensaje" => "",
                        "tipo" => "",
                        "precio" => "",
                        "contacto" => "",
                    ];
                } else {
                    $mensaje = "El mensaje no se pudo enviar";
                }
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje,
            'errores' => $errores,
            'campos' => $campos
        ]);
    }
}