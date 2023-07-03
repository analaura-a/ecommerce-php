<?PHP

class Imagen
{
    protected $error;

    public function subirImagen($directorio, $datosArchivo): string
    {
        echo "<pre>";
        print_r($datosArchivo);
        echo "</pre>";

        if (!empty($datosArchivo['tmp_name'])) {
            $nombre_separado = (explode(".", $datosArchivo['name']));
            $extension = end($nombre_separado);
            $filename = uniqid() . ".$extension";

            $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], "$directorio/$filename");

            if (!$fileUpload) {
                throw new Exception("No se pudo subir la imagen");
            } else {
                return $filename;
            }
        }
    }


    public function borrarImagen($archivo): bool
    {
        if (file_exists(($archivo))) {

            $fileDelete = unlink($archivo);

            if (!$fileDelete) {
                throw new Exception("No se pudo subir la imagen");
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Get the value of error
     */
    public function getError()
    {
        return $this->error;
    }
}
