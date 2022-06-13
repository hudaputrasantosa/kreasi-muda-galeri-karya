<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="./fav.jpg">
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Error 404 : Halaman Tidak Ditemukan</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- PAGE LEVEL STYLES-->
    <link href="../assets/css/error.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        
         <div class="row text-center">
               
                <div class="col-md-12 set-pad" >
                           
                            <strong class="error-txt">ERROR ! 404</strong>
                           <p class="p-err">Maaf, Halaman Ini Tidak Ada. Periksa Kembali Alamat Url</p>
                    <a href="../" class="btn btn-danger" ><i class="fa fa-mail-reply"></i>&nbsp;Kembali Ke Halaman Utama</a>
                    <?php if(@$_SESSION["user"]){}else{?> Atau <a href="../login" class="btn btn-primary" ><i class="fa fa-sign-in"></i>&nbsp;Login</a><?php }?>
                        </div>
                
                
        </div>
    </div>
    <div class="c-err">
        <div class="container">
        <!--Search Section Start-->
        <div class="row ">
            <div style="text-align:center;">
            <h3>Halaman Tidak Ditemukan</h3>
                        <p style="font-family:Comic Sans MS"><i class="fa fa-heart fa-spin"></i>  APALAGI JODOH LU <i class="fa fa-heart fa-spin"></i></p>
                    
            </div>
            <br />

        </div>
        <!--Search Section end-->


    </div>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
 
                  <br />
    <br />
            </div>

        </div>

    </div>
  
  
    <hr />
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                
                All Rights Reserved | &copy 2016 8.5 Web Grup(q)
            </div>

        </div>

    </div>
    
</body>
</html>
