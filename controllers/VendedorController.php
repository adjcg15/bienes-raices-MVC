<?php
namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController {
    public static function crear(Router $router) {
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //crear nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
    
            //Validar que no hay cambios vacíos
            $errores = $vendedor->validar();
    
            //Si no hay errores:
            if(empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router -> render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar(Router $router) {
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        //Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asignar los valores
            $args = $_POST['vendedor'];
    
            //Sincronizar objeto en memoria con lo que el usauario actualiza
            $vendedor->sincronizar($args);
    
            //Validación
            $errores = $vendedor->validar();
    
            if(empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validar el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                //Valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}