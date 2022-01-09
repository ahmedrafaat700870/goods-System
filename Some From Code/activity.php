<?php 
ob_start() ;
session_start();
if (isset($_SESSION['Username'])){
$PageTitel = 'send';
    include 'int.php';
    $userid = $_SESSION['ID'] ; 
    $stmt = $con->prepare("SELECT
    market_products.product_id  ,
    market_products.product_amount,
    products.product_name,activity,
    products.product_price
  FROM market_products
  JOIN d_market
    ON market_products.market_id = d_market.market_id
  JOIN products
  ON market_products.product_id=products.product_id
    where market_products.market_id=? AND activity=0 ");
    $i = 1 ;
        $stmt->execute(array($userid));
        $rows =  $stmt->fetchALL();
        $cont = $stmt->rowCount();  
        if ($cont > 0) {

            $stnt = $con->prepare("UPDATE market_products SET activity=? WHERE market_id=? " ) ;
            $stnt->execute(array( $i,$userid));   
            
            $themsg = '<div class="alert alert-success"> تم ارسال طلبك بنجاح    </div>';
            erdrecithome($themsg ,'product.php' , "Product page" , 3);
        } else {
            
            $themsg = '<div class="alert alert-danger"> لا توجد بيانات لارسالها !   </div>';
            erdrecithome($themsg ,'index.php' , "Home page" , 3);

        }
    } 
    else {
         $themsg = '<div class="alert alert-danger"> لا يمكنك زيارة هذة الصفحة مباشرتا !   </div>';
        erdrecithome($themsg ,'index.php' , "Home page" , 3);
    }
ob_end_flush() ;
?>