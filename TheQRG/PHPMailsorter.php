<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '/home/dh_p6mjzn/PHPMailer/src/Exception.php';
require_once '/home/dh_p6mjzn/PHPMailer/src/PHPMailer.php';
require_once '/home/dh_p6mjzn/PHPMailer/src/SMTP.php';
  
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

if(isset($_POST['name'])&& isset($_POST['email'])&& isset($_POST['major'])&& isset($_POST['Position'])&& isset($_POST['Gradyear'])&& isset($_POST['currentyear']) && isset($_POST['campus']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //Setting variables
    $name = $_POST['name'];
    $GPA = $_POST['GPA'];
    $Position = $_POST['Position'];
    $email = $_POST['email'];
    $major = $_POST['major'];
    $interests = $_POST['interests'];
    $Gradyear = $_POST['Gradyear'];
    $currentyear = $_POST['currentyear'];
    $campus = $_POST['campus'];
    
    
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.dreamhost.com';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'contact@theqrg.org';               // SMTP username
    $mail->Password = 'FkDcD2j$H7PT3@n';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable SSL encryption, TLS also accepted with port 465
    $mail->Port = 465;                                    // TCP port to connect to 

    //Recipients
    $mail->setFrom('contact@theqrg.org');          //This is the email your form sends From
    $mail->addAddress('contact@theqrg.org', 'Contact'); // Add a recipient address
    // Name is optional
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->addCC('jcook03266@gmail.com');
    $mail->addCC('shwethajayaraj729@gmail.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "QRG Position Application";
    $mail->Body = 'Name: ' . $name . '<br>' . '<br>' . 'Email: ' . $email . '<br>' . 'Desired Position: ' . $Position . '<br>' . 'Current Year: ' . $currentyear . '<br>' .  'Expected Year of Graduation: ' . $Gradyear . '<br>' . ' GPA: ' . $GPA . '<br>'. 'Campus: ' . $campus . '<br>' .  'Interests: ' . $interests . '<br>' . 'Major: ' . $major . '<br>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
    $status = "success";
    $response = "Message has been sent!";
      
    $subjectRep = "Recent Form Submission";
    $headers = "From: " . "QRG <no-reply@theqrg.org>" . "\r\n";
    $headers .= "Reply-To: ". "no-reply@theqrg.org" . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $htmlContent = file_get_contents("contact-form-response-email.html");
    mail($email, $subjectRep, $htmlContent,$headers);  
    }
    else{
    $status = "failed";
    $response = "Message could not be sent: <br> " . $mail->ErrorInfo;
    }   
    exit(json_encode(array("status" => $status, "response" => $response)));
}
?>
    
