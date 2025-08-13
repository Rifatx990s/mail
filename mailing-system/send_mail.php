<?php
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load GET data
$to      = $_GET['to'] ?? '';
$subject = $_GET['subject'] ?? '';
$body    = $_GET['body'] ?? '';

if (!$to || !$subject || !$body) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required parameters']);
    exit;
}

// Load SMTP credentials from environment variables
$smtpHost     = getenv('SMTP_HOST');
$smtpPort     = getenv('SMTP_PORT');
$smtpUser     = getenv('SMTP_USER');
$smtpPassword = getenv('SMTP_PASSWORD');
$smtpSecure   = getenv('SMTP_SECURE') ?: 'ssl'; // ssl or tls

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser;
    $mail->Password   = $smtpPassword;
    $mail->SMTPSecure = $smtpSecure;
    $mail->Port       = $smtpPort;

    $mail->setFrom($smtpUser, 'Mailing System');
    $mail->addAddress($to);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo json_encode(['success' => true, 'message' => 'Email sent successfully']);
} catch (Exception $e) {
    echo json_encode(['error' => $mail->ErrorInfo]);
}
