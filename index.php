<?php

require __DIR__.'/vendor/autoload.php';
use \App\Email;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$adress     = 'refudev.mail@gmail.com';
$subject    = 'E-mail automático 09';
$body       = file_get_contents(__DIR__.'/app/email-content.html', true);

$email = new Email;
$email->login($_ENV['EMAIL_USER'], $_ENV['EMAIL_PASS']);

if($email->sendEmail($adress, $subject, $body)) {
    echo "Mensagem enviada com sucesso! \n";
} else {
    global $email;
    
    echo "Erro ao enviar e-mail.\n";
    echo $email->getError() . "\n";
}