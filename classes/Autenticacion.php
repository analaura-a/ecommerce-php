<?PHP

class Autenticacion
{

    /**
     * Verifica las credenciales del usuario, y de ser correctas guarda los datos en la sesión
     * @param string $username El nombre de usuario provisto
     * @param string $password El password provisto
     */
    public function log_in(string $usuario, string $password): ?string
    {

        echo "<p>VAMOS A INTENTAR AUTENTICAR UN USUARIO</p>";
        echo "<p>El nombre de usuario provisto es: $usuario</p>";
        echo "<p>El password provisto es: $password</p>";

        $datosUsuario = (new Usuario())->usuario_x_username($usuario);

        if ($datosUsuario) {
            if (password_verify($password, $datosUsuario->getPassword())) {
                echo "<p>EL PASSWORD ES CORRECTO! LOGUEAR!</p>";
                $datosLogin['username'] = $datosUsuario->getNombre_usuario();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();
                $_SESSION['loggedIn'] = $datosLogin;
                return $datosLogin['rol'];
            } else {
                (new Alerta())->add_alerta('danger', "¡La contraseña ingresada no es correcta!");
                return null;
            }
        } else {
            (new Alerta())->add_alerta('warning', "El usuario ingresado no se encontró en nuestra base de datos.");
            return null;
        }
    }


    public function log_out()
    {
        //(new Alerta())->clear_alertas();
        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }

    public function verify(): bool
    {
        if (isset($_SESSION['loggedIn'])) {
            return TRUE;
        } else {
            return FALSE;
            header('location: ./index.php?seccion=login');
        }
    }
}
