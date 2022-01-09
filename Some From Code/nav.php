<?php
ob_start() ;
$nonav = ''; 
$userid = (isset($_GET['userid']) && is_numeric($_GET['userid'])) ? intval($_GET['userid']) : 0;
$stmt = $con->prepare("SELECT activate FROM d_market WHERE  market_id = ?");
$stmt->execute(array($userid));
$row =  $stmt->fetch();
$cont = $stmt->rowCount(); 
$active = $_SESSION['activate'] ;

?>
 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css'>      
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
        <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&amp;display=swap'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css'>
       <link rel="stylesheet" href="<?php echo $css; ?>inbox.css"> 
        <link rel="stylesheet" href="<?php echo $css; ?>product.css"> 

<script> 
  function myfunc() {
var active = document.getElementById("active").value ;
var scane = document.getElementById("scane") ;
var pay = document.getElementById("pay") ;
var View = document.getElementById("View") ;
var activat = document.getElementById("activat") ;
if (active > 0) {
    activat.parentNode.removeChild(activat);
    document.getElementById("myDIV").style.display = "none";
} else {
    scane.parentNode.removeChild(scane);
    pay.parentNode.removeChild(pay);       
    View.parentNode.removeChild(View); 
}
}
</script>
<!-- partial:index.partial.html -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MY <span class="badge bg-success">Acount</span></a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
      <div class="hamburger-toggle">
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Home.php?do=home&userid=<?php echo $_SESSION['ID'];?>"><?php echo lang('Home'); ?></a>
        </li>

        <li class="nav-item" id="scane">
          <a  class="nav-link" href="scane.php?do=ScaneQr&userid=<?php echo $_SESSION['ID']; ?>"><?php echo lang('Scane'); ?></a>
        </li>
        
        <li class="nav-item" id="pay">
          <a onclick="myfunc()"  class="nav-link" href="pay.php?do=pay&userid=<?php echo $_SESSION['ID']; ?>"><?php echo lang('pay'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inbox.php?do=Inbox&userid=<?php echo $_SESSION['ID']; ?>"><?php echo lang('Inbox'); ?></a>
        </li>
        <li class="nav-item" id="View">
          <a  class="nav-link" href="product.php?do=ViewEditProducts&userid=<?php echo $_SESSION['ID'];?>"><?php echo lang('View / Edit Products'); ?></a>
        </li>
        <div id="myDIV">
        <li class="nav-item" id="activat">
          <a  class="nav-link" href="activat.php?do=activat&userid=<?php echo $_SESSION['ID'];?>"><?php echo "Activate"; ?></a>
        </li>
        </div>
        
        <input id="active" type="hidden" value="<?php echo $active ?>">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"><?php echo lang('setting'); ?></a>
          <ul class="dropdown-menu shadow">
            <li><a class="dropdown-item" href="sendvc.php?do=pass&userid=<?php echo $_SESSION['ID']; ?>"><?php echo lang('pass'); ?></a></li>
            <li><a class="dropdown-item" href="sendphonevc.php?do=phone&userid=<?php echo $_SESSION['ID']; ?>"><?php echo lang('phone'); ?></a></li>
            
            
            <li><hr class="dropdown-divider"></li>
            <li class="dropdown-submenu">
              <a href="#" class="dropdown-item dropdown-submenu-toggle"><?php echo lang('lang'); ?></a>
              <ul class="dropdown-menu dropdown-submenu shadow">
              <li><a class="dropdown-item" href="setting.php?do=ar"><?php echo lang('arab'); ?></a></li>
              <li><a class="dropdown-item" href="setting.php?do=en"><?php echo lang('eng'); ?></a></li>
              </ul>
            </li></ul>
        </li>
      </ul>
      <form class="d-flex btn-non">
        <a href="logout.php" class="btn btn-outline-success btn-non-btn"><?php echo lang('log out'); ?></a>
      </form>
    </div>
  </div>
</nav>
<?php 

ob_end_flush() ;
?>
<!-- partial -->
