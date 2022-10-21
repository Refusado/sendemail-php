<?php

namespace App;

require __DIR__.'/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class Email {

    // CREDÊNCIAS DE ACESSO SMTP
    const HOST = 'smtp.gmail.com';
    const USER = '';
    const PASS = '';
    const SECURE = 'TLS';
    const PORT = 587;
    const CHARSET = 'UTF-8';

    // DADOS DO REMETENTE
    const FROM_EMAIL = 'refudev.mail@gmail.com';
    const FROM_NAME = 'Renan Freitas Desenvolvedor';

    // MENSAGEM DE ERRO
    private $error;

    // RETORNA A MENSAGEM DO ERRO
    public function getError() {
        return $this->error;
    }

    // EXECUTA O ENVIO DO EMAIL
    public function sendEmail($addresses, $subject, $body, $attachments = []) {
        // limpar a mensagem de erro
        $this->error = '';

        // INSTANCIAR DE PHPMAILER
        $obMail = new PHPMailer(true);
        try {

            // DADOS DE ACESSO SMTP
            $obMail->isSMTP(true);
            $obMail->Host = self::HOST;
            $obMail->SMTPAuth = true;
            $obMail->Username = self::USER;
            $obMail->Password = self::PASS;
            $obMail->SMTPSecure = self::SECURE;
            $obMail->Port = self::PORT;
            $obMail->CharSet = self::CHARSET;

            // REMETENTE
            $obMail->setFrom(self::FROM_EMAIL, self::FROM_NAME);

            // DESDINATÁRIOS
            $addresses = is_array($addresses) ? $addresses : [$addresses];
            foreach($addresses as $address) {
                $obMail->addAddress($address);
            }

            // ANEXOS
            $attachments = is_array($attachments) ? $attachments : [$attachments];
            foreach($attachments as $attachment) {
                $obMail->addAttachment($attachment);
            }

            // CONTEÚDO DO EMAIL
            $obMail->isHTML(true);
            $obMail->Subject = $subject;
            $obMail->Body = $body;

            // ENVIA O EMAIL;
            return $obMail->send();

        } catch(PHPMailerException $e) {
            $this->error = $e->getMessage();
            return false;
        }
        

    }

}