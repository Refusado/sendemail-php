<?php

require __DIR__.'/vendor/autoload.php';

use \App\Email;

$adress = 'refusado@gmail.com';
$subject = 'Mailer test 01';
$body = 'Teste 01';

$obEmail = new Email;
$success = $obEmail->sendEmail($adress, $subject, $body);

echo $success ? 'Mensagem enviada com sucesso!' : $obEmail->getError();