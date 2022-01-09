<?php 
    $nonav = '';
    $PageTitel = 'Regeter';
    include "int.php"; 

?>
<link rel="stylesheet" href="<?php echo $css; ?>style_regester.css"> 
    <div class="wrapper">
        <div class="container">
            <h3><?php echo lang('create acount') ?></h3>
            <form class="form" action="reg.php" method="POST">
                <input name="f_name" type="text" placeholder="<?php echo lang('regeter name') ?> " required="required">
                <input name="ssn" type="text" placeholder="<?php echo lang('ID card number') ?>" required="required">
                <input name="phone_number" type="text" placeholder="<?php echo lang('Telephone number') ?>" required="required">
                <input name="gmeil" type="Email" placeholder="<?php echo lang('e-mail') ?>" required="required">
                <input name="titel" type="text" placeholder="<?php echo lang('Address') ?>" required="required">
                <input name="user_name" type="text" placeholder="<?php echo lang('user name') ?>" required="required">
                <input name="old_pass" type="password" placeholder="<?php echo lang('register  passsword') ?>" required="required">
                <input name="new_pass" type="password" placeholder="<?php echo lang('register re passsword') ?>" required="required">
                <button class="ntb_edit">edit</button>
            </form>      
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
<?php 
    include $stl . 'footer.php';
?>