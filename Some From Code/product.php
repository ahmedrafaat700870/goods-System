<?php 
    session_start();
    $PageTitel = 'Home';
    if (isset($_SESSION['Username'])){
        include 'int.php';
        $userid = $_SESSION['ID'] ; 
        $stmt = $con->prepare("SELECT
        market_products.product_id  ,
        market_products.product_amount,
        products.product_name,
        products.product_price
      FROM market_products
      JOIN d_market
        ON market_products.market_id = d_market.market_id
      JOIN products
      ON market_products.product_id=products.product_id
        where market_products.market_id=? AND activity=0 ");
            $stmt->execute(array($userid));
            $rows =  $stmt->fetchALL();
            $cont = $stmt->rowCount(); 
           ?> 
        <div class="container">
        <div class="lable-responsive"> 
            
                <table class="main-table table table-bordered">
                      
                            <tr style="
                           background-color: black !important;
  color: white;

                        ">
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Amount</th>
                                <th>Price</th>
                                <th>Bill</th>
                                <th>contorol</th>
                            </tr>
                        
                                <?php 
                        $bill_cont = '' ;
                        $i = 1;
                        foreach ($rows as $row) {
                            $bill_cont =  $row['product_price'] * $row['product_amount'] ;
                            echo '<tr>' ;
                            echo '<td>' .   $i .  '</td>'  ;
                            echo '<td>' . $row['product_name'] . '</td>'  ;
                            echo '<td>' . $row['product_amount'] . '</td>'  ;
                            echo '<td>' . $row['product_price'] . '</td>'  ;
                            echo '<td>'  . $bill_cont . '</td>'    ;
                            echo '<td>'  ?>
                            <a style="    margin-right: 14px;" href="setupdateProduct.php?userid=<?php echo $_SESSION['ID'] ?>&product_id=<?php echo $row['product_id'] ?>" name="add" class="btn btn-success"><i class="fa fa-edit"></i> Update</a>
                            <a href="deletProduct.php?userid=<?php echo $_SESSION['ID'] ?>&product_id=<?php echo $row['product_id'] ?>" name="add" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
                            <?php
                            '</td>';
                            echo '</tr>' ;
                            $i = $i + 1 ;
                        }
                        ?>
                        </tr>
                </table>
                      
            </div> 
                <a href="editproduct.php?userid=<?php echo $_SESSION['ID'] ?>" name="add" class="btn btn-primary"><i class="fa fa-plus"></i> edit new product</a>
            </div>
            <div style="    text-align: center;">
                <a style="    background-color: black; " href="activity.php" name="add" class="btn btn-primary"><i class="fa fa-send"></i> sending</a>
            </div>
            
        <!-- End ViewEditProducts page -->
          
    <?php 
    
        include $stl . 'footer.php';
    } 
    else {
        header('Location: index.php');
        exit();
    }
?>