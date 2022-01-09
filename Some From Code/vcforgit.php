<?php 
ob_start() ;
    $nonav = '';
    include 'conect.php';
    $stl = 'incloud/temp/';
    $css = './layout/thems/default/css/';
    $js = './layout/thems/default/js/';
    $lan = 'incloud/lang/';
    $func = './incloud/functions/';
    // include yhe important files
    include $func . 'function.php';
    include $lan . 'en.php';
    session_start();
    $PageTitel = 'vc';
   
        ?>
        <?php
        $user_name = $_GET['gmail'] ;
        $user_name = $_GET['user_name'] ;
        $stmt = $con->prepare("SELECT 	* FROM d_market WHERE  	d_username  = ?");
        $stmt->execute(array($user_name));
        $row =  $stmt->fetch();
        $cont = $stmt->rowCount();
        $userid = $row['market_id'] ;
        $vc = $row['vc'] ; 
        if ($stmt->rowCount() > 0) {

     ?>
     <link rel="stylesheet" href="<?php echo $css ?>vc.css"> 
         <form action="checkvcforgit.php" method="POST" class="vc">
            <main>
                <div class="box">
                    <strong>Enter the number</strong>
                    <input type="hidden"  name="id" value="<?php echo $userid ?>">
                    <input type="hidden"  name="vc" value="<?php echo $vc ?>">
               
                    <!-- <input type="hidden"  name="vc" value=" <?php # echo $row['vs'];?>">  -->
                    <input type="text" class="code" name="code1" tabindex="1" maxlength="1" required="required">
                    <input type="text" class="code" name="code2" tabindex="2" maxlength="1" required="required">
                    <input type="text" class="code" name="code3" tabindex="3" maxlength="1" required="required">
                    <input type="text" class="code" name="code4" tabindex="4" maxlength="1" required="required">
                 </div>
            </main>
            <div id="container" class="container">
                <button class="learn-more">
                    <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">
                        <button class="button-text" type="submit" >send</button>
                    </span>
                </button>
            </div>
            
                             
         </form>
        <?php 
        }
        else {
        echo 'there is no such id';
        }
    
        include $stl . 'footer.php';
  
ob_end_flush() ;      
?>