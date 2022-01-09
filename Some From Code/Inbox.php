<?php 
    session_start();
    $PageTitel = 'Home';
    if (isset($_SESSION['Username'])){
        include 'int.php';
        $userid = (isset($_GET['userid']) && is_numeric($_GET['userid'])) ? intval($_GET['userid']) : 0; 
        $stmt = $con->prepare("SELECT * FROM request_d_market ");
            $stmt->execute();
            $rows =  $stmt->fetchALL();
            $cont = $stmt->rowCount();
            if ($stmt->rowCount() > 0 ) { 
    ?>
    <!-- partial:index.partial.html -->
<ul class="list">
<?php 
 $i = 0 ;
foreach ($rows as $row) {
  ?>
  <li class="list-item" id="item<?php echo $i ; ?>">
  <a class="list-item__header" href="#item<?php echo $i ; ?>">Item <?php echo $i+1 ; ?></a>
  <div class="list-item__body">
    <h2>
    <?php echo $row['Sub_Header'] ; ?>
    </h2>
    <div class="placeholder"><?php echo $row['content'] ; ?></div>
  </div>
</li>
<?php
$i= $i+1 ;
} 
?>

   
</ul>
<!-- partial -->
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
?>