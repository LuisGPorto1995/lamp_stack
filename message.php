<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '/usr/share/php/libphp-phpmailer/src/PHPMailer.php';
  require '/usr/share/php/libphp-phpmailer/src/SMTP.php';
  require '/usr/share/php/libphp-phpmailer/src/Exception.php';

  // Let's get all form values
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
  $website = isset($_POST['website']) ? $_POST['website'] : '';
  $message = isset($_POST['message']) ? $_POST['message'] : '';

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

  if (!empty($email) && !empty($message)) {                     // If email and message field is not empty
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {            // If the user entered a valid email
      $mail->addAddress('luisgporto3103@gmail.com', 'Luis');   // Email receiver email address
      $mail->Subject = 'Email sent from PHPMailer';             // Subject of the email. Subject looks like From: luis <luisgporto3103@hmail.com>
      // Construct the email body with user information
      $mailBody = "Thanks for using this demo! User $name with email $email, phone $phone, website $website sent the following message:\n\n$message";
      $mail->Body = $mailBody;
      $mail->setFrom('luisgporto3103@gmail.com','Luis');

      if ($mail->send()) {
        echo "Your message has been sent!";
      } else {
        echo "Sorry, failed to send your message!";
      }
    } else {
      echo "Enter a valid email address!";
    }
  } else {
    echo "Email and message required!";
  }
  
?>