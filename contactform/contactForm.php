<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos están definidos
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $email_address = htmlspecialchars(trim($_POST['email']));
        $number = htmlspecialchars(trim($_POST['number']));

        // Validar dirección de correo electrónico
        if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.";
            exit;
        }

        // Configuración SMTP usando ini_set()
        ini_set('SMTP', 'smtp.gmail.com');
        ini_set('smtp_port', '587');
        ini_set('sendmail_from', 'bdh99xdxd@gmail.com');

        // Información del correo
        $to = "recipient@example.com"; // Reemplaza con la dirección de correo del destinatario
        $subject = "New message from contact form";
        $body = "Name: $name\nEmail: $email_address\nNumber: $number";
        $headers = "From: bdh99xdxd@gmail.com"; // Reemplaza con la dirección de correo del remitente

        // Enviar correo
        if (mail($to, $subject, $body, $headers)) {
            echo "Email sent successfully.";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request.";
}
?>
