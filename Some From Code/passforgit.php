<?php 
    session_start();
    $nonav = '' ;
    $PageTitel = 'password';
        include 'int.php';
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;
        echo $userid ;
        $stmt   = $con->prepare('UPDATE  d_market SET vc=0 WHERE 	market_id  = ?');
        $stmt->execute(array($userid));
        $row =  $stmt->fetch();
        $cont = $stmt->rowCount();
     
     ?>
         
        <form action="updatepassforgit.php" method="POST">
        <div class="mainDiv" style="max-height = 100vh !important">
                <div class="cardStyle">
                    <form  name="signupForm" id="signupForm">
                    <h2 class="formTitle">
                        Change password
                    </h2>
                    
                    <div class="inputDiv">
                       <!--  
                           <label class="inputLabel" for="password">New Phone Number</label>
                            <input class="phone-change" type="hidden"  name="ChangePass"  value="
                            <?php# echo $row['PasswordUser'];  ?>">
                       --> <input class="phone-change" type="hidden"  name="userid"  value="<?php echo $userid  ?>">
                    </div>
                    <div class="inputDiv">
                    <label class="inputLabel" for="confirmPassword">Confirm password</label>
                    <input class="phone-change" type="text" id="confirmPassword"  name="Changepass" required="required">
                    </div>
                    
                    <div class="buttonWrapper">
                    <button type="submit" id="submitButton" onclick="validateSignupForm()" class="submitButton pure-button pure-button-primary">
                        <span>Continue</span>
                        <span id="loader"></span>
                    </button>
                    </div>
                </form>
                </div>
                </div>
        
        </form>
    <?php  
    
        include $stl . 'footer.php';
  
?>