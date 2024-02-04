<?php
    //let's get all form values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $message = $_POST['message'];

    if(!empty($email) && !empty($message)) { //if email and message field is not empty
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) { // if the user entered a valid email
            $receiver = "luisgporto3103@gmail.com"; //email receiver email address
            $subject = "From: $name <$email>"; //subject of the email. Subject looks like From: luis <luisgporto3103@hmail.com>
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\nMessage: $message";
            $sender = "From: $email";
            if(mail($receiver, $subject, $body, $sender)) {
                echo  "Your message has been sent!";
            } else {
                echo "Sorry, failed to send your message!";
            }
        }else {
            echo "Enter a valid email address!";
        }
    }else {
        echo "Email and message required!";
    }
?>