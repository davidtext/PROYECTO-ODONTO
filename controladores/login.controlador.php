<?php

require_once ('../modelos/usuarios.php');

if(isset ($_POST['action'])){
    if ($_POST['action'] == 'login'){
        $login_controlador = new LoginControlador();
        $login_controlador ->ingresar();
    }
}

class LoginControlador {

    public function ingresar () {
        $usuario = new Usuario();
        $usuario ->setNombre_usuario($_POST['nombre_usuario']);
        //$usuario ->setPassword($_POST['password']);
        $resultado = $usuario ->validar_usuario();
        if ($resultado->num_rows>0) {
            while{$row = $resultado ->fetch_asocc()} {
                $row {'password'};
                if (password_verify($_POST['password'], $row['password'])) {
                    header('location: ../index.php?page=listado_usuarios');
                } else {
                    header ('location:../index.php?message=Usuario o password incorrecto&status=danger');
                }
            }  
        }else {
            header ('location: ../index.php?message=Usuario o password incorrecto&status=danger');
        }
    }

    public function registrar () {

    }

}

?>