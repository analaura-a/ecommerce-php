<?PHP

class Alerta
{
    //Métodos
    /**
     * Registra una alerta en el sistema y la guarda en la sesión
     * @param string $tipo el tipo de alerta (danger/warning/success)
     * @param string $mensaje contenido de la alerta
     */
    public function add_alerta(string $tipo, string $mensaje)
    {
        $_SESSION['alertas'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
    }

    /**
     * Vacía la lista de alertas
     */
    public function clear_alertas()
    {
        $_SESSION['alertas'] = [];
    }

    /**
     * Devuelve todas las alertas acumuladas en el sistema, y vacía la lista
     * @return string 
     */
    public function get_alertas()
    {
        if (!empty($_SESSION['alertas'])) {
            $alertasActuales = "";
            foreach ($_SESSION['alertas'] as $alerta) {
                $alertasActuales .= $this->print_alerta($alerta);
            }
            $this->clear_alertas();
            return $alertasActuales;
        } else {
            return null;
        }
    }

    /**
     * Imprime una alerta en la interfaz
     * @param $alerta
     */
    private function print_alerta($alerta): string
    {
        $html = "<div class='alert alert-{$alerta['tipo']} alert-dismissible fade show' role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        $html .= "</div>";

        return $html;
    }
}
