<?php

    // Let's get all form values
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
  $website = isset($_POST['website']) ? $_POST['website'] : '';
  $message = isset($_POST['message']) ? $_POST['message'] : '';

  if (!empty($email) && !empty($message)) { // If email and message field is not empty
    $to = 'luis@localhost';
    $subject = 'Email sent from PHP'; // Subject of the email
    // Construct the email body with user information
    $mailBody = "Thanks for using this demo! User $name with email $email, phone $phone, website $website sent the following message:\n\n$message";
    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $mailBody, $headers)) {
        echo "Your message has been sent!";
    } else {
        echo "Sorry, failed to send your message!";
    }
  } else {
      echo "Email and message required!";
  }

?>