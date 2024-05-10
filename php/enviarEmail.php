<?php
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../biblioteca/PHPMailer-PHPMailer-2128d99/src/PHPMailer.php';
require '../biblioteca/PHPMailer-PHPMailer-2128d99/src/SMTP.php';
require '../biblioteca/PHPMailer-PHPMailer-2128d99/src/Exception.php';

$para = "igomez@ingebau.com";
$nombre_destinatario = "Nombre del Destinatario"; // Reemplaza esto con el nombre real del destinatario
// Título
$título = '1..2..3.. DESPEGAMOS! GRACIAS POR TU DONACIÓN A COMUNITEA APP';

// Mensaje
$mensaje = '
<html>
<head>
  <title>Agradecimiento por tu donación</title>
  <style>
    body {
      font-family: "Comic Sans MS", cursive, sans-serif;
      background-color: #ffe6e6;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1, h4{
      color: #ff4081;
      font-size: 24px;
    }
    p {
      color: #333;
      line-height: 1.6;
    }
    .thank-you {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      margin-top: 30px;
    }
    .heart {
      color: #ff4081;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>¡Hola '.$nombre_destinatario.'!</h1>
    <p>¡Queremos expresar nuestro más sincero agradecimiento por tu generosa donación a Comunitea App!</p>
    <p>Gracias a tu apoyo, estamos más cerca de ayudar a las personas con autismo a comunicarse de una manera más efectiva y divertida utilizando pictogramas.</p>
    <p>Tu contribución marca la diferencia en la vida de muchas personas, y estamos agradecidos por tu generosidad y solidaridad.</p>
    <h4 class="thank-you">ESPERAMOS QUE HAYAS DISFRUTADO DE TU EXPERIENCIA CON NOSOTROS! <span class="heart">&#10084;</span></h4>
    <p>Con Alegría,</p>
    <p>El equipo de Comunitea App</p>
  </div>
</body>
</html>
';
// Crear una instancia de PHPMailer
$mail = new PHPMailer(true); // Lanza excepciones en caso de error

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.omega.com'; // Servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'tovar.herrera.silvia@gmail.com'; // Correo electrónico de inicio de sesión SMTP
    $mail->Password = 'Yo112211@'; // Contraseña del correo electrónico de inicio de sesión SMTP
    $mail->SMTPSecure = 'ssl'; // O 'ssl' dependiendo de tu servidor
    $mail->Port = 465; // O el puerto que uses en tu servidor

    // Configurar detalles del mensaje
    $mail->setFrom('tovar.herrera.silvia@gmail.com', 'Comunitea App'); // Correo y nombre del remitente
    $mail->addAddress($para, $nombre_destinatario); // Destinatario
    $mail->Subject = $título;
    $mail->msgHTML($mensaje);

    // Enviar correo
    $mail->send();
    echo 'El correo electrónico ha sido enviado correctamente.';
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>