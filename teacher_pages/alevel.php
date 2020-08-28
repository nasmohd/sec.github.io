<?php
    include '../db.php';
    session_start();
    
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    $dot = explode ('.php?', $urlComponents[3]); //$dot = Array ( [0] => index [1] => php?1 ), http://localhost/Sec/index.php?1
    $dot2 = explode ('.php?sub', $urlComponents[3]);
    $dot_len = count($dot);
    $dot_len2 = count($dot2); //$dot2 = 1 for form, 2 for subj
//    echo $dot[1];
//    echo $dot_len;
//    print_r ($dot);

    if (($dot_len > 1) && ($dot_len2 < 2)){ //Only form has been selected;
        $_SESSION ['form_selected'] = $dot[1];
    }
    
    if (($dot_len > 1) && ($dot_len2 > 1)){ //Form & Subject have been selected
        $_SESSION ['subj_selected'] = $dot2[1];
    }

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
    <?php include '../phpIncludes/header_teacher.php' ?>
    <!-- Page Content goes Below here -->
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-6 col-6 offset-md-2 offset-xl-0">
              <font color="#0C7FCF" style='font-size:16px; font-weight:500;'>Please make a selection</font>
                <div style="color: #0C7FCF"><hr></div>
               <span style="font-size:14px;">A-Levels: </span>
                <div class='ml-3 btn btn-primary nav-item dropdown'>
                   <a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='#' style="color:white;"><span style="font-size:14px;" id='form_text'>Select One</span></a>
                    <div class='dropdown-menu' role='menu'>
                    <a class='dropdown-item' role='presentation' href='?5' onclick="form_selected('5')">Form 5</a>
                    <a class='dropdown-item' role='presentation' href='?6' onclick="form_selected('6')">Form 6</a>

                    </div>
                </div>
                
            <?php
                if (($dot_len > 1) && ($dot_len2 < 2)){ //Only form has been selected;
                    echo "
                <font class='ml-lg-2' style='font-size:14px; font-weight:400; color: red;'>Select subject</font>
                ";
                }
                
                ?>
                
                
            </div>
            <div class="col-md-3 col-lg-7 col-xl-6 col-6 offset-md-2 offset-xl-0"> </div>

        <div class='col-md-3 col-lg-6 col-xl-6 col-12 offset-md-2 offset-xl-0 mt-1'>
               <span style="font-size:14px;">Subject: </span>
                <div class='ml-4 btn btn-primary nav-item dropdown'>
                   <a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='#' style='color:white;'><span style='font-size:14px;' id='subj_text'>Select Subject</span></a>
                    <div class='dropdown-menu' role='menu'>
                    <a class='dropdown-item' role='presentation' href='?sub1' onclick="subj_selected('Mathematics')">Mathematics</a>
                    <a class='dropdown-item' role='presentation' href='?sub2' onclick="subj_selected('English')">English</a>
                    <a class='dropdown-item' role='presentation' href='?sub3' onclick="subj_selected('Kiswahili')">Kiswahili</a>
                    <a class='dropdown-item' role='presentation' href='?sub4' onclick="subj_selected('Geography')">Geography</a>
                    <a class='dropdown-item' role='presentation' href='?sub5' onclick="subj_selected('History')">History</a>
                    <a class='dropdown-item' role='presentation' href='?sub6' onclick="subj_selected('Civics')">Civics</a>
                    <a class='dropdown-item' role='presentation' href='?sub7' onclick="subj_selected('Chemistry')">Chemistry</a>
                    <a class='dropdown-item' role='presentation' href='?sub8' onclick="subj_selected('Physics')">Physics</a>
                    <a class='dropdown-item' role='presentation' href='?sub9' onclick="subj_selected('Biology')">Biology</a>
                    <a class='dropdown-item' role='presentation' href='?sub10' onclick="subj_selected('Book Keeping')">Book Keeping</a>
                    <a class='dropdown-item' role='presentation' href='?sub11' onclick="subj_selected('Commerce')">Commerce</a>
                    <a class='dropdown-item' role='presentation' href='?sub12' onclick="subj_selected('General Studies')">General Studies</a>
                    </div>
                </div>
        </div>
        
<script>
    window.onload = function(){
        var sub = window.localStorage.getItem('subj');
        var form_sel = window.localStorage.getItem('form');
        
        if (sub == null){
            subj_selected('Select Subject');
        }else {
            subj_selected(sub);
        }
        
        if (form_sel == null){
            form_selected('Select One');
        }else{
            form_selected(form_sel);
        }
    }
    
    function subj_selected(x){
        window.localStorage.setItem ('subj', x);
        var txt = document.getElementById("subj_text");
        txt.innerHTML = x;
//        alert (window.localStorage.getItem('subj'));
    }
    
    function form_selected(y){
        window.localStorage.setItem ('form', y);
        var txt2 = document.getElementById("form_text");
//        txt2.innerHTML = "Form " + y;
        if (y == 'Select One'){
            txt2.innerHTML = y;
        }else {
            txt2.innerHTML = "Form " + y;
        }
    }     
</script>
       
<?php
    if (($dot_len > 1) && ($dot_len2 > 1)){
        $selected_form = $_SESSION ['form_selected'];
        $selected_subject = $_SESSION ['subj_selected'];
        
//        echo $selected_subject;
        
        echo "<hr>
        <div class='col-lg-11 ml-auto mr-auto mt-lg-3'>
                <div class='table-responsive' style='border: 1px solid #0C7FCF;'>
                        <table class='table table-striped' style='font-size: 14px;'>
                            <thead>
                                <tr style='background-color: #0C7FCF; color:white;'>
                                    <th style='width: 20%'>Chapter</th>
                                    <th style='width: 40%'>Topic</th>
                                    <th style='width: 40%'>Sub-topics</th>
                                </tr>
                            </thead>
                
            
        ";
        
        //include
        
        if (($selected_form == '5') && ($selected_subject == '12')){
            include 'syllabus/form5_GS.php';
            
        }
        
        if (($selected_form == '6') && ($selected_subject == '12')){
            include 'syllabus/form5_GS.php';
            
        }
        
        if (($selected_form == '5') && ($selected_subject == '3')){
            include 'syllabus/form5_Kisw.php';
            
        }
        
        if (($selected_form == '6') && ($selected_subject == '3')){
            include 'syllabus/form6_Kisw.php';
            
        }
        
        echo "</table></div>
    </div>"; 

    }
    
//    echo "
//        <script>
//            function form_selected(y){
//                var txt2 = document.getElementById(\"form_text\");
//                txt2.innerHTML = \"Form \" + y;
//            }
//        </script>
//    ";
?>
        

        </div>
    </div>
    
    </div>
    
    <div class="footer-basic text-center" style="background-color: #0C7FCF;" id="footer">
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
            padding-bottom: 8rem; /* Footer height */
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