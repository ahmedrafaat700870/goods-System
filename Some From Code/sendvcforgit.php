<?php
ob_start() ;
session_start();
$nonav = '' ;
include "int.php"; 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $gmail = $_POST['gmail'] ;
    $user_name = $_POST['user_name'] ;
    echo  $gmail . $user_name ;
include('smtp/PHPMailerAutoload.php');
        $stmt = $con->prepare("SELECT  * FROM d_market WHERE  	d_username  = ?");
        $stmt->execute(array($user_name));
        $row =  $stmt->fetch();
        $cont = $stmt->rowCount();
        $vc =  $row['vc'] ;
        if ($cont > 0) {           
   $randomSixDigitInt = \random_int(1000, 9999);
   $stmtd = $con->prepare("UPDATE  d_market SET vc=?   WHERE  	d_username  = ?");
   $stmtd->execute(array( $randomSixDigitInt ,$user_name));
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
   $mail->Subject = 'Goods System';
   $mail->Body    =  '<b>  your Action code</b>' . $randomSixDigitInt ;
   $mail->send();
   $pass = array(
    'gmail' => $gmail ,
    'user_name' => $user_name
   ) ;
   print_r($pass) ; 
    $pass = http_build_query($pass);
  //  header("Location: vcforgit.php?pass="$pass);
    header("Location: vcforgit.php?$pass");
    exit() ;
   }

    } else {
          // header("Location: index");
        }
    }
ob_end_flush() ; 
?>
