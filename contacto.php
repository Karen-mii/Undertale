<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = htmlspecialchars(trim($_POST['correo']));
    $mensaje = htmlspecialchars(trim($_POST['message']));

    if (!empty($nombre) && !empty($correo) && !empty($mensaje)) {
        $para = "dakheozzz@gmail.com";
        $asunto = "Nuevo mensaje de contacto desde el sitio";
        $contenido = "Nombre: $nombre\nCorreo: $correo\n\nMensaje:\n$mensaje";
        $headers = "From: $correo\r\n";
        $headers .= "Reply-To: $correo\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($para, $asunto, $contenido, $headers)) {
            echo "¡Gracias por tu mensaje! Nos pondremos en contacto pronto.";
        } else {
            echo "Hubo un error al enviar tu mensaje. Intenta nuevamente.";
        }
    } else {
        echo "Por favor, completa todos los campos.";
    }
}
?>