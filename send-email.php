<?php

require __DIR__.'/vendor/autoload.php';
use \App\Email;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$adress     = 'refudev.mail@gmail.com';
$subject    = 'E-mail automático 09';
$body       = '<h1>E-mail automático</h1><br><p>Este email foi enviado <b>com sucesso</b> de maneira automática.</p>';

$email = new Email;
$email->login($_ENV['EMAIL_USER'], $_ENV['EMAIL_PASS']);

if($email->sendEmail($adress, $subject, $body)) {
    echo "Mensagem enviada com sucesso! \n";
} else {
    global $email;
    
    echo "Erro ao enviar e-mail.\n";
    echo $email->getError() . "\n";
}