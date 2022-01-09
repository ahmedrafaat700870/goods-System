<?php 
    $nonav = '';
    $PageTitel = 'Log in';
    session_start();
    if (isset($_SESSION['Username'])){
        header('Location: Home.php');
    } 
    include "int.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        # code...
        $username = $_POST['user'];
        $password = $_POST['pass'];
       //   $hashpass = sha1('password');
        $stmt = $con->prepare("SELECT  activate ,	market_id  , d_username , d_password FROM d_market WHERE d_username = ? AND d_password = ?");
        $stmt->execute(array($username,$password));
        $row =  $stmt->fetch();
        $cont = $stmt->rowCount();
      
       /* if  $cont > 0 is main that Database containe this User  */
        if ($cont > 0 ) {
            $active = $row ['activate'] ;
            $userid = $row['market_id'];
            $_SESSION['Username'] =  $username ;
            $_SESSION['ID'] = $row['market_id'] ; 
            $_SESSION['activate'] = $active ; 
           
            header("Location: Home.php?do=home&userid=".$userid);
            exit();
        }
        
    }
?>
  <!-- login page -->
  <div class="login">
     <div class="login page">
        <div class="wrapper">
            <div style="
    font-family: 'Cairo', sans-serif;" class="container">
                <h1><?php echo lang('Welcome'); ?></h1>
                <form  class="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                 <input type="hidden" value="<?php echo $userid ?>" name="userid">
                    <input type="text" name="user" placeholder="<?php echo lang('user Name'); ?>" autocomplete="off">
                    <input type="password" name="pass" placeholder="<?php echo lang('password'); ?>">
                    <button type="submit" id="login-button"><?php echo lang('login'); ?></button>
                  <div style="width: 121%;
    margin-top: 15px;
    ">  <p class="p-forget"> <a style="
    list-style: none;
    color: white;
    text-decoration: none;
    "
     href="forgit.php"> <?php echo lang('forgit pasword'); ?> </a> </p> </div>
                  <div style="width: 121%;
    margin-top: 2.5px;"> <p class="p-new-acount"><a
    style="
    list-style: none;
    color: white;
    text-decoration: none;
    " 
     href="ergester.php"> <?php echo lang('create new acont'); ?> </a></p> </div> 
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
   <!-- ./login page -->
<?php 
    include $stl . 'footer.php';
?>

