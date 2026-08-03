<?php
// 1. Require the config file
require_once __DIR__ . '/mail_config.php';

// 2. Require PHPMailer files directly from the phpmailer folder
// We removed '/src/' because your files are directly inside the phpmailer folder
require_once __DIR__ . '/phpmailer/Exception.php';
require_once __DIR__ . '/phpmailer/PHPMailer.php';
require_once __DIR__ . '/phpmailer/SMTP.php';

// 3. Declare Namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendContactEmail(string $name, string $senderEmail, string $subject, string $message, ?string &$errorMessage = null): bool
{
    if (empty(SMTP_PASS)) {
        $errorMessage = 'Email is not configured. Set a valid Gmail App Password in includes/mail_config.php.';
        return false;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = SMTP_PORT;
        $mail->CharSet = 'UTF-8';

        $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
        $mail->addAddress(MAIL_TO);
        $mail->addReplyTo($senderEmail, $name);

        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $safeEmail = htmlspecialchars($senderEmail, ENT_QUOTES, 'UTF-8');
        $safeSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
        $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

        $mail->isHTML(true);
        $mail->Subject = 'New Portfolio Message: ' . $subject;
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: auto;'>
                <h2 style='color: #6C63FF; border-bottom: 2px solid #eee; padding-bottom: 10px;'>New Contact Submission</h2>
                <p>You have received a new message from your portfolio website. Here are the details:</p>
                
                <table style='width: 100%; border-collapse: collapse; margin-top: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.05);'>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 12px; text-align: left; background-color: #f8f9fa; width: 25%;'>Name</th>
                        <td style='border: 1px solid #ddd; padding: 12px; background-color: #ffffff;'>{$safeName}</td>
                    </tr>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 12px; text-align: left; background-color: #f8f9fa;'>Email Address</th>
                        <td style='border: 1px solid #ddd; padding: 12px; background-color: #ffffff;'>
                            <a href='mailto:{$safeEmail}' style='color: #00D9FF; text-decoration: none;'>{$safeEmail}</a>
                        </td>
                    </tr>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 12px; text-align: left; background-color: #f8f9fa;'>Subject</th>
                        <td style='border: 1px solid #ddd; padding: 12px; background-color: #ffffff;'>{$safeSubject}</td>
                    </tr>
                    <tr>
                        <th style='border: 1px solid #ddd; padding: 12px; text-align: left; background-color: #f8f9fa; vertical-align: top;'>Message</th>
                        <td style='border: 1px solid #ddd; padding: 12px; background-color: #ffffff; line-height: 1.6;'>{$safeMessage}</td>
                    </tr>
                </table>
                <br>
                <p style='font-size: 12px; color: #777;'>This email was sent automatically from the contact form on your portfolio.</p>
            </div>
        ";
        
        $mail->AltBody = "Name: {$name}\nEmail: {$senderEmail}\nSubject: {$subject}\nMessage:\n{$message}";

        $mail->send();
        return true;
    } catch (Exception $e) {
        $errorMessage = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
?>