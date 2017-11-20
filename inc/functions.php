<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader not required here if it is already called in config.php
//require '../vendor/autoload.php';
//(user email,subject, htmlcontent link do reset pswd, )
function sendEmail ($to, $subject, $htmlContent, $textContent=''){
  global $config;
  $mail = new PHPMailer(true);     // Passing `true` enables exceptions


  try {
      //Server settings
      $mail->SMTPDebug = 6;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = $config['MAIL_HOST'];  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = $config['MAIL_USERNAME'];                 // SMTP username
      $mail->Password = $config['MAIL_PASSWORD'];           // file_get_contents('pswd.txt'); SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('tam_escalante@hotmail.com', 'Tam hotmail');
      $mail->addAddress('escalante_tam@yahoo.co.uk', 'tam yahoo');     // Add a recipient
      /*$mail->addReplyTo('info@example.com', 'Information');
      $mail->addCC('cc@example.com');
      $mail->addBCC('bcc@example.com');

      //Attachments
      $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  */
      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;        //'Here is the subject';
      $mail->Body    = '<b>'.$htmlContent.'</b>';       //'This is the HTML message body <b>in bold!</b>';
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  }
}//closes function sendEmail

?>
