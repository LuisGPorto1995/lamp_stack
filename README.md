Readme file for the "Contact Form" project example (for windows wamp)

The SMTP service used is the hMailServer. which can be installed following the instructions bellow:
https://stackoverflow.com/questions/16830673/wamp-xamp-send-mail-using-smtp-localhost

Notice that it can be used to send emails as localhost, but it can also use external SMTP services (such as gmail) to send emails outside your machine, but I selected the localhost method

It is also important to disable authentication from local to external and/or external to external, otherwise the "mail()" function inside "message.php" will call an error.
https://www.hmailserver.com/forum/viewtopic.php?f=6&t=22039

