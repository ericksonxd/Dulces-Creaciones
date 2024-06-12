<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$response = array('success' => false, 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar todos los campos del formulario
    $errors = [];
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Correo electrónico no válido";
    }
    if (empty($_POST['nombre'])) {
        $errors[] = "Por favor ingrese su nombre";
    }
    if (empty($_POST['telefono']) || !preg_match('/^\+?\d{1,3}\d{9,}$/', $_POST['telefono'])) {
        $errors[] = "Número de teléfono no válido. Use un formato válido.";
    }
    if (empty($_POST['sabor'])) {
        $errors[] = "Por favor seleccione un sabor";
    }
    if (empty($_POST['presentacion'])) {
        $errors[] = "Por favor seleccione una presentación";
    }
    if (empty($_POST['fecha']) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST['fecha'])) {
        $errors[] = "Por favor seleccione una fecha válida (formato YYYY-MM-DD)";
    } else {
        $fecha_actual = strtotime(date("Y-m-d"));
        $fecha_ingresada = strtotime($_POST['fecha']);
        $limite = strtotime('+2 day', $fecha_actual); // Añade dos días a la fecha actual
        if ($fecha_ingresada <= $limite) {
            $errors[] = "La fecha de entrega debe ser al menos dos días después de hoy";
        }
    }

    // Si hay errores, mostrar alertas y detener el proceso
    if (!empty($errors)) {
        $response['message'] = implode("\n", $errors);
    } else {
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $sabor = $_POST['sabor'];
        $presentacion = $_POST['presentacion'];

        $mail = new PHPMailer(true);

        try {
            // Configuraciones del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'erick.pereira6677@gmail.com';
            $mail->Password = 'ozzh nsht zngo qyjk'; // Asegúrate de usar una contraseña de aplicación o considera usar variables de entorno
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Remitente y destinatario
            $mail->setFrom('erick.pereira6677@gmail.com', 'Dulces Creaciones');
            $mail->addAddress('adoroamivaca@gmail.com', $nombre); // Enviar al correo del cliente

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Confirmacion de Pedido';
            $mail->Body    = "<h1>Gracias por tu pedido!</h1>
                              <p>Detalles del pedido:</p>
                              <p>Sabor: {$_POST['sabor']}</p>
                              <p>Nombre del cliente: {$_POST['nombre']}</p>
                              <p>Correo del cliente: {$_POST['email']}</p>
                              <p>Presentación: {$_POST['presentacion']} gr</p>
                              <p>Teléfono de contacto: {$_POST['telefono']}</p>
                              <p>Direccion del cliente: {$_POST['direccion']}</p>
                              <p>Cantidad del producto: {$_POST['cantidad']}</p>
                              <p>Fecha de entrega: {$_POST['fecha']}</p>";

            $mail->send();
            $response['success'] = true;
            $response['message'] = 'Orden recibida, estaremos en contacto contigo muy pronto';
        } catch (Exception $e) {
            $response['message'] = "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
        }
    }
}

echo json_encode($response);
?>