<?php 
ob_start() ;
$nonav = '' ;
$PageTitel = 'update';
    include 'int.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['userid'];
    $d_password = $_POST['Changepass'];
    $stmt = $con->prepare("UPDATE d_market SET 	d_password = ? WHERE 	market_id  = ? ");
    $stmt->execute(array($d_password,$id));
    $themasg = '<div class="alert alert-success alert-main"> تم تحديث البيانات  </div>';
    erdrecithome($themasg ,'Home.php' , "Home page" , 3);  
}else { 
    $themasg = '<div class="alert alert-danger alert-main"> لا تستطيع زيارة هذة الصفحة مباشرتا </div>';
    erdrecithome($themasg ,'Home.php' , "Home page" , 3);  
}

ob_end_flush() ;
?>