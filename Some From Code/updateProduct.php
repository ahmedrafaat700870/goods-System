<?php 
ob_start() ;
session_start();
$PageTitel = 'edit';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'int.php';
    $productid = $_POST['productid'];
    $market_id = $_POST['market_id'] ;
    $productName = $_POST['name'] ;
    $activity = 0 ;
    $productnewQuantity = $_POST['newquantity'] ;
    $productoldQuantity = $_POST['oldquantity'] ;
    $formErorrs = array();
    if (empty($productnewQuantity)) {
        $formErorrs[] = '<div class="alert alert-danger"> يجب ادخال الكمية </div>';
        foreach($formErorrs as $eroor) {
            echo $eroor . '<br/>' ;
        }
    } else {
        $statment = $con->prepare('UPDATE market_products SET  product_amount = ? WHERE product_id = ? AND market_id = ?  AND activity=?');
        $statment->execute([$productnewQuantity,$productid,$market_id,$activity]);
        $cont = $statment->rowCount();
       if ($cont > 0) {
        $themasg = '<div class="alert alert-success"> تم التحديث </div>';
        erdrecithome($themasg ,'product.php' , "product page" , 3);
       } else {
        $themasg = '<div class="alert alert-danger"> ادخل الكمية لتحديث طلبك </div>';
        erdrecithome($themasg ,'product.php' , "product page" , 3);
       }
            
    }
    ob_end_flush() ;
?>
    


<?php 
    include $stl . 'footer.php';
} 
else {
    header('Location: index.php');
    exit();
}
?>