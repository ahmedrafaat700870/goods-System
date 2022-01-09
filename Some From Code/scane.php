<?php 
    session_start();
    $PageTitel = 'Home';
    if (isset($_SESSION['Username'])){
        include 'int.php';
        $userid = $_SESSION['ID'] ;

        $stmt = $con->prepare("SELECT * FROM d_market WHERE market_id = ?");
            $stmt->execute(array($userid));
            $row =  $stmt->fetch();
            $cont = $stmt->rowCount();
            if ($stmt->rowCount() > 0 ) { ?>
               <html>
    <head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    </head>
    <body>
    <form action="scane_pack.php" method="POST">
         <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <video id="preview" width="100%" ></video>
                </div>
                <div class="col-md-6">
                    <label>SCAN QR CODE</label>
                    <input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control form-scane">
                    <br>
                    <input class="btn btn-success" type="submit" value="submit"   >
                </div>
            </div>
        </div>
    </form>
       

        <script>
           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
           });

        </script>
    </body>
</html>
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