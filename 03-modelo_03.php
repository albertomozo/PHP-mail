<?php
include 'inc/config_02.php';
// datos de email

$correos = ['albertomozodocente@gmail.com','albertomozodocente@gmail.com','albertomozodocente@gmail.com'];
$nombres = ['Alberto','Bert', 'Albert'];

for ($i = 0; $i < count($correos); $i++)
{
    try {
        //Server settings
    
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        $mail->SMTPDebug =   $mailerDebug ;              //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $mailerUser;                     //SMTP username
        $mail->Password   = $mailerPassword;                               //SMTP password
        $mail->SMTPSecure = $mailerSMTPSecure;
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('albertomozodesarrollador@gmail.com', 'albertomozodesarrollador@gmail.com');
        $mail->addAddress($correos[$i]);     //Add a recipient
       
        //Attachments
        $adjunto = $_SERVER['DOCUMENT_ROOT'] . '/PHP-github/PHP-MAIL/assets/640px-PHP-logo.svg.png';
        $mail->addAttachment($adjunto);         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        $contenido = $mailCabecera;
        $contenido .= '<tr>
        <td style="padding:36px 30px 42px 30px;">
            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                    <td style="padding:0 0 36px 0;color:#153643;">
                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">'.$nombres[$i].'</h1>
                        <p>Bienvenid@ a nuestra  web</p>
                        <p>Su correo es : '. $correos[$i] .'</p>
                    </td>
                </tr>
            </table>
        </tr>';
        $contenido .= $mailPie;
        $asunto = 'Ongi Etorri  : ' . $nombres[$i];  

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $contenido;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
