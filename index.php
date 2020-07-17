<?php
    include 'db.php';
//    include 'phpIncludes/login.inc.php';

    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    $dot = explode ('.php?', $urlComponents[2]); //$dot = Array ( [0] => index [1] => php?1 ), http://localhost/Sec/index.php?1
    $dot_len = count($dot);

    if ($dot_len > 1){  //Wrong password entered
//        wrong_password();
        
        
    }
//    print_r ($dot);
//    echo $dot_len;
    

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
   <div id = "page-container">
   
   <div id="content-wrap">
    <div>
        <div>
            <div class="container-fluid text-light" style="background-color:#0C7FCF;">
                <div class="row">
                    <div class="col-md-8 col-xl-12 offset-md-2 offset-xl-0" style="width: 100%; background-color:#0C7FCF;">
                        <h1 class="text-center my-4" style="font-size: 30px;">Secondary School Syllabus Guider</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div>
        <div class="container">
           <form action="phpIncludes/login.inc.php" method="post">
            <div class="row mt-lg-5 mb-lg-5 mt-5">
                <div class="col mt-2 mb-5">
                    <div class="col-12 col-lg-4 ml-auto mr-auto py-2" style="background-color:#0C7FCF; color:white; border-top-left-radius: 10px;  border-top-right-radius: 10px;">
                        <h1 class="text-center pt-3" style="font-size: 18px;">LOG IN</h1>
                    </div>
                    <div class="col-12 col-lg-4 ml-auto mr-auto pb-5" style="border:2px solid #449EFF; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
                        <div class="col-lg-11 col-12 ml-auto mr-auto pb-2">              
                           <input type="text" id="regNo" class="col-12 mt-5 ml-auto mr-auto form-control" placeholder="Username" name="Username" value="fmaiga">
                           <input type="text" id="pwd" class="col-12 mt-2 ml-auto mr-auto form-control" placeholder="Password" name="pwd" value="fmaiga">
                            <button
                                class="btn btn-primary col-12 ml-auto mr-auto mt-3 mb-3 form-control" type="submit" name="submit_btn">Log in</button>
                                <p style="color:red; " id="wrong_password">
<!--                                <span style="font-size:13px;">Incorrect Username or Password </span></p>-->
                                <a class="float-right" href="#" style="font-size: 14px;">Register (New User)</a>
                                <div class="float-right"></div>
                        </div>
                    </div>
                </div>   
            </div>
            </form>
        </div>
    </div>
    
<!--
    <script>
        function wrong_password(Y){
       var txt = document.getElementById("wrong_password");
        txt.style.visibility = "visible";
        txt.style.color = "blue";
        txt.style.display = "block";
        alert (Y);
    }
       
    </script>
-->
    
    
    
<!--
    <script>
       var txt = document.getElementById("wrong_password");
        txt.style.visibility = "visible";
       
       </script>
-->
    
    </div> <!-- End of the page content -->
    
    <div class="footer-basic text-center" style="background-color:#0C7FCF;" id="footer">
        <div>
            <p class="copyright mt-4" style="color:white; font-size:14px;">© 2020 - Secondary School Syllabus Guider</p>
        </div>
    </div>
    
    </div>
    
    <style>
        #page-container {
            position: relative;
            min-height: 100vh;
        }
        
        #content-wrap{
            padding-bottom: 3rem; /* Footer height */
        }
        
        #footer{
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 5rem;
        }
        
    
    </style>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>