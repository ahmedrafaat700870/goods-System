<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nonav = "" ;
    include 'int.php' ;
    $id = $_SESSION['ID'] ;
    $name = $_POST['Name'] ;
    $Card_Number = $_POST['Card_Number'] ;
    $Expiration = $_POST['Expiration'] ;
    $Security_code = $_POST['Security_code'] ; 
    // $select =  select('	ssn f_name' , 'd_market' ,'1') ;
    //echo $select ;
    $contd = cont('*' , 'd_market_card' ,'card_id ' , $id) ;
    if ($contd > 0 ) {
        $stmt1 = $con->prepare("UPDATE d_market_card SET card_name=?, Card_Number=?, card_Expiration=? , card_Security_Code=?  WHERE card_id=? ");
        $stmt1->execute([$name,$Card_Number,$Expiration,$Security_code,$id]);
        $themsg = '<div class="alert alert-success alert-main"> تم  تحديث البيانات  </div>';
        erdrecithome($themsg ,'pay.php' , "scane page" , 3);
    } else {
        $stmt = $con->prepare("INSERT INTO d_market_card(card_name,Card_Number ,card_Expiration,card_Security_Code,card_id)VALUES(?,?,?,?,?)");
        $stmt->execute([$name,$Card_Number,$Expiration,$Security_code,$id]);
        $themsg = '<div class="alert alert-success alert-main"> تم اضافة البيانات  </div>';
        erdrecithome($themsg ,'pay.php' , "scane page" , 3);
    }
}

?> 