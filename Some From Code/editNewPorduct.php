<?php 
ob_start() ;
session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include 'int.php';
        $id_d_market = $_SESSION['ID'] ;
        $productname = $_POST['name'] ;
        $activity = 0 ;
        $productquantity = $_POST['quantity'] ;
        $stmt = $con->prepare("SELECT * FROM products WHERE 	product_name = ? ");
        $stmt->execute(array($productname));
        $row =  $stmt->fetch();
        $id = $row['product_id' ] ;
        $cont = $stmt->rowCount();
        if ($cont > 0) {
            $stmt = $con->prepare("SELECT product_id FROM market_products WHERE product_id  = ? AND market_id  = ? AND 	activity=?");
            $stmt->execute(array($id , $id_d_market , $activity));
            $row =  $stmt->fetch();
            $conts = $stmt->rowCount();
            if (empty($productquantity)) {
                echo '<div class="alert-regester alert alert-danger"> يجب ادخال هذا الحق </div>';
            }
            else {
                if ($conts == 0) {
                    $stmt = $con->prepare("INSERT INTO market_products(product_id  ,product_amount , market_id )
                    VALUES(:zid ,:zamount , :zmarket_id)");
                    $stmt->execute(array(
                        'zid' => $id ,
                        'zamount' => $productquantity ,
                        'zmarket_id' => $id_d_market 
                    ));
                    $themasg =  '<div class=" alert alert-success alert-main ">تم اضافة المنتج </div>';
                    erdrecithome($themasg ,'product.php' , "product page" , 3);  
                    } else {
                    $themasg = '<div class="alert alert-danger alert-main"> هذا المنتج موجود من قبل </div>';
                    erdrecithome($themasg ,'product.php' , "product page" , 3);  
                    
                    }
           }
        } else {
            echo 'Erorr 2';
        }
        #echo  $row['product_name'];
        

    include $stl . 'footer.php';
} 
else {
    header('Location: index.php');
    exit();
}

ob_end_flush() ;
?>