<?php 
ob_start() ;
    session_start();
    $PageTitel = 'Delete';
    if (isset($_SESSION['Username'])){
        include 'int.php';
        $productid = $_GET['product_id'];
        $market_id = $_GET['userid'] ; 
        $activity = 0 ;
      #  echo $row['ProductName'] ;
            $productQuantity = 0 ;
            $statment = $con->prepare('DELETE FROM  market_products  WHERE product_id = ? AND market_id = ?  AND activity=?');
            $statment->execute([$productid,$market_id,$activity]);
            $a = $statment->rowCount();
            if ($a > 0 ) {
                $themasg = '<div class="alert alert-success"> تم حذف المنتج </div>';
                erdrecithome($themasg ,'product.php' , "product page" , 3);  
            } else {
                $themsg = '<div class="alert alert-danger"> توجد مشكلة فى حذف هذا المنتج </div>';
                erdrecithome($themasg ,'product.php' , "product page" , 3);  
            }
        include $stl . 'footer.php';
    } 
    else {
        header('Location: index.php');
        exit();
    }
    ob_end_flush() ;
?>