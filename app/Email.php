<?php

namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class Email {
    // DEFNIÇÃO CREDÊNCIAS SMTP
    private $username;
    private $password;
    const HOST      = 'smtp.gmail.com';
    const SECURE    = 'TLS';
    const PORT      = 587;
    const CHARSET   = 'UTF-8';
    
    public function login($user, $pass) {
        $this->username = $user;
        $this->password = $pass;
    }

    // DEFINIÇÃO DADOS DO REMETENTE
    const FROM_EMAIL = 'refudev.mail@gmail.com';
    const FROM_NAME = 'Renan Desenvolvedor';

    // MENSAGEM DE ERRO
    private $error;
    public function getError() {
        return $this->error;
    }

    // EXECUTA O ENVIO DO EMAIL
    public function sendEmail($addresses, $title, $content, $attachments = []) {
        $this->error = '';

        // INSTÂNCIA DO PHPMAILER
        $mail = new PHPMailer(true);
        try {
            // DADOS DE ACESSO SMTP
            $mail->isSMTP(true);
            $mail->Host       = self::HOST;
            $mail->Username   = $this->username;
            $mail->Password   = $this->password;
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = self::SECURE;
            $mail->Port       = self::PORT;
            $mail->CharSet    = self::CHARSET;

            // ATRIBUINDO DEFINIÇÕES DO REMETENTE
            $mail->setFrom(self::FROM_EMAIL, self::FROM_NAME);

            // LIDANDO COM VÁRIOS DESDINATÁRIOS
            $addresses = is_array($addresses) ? $addresses : [$addresses];
            foreach($addresses as $address) {
                $mail->addAddress($address);
            }

            // LIDANDO COM VÁRIOS ANEXOS
            $attachments = is_array($attachments) ? $attachments : [$attachments];
            foreach($attachments as $attachment) {
                $mail->addAttachment($attachment);
            }

            // CONTEÚDO DO EMAIL
            $mail->isHTML(true);
            $mail->Subject  = $title;
            $mail->Body     = $content;

            return $mail->send();
        } catch(PHPMailerException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }
}