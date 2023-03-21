<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '/home/dh_dpiunq/PHPMailer/src/Exception.php';
require_once '/home/dh_dpiunq/PHPMailer/src/PHPMailer.php';
require_once '/home/dh_dpiunq/PHPMailer/src/SMTP.php';
  
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

if(isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['message'])&& filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //Setting variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.dreamhost.com';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'contact@byprincemedia.com';               // SMTP username
    $mail->Password = 'BPM998877';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
    $mail->Port = 465;                                    // TCP port to connect to 

    //Recipients
    $mail->setFrom('contact@byprincemedia.com');          //This is the email your form sends From
    $mail->addAddress('contact@byprincemedia.com', 'Contact'); // Add a recipient address
    // Name is optional
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->addCC('jcook03266@gmail.com');
    $mail->addCC('stevensonchittumuri@gmail.com');//Can see other recipients
    //$mail->addBCC('bcc@example.com'); //Blind carbon copy, cant see other recipients 

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Prince Media Contact form submission";
    $mail->Body = 'Name: ' . $name . '<br>' . '<br>' . 'Email: ' . $email . '<br>' . 'Message: ' . '<br>' . $message . '<br>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
    $status = "success";
    $response = "Message has been sent!";
    
    $subjectRep = "Prince Media has recieved your contact form submission";
    $headers = "From: " . "Prince Media <no-reply@byprincemedia.com>" . "\r\n";
    $headers .= "Reply-To: ". "no-reply@byprincemedia.com" . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $htmlContent = file_get_contents("BPM-contact-form-response-email.html");
    mail($email, $subjectRep, $htmlContent,$headers);    
    }
    else{
    $status = "failed";
    $response = "Message could not be sent: <br> " . $mail->ErrorInfo;
    }   
    exit(json_encode(array("status" => $status, "response" => $response)));
}
?>