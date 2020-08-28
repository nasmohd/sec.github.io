<?php
    include '../db.php';
    session_start();
    
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    $dot = explode ('.php?', $urlComponents[3]); //$dot = Array ( [0] => index [1] => php?1 ), http://localhost/Sec/index.php?1
    $dot_len = count($dot);
    $dot2 = explode ('.php?s', $urlComponents[3]);
    $dot_len = count($dot);
    $dot_len2 = count($dot2); //$dot2 = 1 for form, 2 for subj
//    echo $dot[1];
//    echo $dot_len;
//    print_r ($dot);

//    if ($dot_len > 1){  //Form x has been selected for viewing
//        echo "True";
//    }

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>School</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
   <div id = "page-container">
   
   <div id="content-wrap">
    <?php include '../phpIncludes/header.php' ?>
    <!-- Page Content goes Below here -->
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-6 col-6 offset-md-2 offset-xl-0">
               <span>O-Levels: </span>
                <div class='ml-3 btn btn-primary nav-item dropdown'>
                   <a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='#' style="color:white;"><span style="font-size:14px;">Select One</span></a>
                    <div class='dropdown-menu' role='menu'>
                    <a class='dropdown-item' role='presentation' href='?1'>Form 1</a>
                    <a class='dropdown-item' role='presentation' href='?2'>Form 2</a>
                    <a class='dropdown-item' role='presentation' href='?3'>Form 3</a>
                    <a class='dropdown-item' role='presentation' href='?4'>Form 4</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-7 col-xl-6 col-6 offset-md-2 offset-xl-0"> </div>
            
<?php
    if (($dot_len > 1) && ($dot_len2 == 1)) {  //Form x has been selected for viewing
        $selected_number = $dot[1];
        $_SESSION['level'] = $selected_number;
//        echo $selected_number;
        
        echo "
        <div class='col-md-3 col-lg-6 col-xl-6 col-12 offset-md-2 offset-xl-0 mt-1'>
               <span>Subject: </span>
                <div class='ml-4 btn btn-primary nav-item dropdown'>
                   <a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='#' style='color:white;'><span style='font-size:14px;'>Select Subject</span></a>
                    <div class='dropdown-menu' role='menu'>
                    <a class='dropdown-item' role='presentation' href='?subj=1'>Mathematics</a>
                    <a class='dropdown-item' role='presentation' href='?subj=2'>English</a>
                    <a class='dropdown-item' role='presentation' href='?subj=3'>Kiswahili</a>
                    <a class='dropdown-item' role='presentation' href='?subj=4'>Geography</a>
                    <a class='dropdown-item' role='presentation' href='?subj=5'>History</a>
                    <a class='dropdown-item' role='presentation' href='?subj=6'>Civics</a>
                    <a class='dropdown-item' role='presentation' href='?subj=7'>Chemistry</a>
                    <a class='dropdown-item' role='presentation' href='?subj=8'>Physics</a>
                    <a class='dropdown-item' role='presentation' href='?subj=9'>Biology</a>
                    <a class='dropdown-item' role='presentation' href='?subj=10'>Book Keeping</a>
                    <a class='dropdown-item' role='presentation' href='?subj=11'>Commerce</a>
                    </div>
                </div>
        </div>
        "; 
    }
      
       
    if (($dot_len > 1) && ($dot_len2 > 1)) { //subj has been selected
        $get_subj = explode ('subj=', $dot[1]);
        $count_subj = count($get_subj); //$count_subj = 1 if form selected, 2 if subj
        
        //http://localhost/Sec/pages/olevel.php?subj=10
        //http://localhost/Sec/pages/olevel.php?1
        
        if ($count_subj > 1){  
            $selected_subj = $get_subj[1];
            $_SESSION['subj'] = $selected_subj;
            echo "
        <div class='col-md-3 col-lg-6 col-xl-6 col-12 offset-md-2 offset-xl-0 mt-1'>
               <span>Subject: </span>
                <div class='ml-4 btn btn-primary nav-item dropdown'>
                   <a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='#' style='color:white;'><span style='font-size:14px;'>Select Subject</span></a>
                    <div class='dropdown-menu' role='menu'>
                    <a class='dropdown-item' role='presentation' href='?subj=1'>Mathematics</a>
                    <a class='dropdown-item' role='presentation' href='?subj=2'>English</a>
                    <a class='dropdown-item' role='presentation' href='?subj=3'>Kiswahili</a>
                    <a class='dropdown-item' role='presentation' href='?subj=4'>Geography</a>
                    <a class='dropdown-item' role='presentation' href='?subj=5'>History</a>
                    <a class='dropdown-item' role='presentation' href='?subj=6'>Civics</a>
                    <a class='dropdown-item' role='presentation' href='?subj=7'>Chemistry</a>
                    <a class='dropdown-item' role='presentation' href='?subj=8'>Physics</a>
                    <a class='dropdown-item' role='presentation' href='?subj=9'>Biology</a>
                    <a class='dropdown-item' role='presentation' href='?subj=10'>Book Keeping</a>
                    <a class='dropdown-item' role='presentation' href='?subj=11'>Commerce</a>
                    </div>
                </div>
        </div>
        "; 
        }
    }
        //$_SESSION['level'];
        //$_SESSION['subj'];


?>
<!--
            <div class="col-md-3 col-lg-3 mr-lg-auto mr-md-auto col-xl-6 col-6 offset-md-2 offset-xl-0">
                <div class='btn btn-primary nav-item dropdown mt-2'><a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='../pages/Syllabus.php' style="color:white;">Select Subject</a>
                    <div class='dropdown-menu' role='menu'>
                    <a class='dropdown-item' role='presentation' href='#'>Form 1</a>
                    <a class='dropdown-item' role='presentation' href='#'>Form 2</a>
                    <a class='dropdown-item' role='presentation' href='#'>Form 3</a>
                    <a class='dropdown-item' role='presentation' href='#'>Form 4</a>
                    </div>
                </div>
            </div>
-->
        </div>
    </div>
    
    
    
    </div>
    
    <?php
    include '../phpIncludes/footer.php';       
       
?>
    
    </div>
    
    <style>
        #page-container {
            position: relative;
            min-height: 100vh;
        }
        
        #content-wrap{
            padding-bottom: 2.5rem; /* Footer height */
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