<?php
    ob_start();
    session_start();
    $PageTitel = 'Home';
    include 'int.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $card_id = $_POST['card_id'] ;
        $stmt_card = $con->prepare("SELECT * FROM  card  WHERE card_id  = ?");
        $stmt_card->execute(array($card_id));
        $row_card =  $stmt_card->fetch();        
        $points = $row_card['points'] ;
        $userid = $_SESSION['ID'] ;
        $name = $_POST['name'] ;
        $quantity = $_POST['quantity'] ;
         if (empty($quantity)) {
            echo '<div class="alert alert-danger"> يجب ادخال الكمية  </div>';
        } else {
            $stmt   = $con->prepare('SELECT *  FROM products WHERE 	product_name = ?');
            $stmt->execute(array($name));
            $row =  $stmt->fetch(); 
            $product_id = $row['product_id'] ;
            $product_points = $row['product_points'] ;
            $product_points_cl = $quantity * $product_points ;
              
            $stmt_d_market = $con->prepare("SELECT market_amount FROM market_store WHERE product_id = ? AND market_id =? ");
            $stmt_d_market->execute(array($product_id , $userid));
            $row_d_market =  $stmt_d_market->fetch(); 
            $market_amount = $row_d_market['market_amount'] ;
            if ($product_points_cl <= $points) {
                if ($quantity >= $market_amount ) {
                    $themsg = '<div class="alert alert-danger"> المخزن لا يحتوى على هذه الكمية من هذا المنتج  </div>';
                    erdrecithome($themsg ,'scane.php' , "scane page" , 3);
               } else {
                   $order_cont = $market_amount - $quantity ; 
                   $order_piont_order =  $points - $product_points_cl ; 
                  
                   $order  = $con->prepare('UPDATE market_store SET market_amount = ? WHERE market_id =? AND product_id = ?');
                    $order->execute([$order_cont, $userid, $product_id]);
                    $cont = $order->rowCount();
                    if ($cont > 0) {
                        $piont  = $con->prepare('UPDATE card SET points = ? WHERE card_id = ?');
                        $piont->execute([$order_piont_order,  $card_id]);
                        $cont_piont = $piont->rowCount();
                        if ($cont_piont > 0) {
                            $themsg = '<div class="alert alert-success"> تم طلب المنتج  </div>';
                            erdrecithome($themsg ,'scane.php' , "scane page" , 3);
                        }
                    }
                    
                }
            } else {
                $themsg = '<div class="alert alert-danger"> عدد النقاط اقل من نقاط الطلبية  </div>';
                erdrecithome($themsg ,'scane.php' , "scane page" , 3);
            }
            
        }
    include $stl . 'footer.php';
    } 
    else {
        header('Location: index.php');
        exit();
    }
    ob_end_flush() ;
?>