<?php 
    $nonav = "" ;
    $PageTitel = 'Frogit';
        include 'int.php';
       ?>
         
        <form action="forgitBack.php" method="POST">
        <div class="mainDiv">
                <div class="cardStyle">
                    <form  name="signupForm" id="signupForm">
                    <h2 class="formTitle">
                        Forgit password
                    </h2>
                    
                    <div class="inputDiv">
                       <!--  
                           <label class="inputLabel" for="password">New Phone Number</label>
                            <input class="phone-change" type="hidden"  name="ChangePass"  value="
                            <?php# echo $row['PasswordUser'];  ?>">
                       --> 
                    </div>
                    <div class="inputDiv">
                    <label class="inputLabel" for="confirmPassword">Enter Your User Name</label>
                    <input class="phone-change" type="text" id="confirmPassword"  name="user" required="required">
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