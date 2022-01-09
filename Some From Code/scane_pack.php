<?php 
ob_start();
    session_start();
    $PageTitel = 'Home';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'int.php';
        $card_id = $_POST['text'] ;
        // $_SESSION['card_id'] = $card_id ;
        if ( empty($card_id)) {
            echo '<div class="alert alert-danger"> افحص البطاقة جيدا   </div>';
        }else {
                # $userid = (isset($_GET['userid']) && is_numeric($_GET['userid'])) ? intval($_GET['userid']) : 0; 
                $stmt = $con->prepare("SELECT * FROM  card  WHERE card_id  = ?");
                $stmt->execute(array($card_id));
                $row =  $stmt->fetch();
                $cont = $stmt->rowCount();
                if ($stmt->rowCount() > 0 ) { 
                    $userid = $_SESSION['ID'];
                    $points = $row['points'] ;
                    $stmt_d_market = $con->prepare("SELECT
                    market_store.market_amount,
                    d_market.ssn,
                    products.product_name,
                    products.product_points
                    FROM market_store
                    JOIN d_market
                      ON d_market.market_id = market_store.market_id
                    JOIN products
                    ON market_store.product_id=products.product_id
                      where market_store.market_id=? ");
                    $stmt_d_market->execute(array($userid));
                    $row_d_market =  $stmt_d_market->fetchALL();
                    $cont_d_market = $stmt_d_market->rowCount();
                    ?>

            <form method="post" action="order.php">
            <input name="card_id" type="hidden" value="<?php echo $card_id  ?>">
            <input name="points" type="hidden" value="<?php echo $points  ?>">
            
                <div class="mb-3 center">
                    <label for="exampleInputEmail1" class="form-label">name</label>
                    <br>
                    <?php 
                    $option = array("rice" ,"sugar");
                    echo "<select class='form-select quantity' aria-label='Default select example' name='name' >";
                    foreach ($row_d_market as $option) { ?>
                        <option name="name"  value="<?php echo $option['product_name'] ; ?>"><?php echo $option['product_name'] ; ?></option>
                   <?php }
                    echo "</select>";   
                         
                    ?>
                </div>
                <div class="mb-3 center">
                    <label for="exampleInputEmail1"  class="form-label" >Quantity</label>
                    <input type="text" name="quantity" class="quantity form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="required" style="
                    width : 20% ; 
                    margin-bottom : 50px ;
                    " >
                </div>
                
                <div class="btn-order">
                <button class="btn btn-btn btn-success btn-order-center "> order</button>
                  <!--  -->    
                </div> 
            </form>


                <?php
               
            } else {
                $themsg = '<div class="alert alert-danger"> هذه البطاقة ليست موجود   </div>';
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