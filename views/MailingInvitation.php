<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
include "../controller/participantC.php";
if (isset($_POST['Idparticipant'])){
$participant1C=new ParticipantC();
$result=$participant1C->recupererParticipant($_POST["Idparticipant"]);
foreach($result as $row)
{
    $email=$row['email'];
$nom=$row['nom'];
$prenom=$row['prenom'];
$Idparticipant=$row['Idparticipant'];
$Idevenement=$row['Idevenement'];
}
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ahmed.boussema@esprit.tn';                     // SMTP username
    $mail->Password   = 'Boussema888';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ahmed.boussema@esprit.tn', 'Responsable des participants');
    $mail->addAddress($email, '');     // Add a recipient
    


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Rappel !';
    $mail->Body    = " Cher étudiant $nom $prenom nous vous envoyons 
    ce mail afin de confirmer votre participation a l'evenement d'id: $Idevenement. Nous comptons sur vous pour respecter les mesures mises en place en vue de la crise
    sanitaire. Merci pour votre interêt.";

    $mail->send();
    echo 'Message has been sent';
    $test=1;
    echo ("<script language='javascript'>window.location.href='afficherparticipant.php?notification=$test'</script>");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}}