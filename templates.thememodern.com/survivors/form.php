<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

//    //var_dump($_POST);
//    if(!empty($_POST['name'])) {
//        echo "i love this game";
//    } else {
//        echo "<h3>I love this game !!!</h3>";
//    }

//    if(isset($_POST['envoyer'])){
//        if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['subject']) and isset($_POST['comments'])){
//            if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['subject']) and !empty($_POST['comments'])){
//                $name = htmlspecialchars($_POST['name']);
//                $email = htmlspecialchars($_POST['email']);
//                $subject = htmlspecialchars($_POST['subject']);
//                $comment = htmlspecialchars($_POST['comments']);
//
//                echo 'i love this game';
//            }
//        }
//    }

//    if($_POST["name"] !== ''){
//        echo "i love this game";
//    }else {
//        echo 'it is an empty caracter';
//    }

//                $name = htmlspecialchars($_POST['name']);
//                $email = htmlspecialchars($_POST['email']);
//                $subject = htmlspecialchars($_POST['subject']);
//                $comments = htmlspecialchars($_POST['comments']);

//                    $conn = mysqli_connect('localhost','root','','famille');
//
//                    $name = $_POST['name'];
//                    $email = $_POST['email'];
//                    $subject = $_POST['subject'];
//                    $comments = $_POST['comments'];
//
//                    $body = "";
//
//                    $body .= " FROM :".$name. "\r\n";
//                    $body .= " Email :".$email. "\r\n";
//                    $body .= " Subject :".$subject. "\r\n";
//                    $body .= " Message :".$comments. "\r\n";
//
//                    $sql = "INSERT INTO `papi` (`name`,`email`,`subject`,`comments`) VALUES ('$name','$email','$subject','$comments')";
//
//                    // insert into database
//                    $rs = mysqli_query($conn,$sql);
//
//                    if($rs) {
//                        echo "<h1 style='color: seagreen'>contact registered</h1>";
//                        mysqli_close($conn);
//                        exit();
//                    }
//                    } else {
//                        die('Connexion Failed:' .$conn->connect_error);
//                        mysqli_close($conn);
//                        exit();
//                    }

//                if($conn->connect_error){
//                    die('Connection Failed : '.$conn->connect_error);
//                } else{
//                    $stmt = $conn -> prepare("insert into dtl_contact(name, email, subject, comments) values(?,?,?,?)");
//                    $stmt->bind_param("ssss",$name,$email,$subject,$comments);
//                    $stmt->execute();
//                    echo "formulaire soumis . . . ";
//                    stmt->close();
//                    $conn->close();
//                }



if(isset($_POST['envoyer'])){
            if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['subject']) and isset($_POST['comments'])) {
                if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['subject']) and !empty($_POST['comments'])) {
                    $name = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);
                    $subject = htmlspecialchars($_POST['subject']);
                    $comments = htmlspecialchars($_POST['comments']);

                    $mail = new PHPMailer(true);
//    $mail = new PHPMailer\PHPMailer\PHPMailer;
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
                    $mail->Subject = ("$email($subject)");
                    $mail->Body = $comments;
                    $mail->send();

                    header("Location: ./response.php");
                }
            }
}


?>













