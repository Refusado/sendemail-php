<?php

require __DIR__.'/vendor/autoload.php';
use \App\Email;

$email = new Email;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$email->login($_ENV['EMAIL_USER'], $_ENV['EMAIL_PASS']);

$adress     = ['refudev.mail@gmail.com'];
$subject    = 'Email automático';
$body       = file_get_contents(__DIR__.'/assets/email/content.html', true);

if($email->sendEmail($adress, $subject, $body)) {
    if (is_array($adress)) {
        $adressesNo = count($adress);
        if ($adressesNo > 1) {
            echo "E-mail enviado com sucesso para $adressesNo destinários! \n";
        } else {
            $adress = $adress[0];
            echo "E-mail enviado para $adress! \n";
        };
    } else {
        echo "E-mail enviado para $adress! \n";
    };
} else {
    global $email;
    
    echo "Erro ao enviar e-mail.\n";
    echo $email->getError() . "\n";
}