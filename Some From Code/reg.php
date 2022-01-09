<?php 
ob_start();
    $nonav = '';
    $PageTitel = 'Regeter';
    include "int.php"; 

?>
 
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $f_name = $_POST['f_name'];
        $ssn = $_POST['ssn'];
        $phone_number = $_POST['phone_number'];
        $titel = $_POST['titel'];
        $user_name = $_POST['user_name'];
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $gmeil = $_POST['gmeil'];
        $formErorrs = array() ;
        if (empty($f_name)) {
            $formErorrs[] = '<div class=" alert alert-danger alert-regester"> يجب ادخال الاسم الاول  </div>';
        }
      
        if (empty($ssn)) {
            $formErorrs[] = '<div class="alert alert-danger alert-regester"> يجب ادخال رقم البطاقة </div>';
        }
        if (is_numeric($ssn)) {
            
        }
        else {
            $formErorrs[] = '<div class="alert alert-danger alert-regester"> يجب ادخال ارقام  </div>';
        }
        if (strlen($ssn) < 14  || strlen($ssn) > 14 )  {
            $formErorrs[] = '<div class="alert alert-danger alert-regester">  يجب ادخال 14 رقم للبطاقة </div>';
        }
        if (empty($phone_number)) {
            $formErorrs[] = '<div class="alert alert-danger alert-regester"> يجب ادخال رقم الهاتف </div>';
        }
        if (strlen($phone_number) == 11) {
        } else {
            $formErorrs[] = '<div class="alert alert-danger alert-regester"> يجب ادخال 11 رقم  للهاتف  </div>';
        }
       
        if (empty($titel)) {
            $formErorrs[] = '<div class="alert alert-danger alert-regester"> يجب ادخال غنوان </div>';
        }
        if (empty($user_name)) {
            $formErorrs[] = '<div class="alert alert-danger alert-regester"> يجب ادخال اسم المستخدم </div>';
        }
        if (empty($old_pass)) {
            $formErorrs[] = '<div class="alert alert-danger alert-regester"> يجب ادخال الباسورد </div>';
        }
        if (empty($new_pass)) {
            $formErorrs[] = '<div class="alert alert-danger alert-regester"> يجب ادخال تاكيد الباسورد </div>';
        }
        if ($old_pass == $new_pass ) {
        } else {
            $formErorrs[] = '<div class="alert alert-danger alert-regester"> الباسورد غير متطابق </div>';
        }
            foreach($formErorrs as $eroor) {
                echo $eroor . '<br/>' ;
                erdrecithome($eroor , 'index.php' , 'Home' , 3) ;
         
            }
            // $contd = cont('d_username' , 'd_market' , 'd_username' , $user_name ) ;
            // $rowd = fetch('d_username' , 'd_market' , 'd_username' , $user_name ) ;
            // echo $contd  ;
            // print ($rowd) ;
             $stmtd = $con->prepare("SELECT 	d_username FROM d_market WHERE d_username = ?");
             $stmtd->execute(array($user_name));
             $rowd =  $stmtd->fetch();
             $contd = $stmtd->rowCount();
            //$cont = cont('ssn' , 'd_market' , 'ssn' , $ssn ) ;
            //$row = cont('ssn' , 'd_market' , 'ssn' , $ssn ) ;
            //echo '<br>' ;
            //echo $cont  ;
            //print ($row) ;
             $stmt = $con->prepare("SELECT ssn FROM d_market WHERE  ssn = ?");
             $stmt->execute(array($ssn));
            $row =  $stmt->fetch();
            $cont = $stmt->rowCount();
   
            if ($cont > 0) {
                $themsg = '<div class="alert alert-danger alert-main">هذا الحساب موجود من قبل </div>'; 
                erdrecithome($themsg ,'index.php' , "Login page" , 3);  
            } else {
                    
                    if ($contd > 0) {
                        $themsg ='<div class="alert alert-danger alert-main"> اسم المسخدم موجود من قبل </div>';  
                        erdrecithome($themsg ,'index.php' , "Login page" , 3);  
                        
                    } else {
                        if (empty($formErorrs) ) {
                            # $insert = "d_market(f_name   , phone , d_password  ,d_username , gmail  ,titel  ,ssn )" ;
                            # $value = "(:$f_name , :$phone_number ,:$old_pass  , :$user_name, :$gmeil  ,:$titel ,:$ssn )";
                            # insert($insert ,$value) ;
                            $stmti = $con->prepare("INSERT INTO d_market(f_name   , phone , d_password  ,d_username , gmail  ,titel  ,ssn )
                            VALUES(:zf_name , :zphone ,:zd_password  , :zd_username,:zgmail  ,:ztitel ,:zssn )");
                            $stmti->execute(array(
                            'zf_name' => $f_name ,
                            'zphone' => $phone_number ,
                            'zd_password' => $old_pass ,
                            'zd_username' => $user_name ,
                            'zgmail' => $gmeil ,
                            'ztitel' => $titel ,
                            'zssn' => $ssn 
                            ));
                            $themsg = '<div class="alert alert-success alert-main">تم انشاء حسابك بنجاح </div>';
                            erdrecithome($themsg ,'index.php' , "Login page" , 3);  
            
                         }

                    }
            }
    }
    
 ?>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<?php 
    include $stl . 'footer.php';
    ob_end_flush() ;
?>