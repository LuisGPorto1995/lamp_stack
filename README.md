Readme file for the "Contact Form" project example

Since a domain name is required to configure this server as a SMTP server, then the Gmail SMTP will be used. This means that my own personal gmail account will be used as a placeholder for what it should be the company's own domain email account (e.g. company@company.com)

To see how to configure Gmail SMTP, follow the instructions in https://scanskill.com/programming/configure-postfix-with-gmail-smtp-on-ubuntu-22-04-20-04-18-04/
Also, PHPMailer was used to send the email using the Gmail SMTP

To facilitate understanding, a summary of the installation process is given bellow

- The first step is having an gmail account and configure its second step authentication for security and create a new app name and generate its 16 character password (as instructed by the link above)
- After that, the Gmail SMTP is installed by following the instructions bellow:

    //Install postfix and mailutils
    /*On the prompt screen, select Internet Site as the type of mail server. On the next screen give the system mail name. Use your domain if configured, otherwise use it as a localhost. You can change it later also.*/
    $ sudo apt update
    $ sudo apt install postfix mailutils -y

    //Now its time to set the Gmail authentication. First create a sasl_passwd file
    $ sudo nano /etc/postfix/sasl/sasl_passwd
    //Then, write the following text inside it
    [smtp.gmail.com]:587   gmail@gmail.com:yourcode     //where gmail@gmail is your gmail and yourcode is the 16 character code generated
    //After that, save the file and proceed to the next step

    //We need to configure the SMTP to the gmail SMTP server in the Postfix configuration inside the /etc/postfix/main.cf path
    $ sudo nano /etc/postfix/main.cf
    //See the following configuration, if they are not shown inside the .cf file, add them
    relayhost = [smtp.gmail.com]:587
    smtp_use_tls = yes
    smtp_sasl_auth_enable = yes
    smtp_sasl_security_options =
    smtp_sasl_password_maps = hash:/etc/postfix/sasl/sasl_passwd
    smtp_tls_CAfile = /etc/ssl/certs/ca-certificates.crt

    //Now we need to feed the sasl_passwd file to postfix in order to generate the sasl_passwd.db file
    $ sudo postmap /etc/postfix/sasl/sasl_passwd

    //Its important to protect the .db file by giving read and write permissions only to the root user
    sudo chown root:root /etc/postfix/sasl/sasl_passwd /etc/postfix/sasl/sasl_passwd.db
    sudo chmod 600 /etc/postfix/sasl/sasl_passwd /etc/postfix/sasl/sasl_passwd.db

    //After that, you can restart postfix services
    $ sudo systemctl restart postfix.service

    //Now just send a dummy email to test it
    $ echo "Just a test mail" | mail -s "Test Mail" gmail@gmail.com     //Again, gmail@gmail is your personal gmail

- The final step is installing PHPMailer following the instructions bellow:

    //To install PHPMailer, simply use the bellow commands (Ubuntu 22.04)
    sudo apt-get -y install libphp-phpmailer
    //Don't forget to update and upgrade apt-get before doing so

Once Postfix is configured with Gmail SMTP services and PHPMailer is installed, you can now create appliccations that can send emails from your gmail accound.

Notice how the otherway around is not possible. You can only send emails, not receive them. For that, either you can pay for SMTP services which allow this, your buy your own domain and configure your server so it can do SMTP services. Other than that, Gmail SMTP will be used just for example.