<?php 
ob_start() ;
    $nonav = "" ;
    $PageTitel = 'Frogit';
    include 'int.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // collect value of input field
        $user_name = $_POST['user'] ;
        $cont = cont('*' ,'d_market' ,'d_username' , $user_name ) ;
        if ($cont > 0) {
        $fetch = fetch('*' ,'d_market' ,'d_username' , $user_name ) ;
        $gmail = $fetch['gmail'] ;
        echo $gmail ;
        echo '<div class="alert alert-success alert-main">  لارسال رسالة التاكيد الى حسابك continue برجاء الضغط على زر  </div>';
        ?>
        <div class="alert alert-success alert-main">  <?php echo $gmail ;  ?>   </div>'
        <form action="sendvcforgit.php" method="post">
            <input type="hidden" name="gmail" value="<?php echo $gmail ;  ?>">
            <input type="hidden" name="user_name" value="<?php echo $user_name ;  ?>">
            <div style="text-align: center;">
                <button type="submit" class="btn btn-outline-success">continue</button>
            </div>
        </form>
        <?php
        } else {
            $themasg = '<div class="alert alert-danger alert-main"> لا يوجد حساب باسم المستخدم الذى ادخلته </div>';
            erdrecithome($themasg ,'index.php' , "Home page" , 2);
        }









      } else {
          echo 'erorr' ;
      }
    

    include $stl . 'footer.php';
    ob_end_flush() ;
    ?>