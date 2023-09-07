<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['envoyer'])){
            if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['subject']) and isset($_POST['comments'])) {
                if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['subject']) and !empty($_POST['comments'])) {
                    $name = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);
                    $subject = htmlspecialchars($_POST['subject']);
                    $comments = htmlspecialchars($_POST['comments']);

                    $body = "";

                    $body .= " De :".$name."\n\n";
                    $body .= " Email :" .$email."\n\n";
                    $body .= " Sujet :" .$subject."\n\n";
                    $body .= " Message :" .$comments."\n\n";
                    $body .= "Bon à Savoir : Le temps de traitement de la requete est de 48H";
                    
                    $servername = "localhost";
                    $database = "u941694762_nehemie_db";
                    $username = "u941694762_nehemie_user";
                    $password = "P@stopasto2023";

                    $conn = mysqli_connect($servername, $username, $password, $database);
                    $sql = "INSERT INTO `papi` (`name`,`email`,`subject`,`comments`) VALUES ('$name','$email','$subject','$comments')";

                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'amostinanfon17@gmail.com';
                    $mail->Password = "whqhgrpnlbnzlzed";
                    $mail->Port = 465;
                    $mail->SMTPSecure = 'ssl';
                    $mail->isHTML(true);
                    $mail->setFrom($email, $name);
                    $mail->addAddress('amostinanfon17@gmail.com');
                    $mail->addCC('amostinanfon37@gmail.com');
                    $mail->addCC('pasto@associationsurvivors.org');
                    $mail->Subject = ("$email($subject)");
                    $mail->Body = $body;
                    $mail->send();


//                    // insert into database
                    $rs = mysqli_query($conn,$sql);



                
                    echo "soumission effectuée avec succès !!!";

                    mysqli_close($conn);
                    exit();

//                    ================ Storing data inside a database

                }
            }
}


?>













