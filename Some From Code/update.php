<?php 
ob_start() ;
session_start();
$PageTitel = 'Home';
if (isset($_SESSION['Username'])){
    include 'int.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['userid'];
    $phone = $_POST['ChangePhone1'];
    $stmt = $con->prepare("UPDATE d_market SET phone = ? WHERE 	market_id  = ? ");
    $stmt->execute(array($phone,$id));
    $themasg = '<div class="alert alert-danger"> تم تحديث البيانات  </div>';
    erdrecithome($themasg ,'Home.php' , "Home page" , 3);  
}else { 
    $themasg = '<div class="alert alert-danger"> لا تستطيع زيارة هذة الصفحة مباشرتا </div>';
    erdrecithome($themasg ,'Home.php' , "Home page" , 3);  
}
}
ob_end_flush() ;
?>