<?php 
    ob_start() ;
    session_start();

    $PageTitel = 'edit';
    if (isset($_SESSION['Username'])){
        include 'int.php';
        $productid = $_GET['product_id'];
        $market_id = $_GET['userid'] ; 
        $activity = 0 ;
         $stmt   = $con->prepare('SELECT 	product_amount
        FROM market_products WHERE product_id = ? AND market_id = ? AND activity=?');
        $stmt->execute(array($productid ,  $market_id , $activity));
        $row =  $stmt->fetch();
        $cont = $stmt->rowCount();
        $stmts   = $con->prepare('SELECT 		product_name
        FROM products WHERE product_id = ? ');
        $stmts->execute(array($productid ));
        $rows =  $stmts->fetch();
        $conts = $stmts->rowCount();
        if ($cont > 0) {
     ?>     
     <form action="updateProduct.php" method="POST">
            <input type="hidden" name="productid" value="<?php echo   $productid ?>">
            <input type="hidden" name="market_id" value="<?php echo   $market_id ?>">
            
     <div class="mb-3 center">
            <label for="exampleInputEmail1" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rows['product_name']  ; ?>" readonly style="
                    width:20% ;">
        </div>
        <div class="mb-3 center">
            <label for="exampleInputEmail1" class="form-label">Quantity</label>
            <input type="hidden" name="oldquantity" value="<?php echo $row['product_amount']?>" required="required"  >
            <input type="text" name="newquantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['product_amount']; ?>" required="required" style="
                    width:20% ;">
        </div>
        
        <div class="btn-broduct">
          <button  style="
                    background-color: #198754;
                    color: white;
                ">edit</button>  
        </div> 
    </div>
     </form> 
    <div class="rigth">                           
    <?php 
    } else {
        echo 'there is no such id';
    }
    
        include $stl . 'footer.php';
    } 
    else {
        header('Location: index.php');
        exit();
    }
    ob_end_flush() ;
?>