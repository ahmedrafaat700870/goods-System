<?php 
ob_start() ;
    session_start();
    $PageTitel = 'edit';
    if (isset($_SESSION['Username'])){
        include 'int.php';
        $stmt = $con->prepare("SELECT * FROM products ");
        $stmt->execute(array());
        $rows =  $stmt->fetchALL();
       #  echo $row['ProductName'] ; ?>
       <link rel="stylesheet" href="<?php echo $css; ?>product.css"> 
            <form action="editNewPorduct.php" method="POST">
            <div class="mb-3 center">
                    <label for="exampleInputEmail1" class="form-label">name</label>
                    <br>
                    <?php 
                   
                    echo "<select class='form-select quantity' aria-label='Default select example' name='name' >";
                    foreach ($rows as $row) { ?>
                         <option name="name" value="<?php echo $row['product_name'] ;?>"><?php echo $row['product_name'] ;?></option>
                   <?php }
                    echo "</select>";        
                    ?>
                </div>
                <div class="mb-3 center">
                    <label for="exampleInputEmail1"  class="form-label" >Quantity</label>
                    <input type="text" name="quantity" class="quantity form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="required" style="
                    width:20% ;" >
                </div>
                
                <div class="btn-broduct">
                <button class="ntb_edit" style="
                    background-color: #198754;
                    color: white;
                ">edit</button>  
                </div> 
            </form>
            <?php
        include $stl . 'footer.php';
    } 
    else {
        header('Location: index.php');
        exit();
    }
    
    ob_end_flush() ;
?>