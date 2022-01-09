<?php 
    session_start();
    $PageTitel = 'Home';
    if (isset($_SESSION['Username'])){
        include 'int.php';
        $userid = $_SESSION['ID'];
        $stmt = $con->prepare("SELECT * FROM d_market WHERE market_id  = ?");
            $stmt->execute(array($userid));
            $row =  $stmt->fetch();
             $avtivate = '' ; 
             if ($row['activate'] == 0) {
                $avtivate = 'non activate' ;
             } else {
                $avtivate = ' activate' ;
             }
            $cont = $stmt->rowCount();
            
            if ($stmt->rowCount() > 0 ) { ?>
                 <div class="container">
                        <h1 class="profile"><?php echo lang('Your Profile') ?></h1>
                        <!-- Start form -->
                        <form class="container container-form">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"><?php echo lang('name') ?></label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext Profile" id="staticEmail" value="<?php echo $row['f_name']; ?>">
                                </div>
                            </div>
                            <hr class="style1">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"><?php echo lang('e-mail') ?></label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $row['gmail']; ?>">
                                </div>
                            </div>
                            <hr class="style1">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"><?php echo lang('Telephone number') ?></label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"  value="<?php echo $row['phone']; ?>">
                                </div>
                            </div>
                            <hr class="style1">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"><?php echo lang('Address') ?></label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"  value="<?php echo $row['titel']; ?>">
                                </div>
                            </div>
                            <hr class="style1">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label"><?php echo lang('acount') ?></label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"  value="<?php echo $avtivate; ?>">
                                </div>
                            </div>
                        </form>
                        <!-- End form -->
                    </div>
    <?php  } else {
        echo 'there is no such id';
    }
    
        include $stl . 'footer.php';
    } 
    else {
        header('Location: index.php');
        exit();
    }
?>