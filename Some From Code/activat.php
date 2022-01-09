<?php 
    session_start();
    $PageTitel = 'active';
    if (isset($_SESSION['Username'])){
        include 'int.php';
     ?>
         
        <form  class=" form-active"   method="post" action="activeback.php" enctype="multipart/form-data">
        <h1 class="form-active-h1">ارفق ملفات</h1>
            <div class="mb-3">
            <input type="hidden" value="<?php echo $userid ?>" name="id">
                <label class="form-label" style="width: 100% !important;" for="formFile" >البطاقة التمونية</label>
                <input class="form-control formfile" type="file" id="formFile" name="file"/>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">السجل التجارى</label>
                <input class="form-control formfile" type="file" id="formFile" name="file2">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">موافقة اللجنة الضربية</label>
                <input class="form-control formfile" type="file" id="formFile" name="file3">
            </div>
            <input class="btn-active"  type="submit" name="" style="    background-color: #6c757d;">
        </form>
    <?php  
    
        include $stl . 'footer.php';
    }
    else {
        header('Location: index.php');
        exit();
    }
?>