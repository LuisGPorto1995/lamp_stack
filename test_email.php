<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';
  require '/usr/share/php/libphp-phpmailer/src/SMTP.php';
  require '/usr/share/php/libphp-phpmailer/src/Exception.php';

  // Create a new PHPMailer instance
  $mail = new PHPMailer();

  // Configure SMTP settings
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->SMTPAuth = true;
  $mail->Username = 'luisgporto3103@gmail.com';
  $mail->Password = 'vgqjoavcznfjuhzm';

  // Set email content
  $mail->setFrom('luisgporto3103@gmail.com', 'Luis');
  $mail->addAddress('lgplink9@gmail.com', 'Porto');
  $mail->Subject = 'Test Email from PHPMailer';
  $mail->Body = 'This is a test email sent from PHPMailer.';

  // Attempt to send the email
  if ($mail->send()) {
    echo 'Test email sent successfully!';
  } else {
    echo 'Failed to send test email. Error: ' . $mail->ErrorInfo;
  }
?>
