<?php 
    session_start();
    $PageTitel = 'active';
    if (isset($_SESSION['Username'])){
        include 'int.php';
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['file']) && isset($_FILES['file2']) && isset($_FILES['file3'])) {        
            $myfile1 = $_FILES['file'];
            $myfile2 = $_FILES['file2'];
            $myfile3 = $_FILES['file3'];
            $userid = $_POST['id'];
            $formErorrs = array() ;
            if (empty($myfile1['name'])) {
                $formErorrs[] = '<div class="alert alert-danger"> يجب ارفاق البطاقة التمونية  </div>';
            }
            if (empty($myfile2['name'])) {
                $formErorrs[] = '<div class="alert alert-danger"> يجب ارفاق السجل التجارى  </div>';
            }
            if (empty($myfile3['name'])) {
                $formErorrs[] = '<div class="alert alert-danger"> يجب ارفاق موافقة اللجنة الضربية  </div>';
            }
             foreach($formErorrs as $eroor) {
                echo $eroor . '<br/>' ;
             }
             if (empty($formErorrs) ) {
                if ($myfile1['error'] === 0 && $myfile2['error'] === 0 && $myfile3['error'] === 0) {
                    if ($myfile1['size'] > 1250000 && $myfile2['size'] > 1250000 && $myfile3['size'] > 1250000) {
                        echo '<div class="alert alert-danger"> برجاء ارفاق ملف اصغر من 1 ميجا  </div>'; 
                   
                    } else {
                        $img_ex1 = pathinfo($myfile1['name'],PATHINFO_EXTENSION);
                        $img_ex2 = pathinfo($myfile2['name'],PATHINFO_EXTENSION);
                        $img_ex3 = pathinfo($myfile3['name'],PATHINFO_EXTENSION);
                        $img_ex_lc1 =strtolower($img_ex1);
                        $img_ex_lc2 =strtolower($img_ex2);
                        $img_ex_lc3 =strtolower($img_ex3);
                        $alow_acs = array("pdf" , "PDF") ;
                        if (in_array($img_ex_lc1 , $alow_acs) && in_array($img_ex_lc2 , $alow_acs) && in_array($img_ex_lc3 , $alow_acs) ) {
                            $new_img_name1 = uniqid("PDF-" ,true).'.'.$img_ex_lc1 ;
                            $new_img_name2 = uniqid("PDF-" ,true).'.'.$img_ex_lc2 ;
                            $new_img_name3 = uniqid("PDF-" ,true).'.'.$img_ex_lc3 ;
                            $img_upload_path1 = 'upload/'.$new_img_name1 ;
                            $img_upload_path2 = 'upload/'.$new_img_name2 ;
                            $img_upload_path3 = 'upload/'.$new_img_name3 ;
                        
                            move_uploaded_file($myfile1['tmp_name'], $img_upload_path1);
                            move_uploaded_file($myfile2['tmp_name'], $img_upload_path2);
                            move_uploaded_file($myfile3['tmp_name'], $img_upload_path3);
                            $stmt = $con->prepare("UPDATE d_market SET Market_Revision_Code = ? , Tax_register = ? , Commercial_register = ?   WHERE market_id = ? ");
                            $stmt->execute(array($new_img_name1,$new_img_name2,$new_img_name3,$userid));
                            echo '<div class="alert alert-success">  تم ارفاق الملفات بنجاح  </div>'; 
                        } else {
                            echo '<div class="alert alert-danger">  pdf برجاء ارفاق ملفات بصيغة   </div>'; 
                        }
                        
                        
                    }
                } else {
                    echo '<div class="alert alert-danger"> هناك مشكلة فى ارفاق الملفات حاول مرة اخرى  </div>'; 
                }
              
             }
        } else {
            echo "0";
        }
        include $stl . 'footer.php';
    }

    else {
        header('Location: index.php');
        exit();
    }
     ?>