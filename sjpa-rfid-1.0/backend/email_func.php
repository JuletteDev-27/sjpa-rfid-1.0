<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailFunctionality
{
    private $senderEmail;
    private $senderPassword;
    private $receiverEmail;
    private $studentName;
    private $currentTime;

    function __construct($senderEmail, $senderPassword, $receiverEmail, $studentName, $currentTime)
    {
        $this->senderEmail = $senderEmail;
        $this->senderPassword = $senderPassword;
        $this->receiverEmail = $receiverEmail;
        $this->studentName = $studentName;
        $this->currentTime = $currentTime;
    }

    public function setSenderEmail($senderEmail)
    {
        $this->senderEmail = $senderEmail;
    }

    public function getSenderEmail()
    {
        return $this->senderEmail;
    }

    public function setSenderPassword($senderPassword)
    {
        $this->senderPassword = $senderPassword;
    }

    public function getSenderPassword()
    {
        return $this->senderPassword;
    }

    public function setReceiverEmail($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;
    }

    public function getReceiverEmail()
    {
        return $this->receiverEmail;
    }

    public function setStudentName($studentName)
    {
        $this->studentName = $studentName;
    }

    public function getStudentName()
    {
        return $this->studentName;
    }

    public function setCurrentTime($currentTime)
    {
        $this->currentTime = $currentTime;
    }

    public function getCurrentTime()
    {
        return $this->currentTime;
    }

    public function sendEmail($subject, $body)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $this->getSenderEmail();
        $mail->Password = $this->getSenderPassword();
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($this->getSenderEmail(), 'St. John Paul Academy II');
        $mail->addAddress($this->getReceiverEmail(), 'Guardian of student ' . $this->getStudentName());
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->DKIM_domain = 'Stjohnpaul2academy.edu.ph'; 
        $mail->DKIM_private = '/etc/apache2/certificate/stjohnpaul2academy.edu.ph/private.key';
        $mail->DKIM_selector = 'phpmailer';
        $mail->DKIM_passphrase = '';
        $mail->DKIM_identity = $mail->From;
        $mail->addCustomHeader('Reply-To', 'noreply@Stjohnpaul2academy.edu.ph');
        $mail->addCustomHeader('Precedence', 'bulk');
        try {
            $mail->send();
            return [1, "Mail sent successfully!"];
        } catch (Exception $e) {
            return [0, "Email could not be sent. Mailer Error: {$mail->ErrorInfo}"];
        }
    }

    public function sendLoggedInEmail()
    {
        $subject = $this->getStudentName() . ' has entered the campus';
        $body = 'Good Day!' . "\n" . 'This email is to inform you that your child,' . $this->getStudentName() . ', has entered the campus by ' . date("h:i A", strtotime($this->getCurrentTime()));

        return $this->sendEmail($subject, $body);
    }

    public function sendLoggedOutEmail()
    {
        $subject = $this->getStudentName() . ' has exited the campus';
        $body = 'Good Day!' . "\n" . 'This email is to inform you that your child,' . $this->getStudentName() . ', has exited the campus by ' . date("h:i A", strtotime($this->getCurrentTime()));

        return $this->sendEmail($subject, $body);
    }
}