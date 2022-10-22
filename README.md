# Sendemail - PHP

Este é um sistema de envio de email simples feito em PHP através da biblioteca **[PHPMailer](https://github.com/PHPMailer/PHPMailer)** e dos padrões do protocolo SMTP com o **[Gmail](https://www.google.com/intl/pt-BR/gmail/about/)** após as atualizações de segurança e autenticação.

### Algumas funcionalidades

Ao enviar emails com este sistema, também é possível

- Enviar automaticamente para um ou vários destinários escolhidos;
- Especificar a quem o email enviado será respondido;
- Definir dinamicamente assunto e corpo do e-mail (HTML, Plain Text e Rich Text);
- Adicionar anexos nomeados

### Exemplo de email
<details>
    <summary>Mostrar imagem</summary>
    
[<img height="600px" src="https://raw.githubusercontent.com/Refusado/sendemail-php/main/assets/img/email-exemple.png?token=GHSAT0AAAAAABYAR2CHRLE2RTPWXUAO6ZQ2Y2UFNHA" title="Exemplo de email enviado">](https://github.com/Refusado/sendemail-php/blob/main/assets/img/email-exemple.png)

</details>

#### Serviço SMTP

O *Simple Mail Protocol* ou *Protocolo de Transferência de Correio Simples* é o protocolo padrão quando se fala em envio de emails entre servidores. Na sequência as configurações de cliente do SMTP para trabalhar com o Gmail.

|||
|---|---|
Servidor | `smtp.gmail.com`
Requer SSL | Sim
Requer TLS | Sim (se disponível)
Requer autenticação | Sim
Porta para SSL | 465
Porta para TLS/STARTTLS | 587

Fonte das configurações do Gmail: *[Suporte do Google](https://support.google.com/mail/answer/7126229)*