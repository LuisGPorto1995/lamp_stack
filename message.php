<?php
    // Let's get all form values
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $website = isset($_POST['website']) ? $_POST['website'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    if (!empty($email) && !empty($message)) { // If email and message field is not empty
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // If the user entered a valid email
            $receiver = "luisgporto3103@gmail.com"; // Email receiver email address
            $subject = "From: $name <$email>"; // Subject of the email. Subject looks like From: luis <luisgporto3103@hmail.com>
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\nMessage: $message";
            $sender = "From: $email";
            if (mail($receiver, $subject, $body, $sender)) {
                echo  "Your message has been sent!";
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