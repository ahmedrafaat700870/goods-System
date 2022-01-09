<?php
session_start();
$nonav = '' ;
include "int.php"; 
include('smtp/PHPMailerAutoload.php');
        $userid = (isset($_GET['userid']) && is_numeric($_GET['userid'])) ? intval($_GET['userid']) : 0;
        $stmt = $con->prepare("SELECT  * FROM d_market WHERE  	market_id  = ?");
        $stmt->execute(array($userid));
        $row =  $stmt->fetch();
        $cont = $stmt->rowCount();
        $gmail = $row['gmail'] ;
        $vc =  $row['vc'] ;
        if ($cont > 0) {

              
   $randomSixDigitInt = \random_int(1000, 9999);
   // Print
   $stmtd = $con->prepare("UPDATE  d_market SET vc=?   WHERE  	market_id  = ?");
   $stmtd->execute(array( $randomSixDigitInt ,$userid));
   $cont = $stmtd->rowCount();
   if ($cont > 0) {
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();
   //Server settings
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
   $mail->isSMTP();                                            //Send using SMTP
   $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
   $mail->Username   = 'rafaatahmed380@gmail.com';                     //SMTP username
   $mail->Password   = '2881774aA';                               //SMTP password
   $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
   $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
 //Content
   $mail->isHTML(true); 


   //Recipients
   $mail->setFrom('hello', 'food');
   $mail->addAddress('ellen@example.com'); 
   $mail->addAddress($gmail); 
   $mail->Subject = 'Here is the subject';
   $mail->Body    = $randomSixDigitInt . '<b>in  your VC</b>';
   $mail->send();
   header("Location: vcphone.php?userid=".$userid);
   }
    } else {
          header("Location: Home.php?do=home&userid=".$userid);
        }
  
?>
