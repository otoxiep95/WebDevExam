<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require __DIR__ . '/../src/PHPMailer.php';
require __DIR__ . '/../src/Exception.php';
require __DIR__ . '/../src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'adummydummypapa@gmail.com';                     // SMTP username
    $mail->Password   = 'passdummytest123';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //$sReceiverEmail = $_POST['email'];
    //Recipients
    $mail->setFrom('adummydummypapa@gmail.com', 'HOMAX');
    $mail->addAddress($_POST['email'], '');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('inventedgmail', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $saProperties = file_get_contents(__DIR__ . '/../data/properties.json');
    $jProperties = json_decode($saProperties);
    $iLastProperty = count($jProperties) - 1;
    $lastPropertyImage =  $jProperties[$iLastProperty]->image;
    $lastPropertyPrice = $jProperties[$iLastProperty]->price;
    $lastPropertyAddress = $jProperties[$iLastProperty]->address;
    $lastPropertyZipcode = $jProperties[$iLastProperty]->zipcode;

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'HOMAX NEWSLETTER';
    $mail->addEmbeddedImage(__DIR__ . '/../images/property-img/' . $lastPropertyImage, 'house');
    $mail->Body    = '<h1>New Property for you!</h1>
                        <img src="cid:house">
                        <h2>Price: ' . $lastPropertyPrice . '<h2>  
                        <h2>Adress: ' . $lastPropertyAddress . '<h2>
                        <h3>Zipcode: ' . $lastPropertyZipcode . '</h3>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
