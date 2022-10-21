<?php

require __DIR__.'/vendor/autoload.php';
use \App\Email;

$adress     = 'refudev.mail@gmail.com';
$subject    = 'Email automático';

$body       = file_get_contents(__DIR__.'/assets/email/content.html', true);

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$email = new Email;
$email->login($_ENV['EMAIL_USER'], $_ENV['EMAIL_PASS']);

if($email->sendEmail($adress, $subject, $body)) {
    echo "Mensagem enviada com sucesso! \n";
} else {
    global $email;
    
    echo "Erro ao enviar e-mail.\n";
    echo $email->getError() . "\n";
}