<?php
    include '../db.php';
    session_start();

    include 'count_books.php';
    
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    $dot = explode ('.php?', $urlComponents[3]); //$dot = Array ( [0] => index [1] => php?1 ), http://localhost/Sec/index.php?1
    $dot2 = explode ('.php?sub', $urlComponents[3]);
    $dot_len = count($dot);
    $dot_len2 = count($dot2); //$dot2 = 1 for form, 2 for subj
//    echo $dot[1];
//    echo $dot_len;
//    echo $dot_len2;
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
    <?php include '../phpIncludes/header.php' ?>
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
        
        
        </div>
    </div>  <!-- The end of the first container -->
    
    

    <?php
    if (($dot_len == 1) && ($dot_len2 == 1)){
        $count_Alevel = mysqli_query ($conn, "SELECT * FROM recommended_books WHERE (Form = 'Form 5' OR Form = 'Form 6')");
        $res_count_Alevel = mysqli_fetch_assoc($count_Alevel);
        $count_Alevel_Books = mysqli_num_rows ($count_Alevel);
        
        
        echo "
        <div class='container mt-3'>
        <div class='row'>
        <div class='col-lg-12 col-12 ml-auto mr-auto'>
        <div> <hr></div>
        
        <font color='#0C7FCF' style='font-size:15px; color: #28A745; font-weight: 500;'>A-Level Books in Our Database <span style='color:#007BFF;'>(".$count_Alevel_Books." books)</span></font>
        
        
        <div class='table-responsive' style='border: 1px solid #28A745;'>
        <table class='table table-striped'  style='font-size: 14px;'>
            <thead>
                <tr class='text-center' style='background-color: #28A745; color:white;'>
                    <th style='width: 5%'>Form</th>
                    <th style='width: 5%'>Math</th>
                    <th style='width: 5%'>Eng</th>
                    <th style='width:5%'>Kisw</th>
                    <th style='width: 5%'>Geo</th>
                    <th style='width: 5%'>Hist</th>
                    <th style='width: 5%'>Civ</th>
                    <th style='width: 5%'>Chem</th>
                    <th style='width: 5%'>Phys</th>
                    <th style='width: 5%'>Bio</th>
                    <th style='width: 10%'>Book-Keeping</th>
                    <th style='width: 3%'>Commerce</th>
                </tr>
            </thead>
            <tbody>
                <tr class='text-center'>
                    <td>Form 5</td>
                    <td>".$count_math_f5."</td>
                    <td>".$count_eng_f5."</td>
                    <td>".$count_kisw_f5."</td>
                    <td>".$count_geo_f5."</td>
                    <td>".$count_hist_f5."</td>
                    <td>".$count_civ_f5."</td>
                    <td>".$count_chem_f5."</td>
                    <td>".$count_phys_f5."</td>
                    <td>".$count_bio_f5."</td>
                    <td>".$count_bk_f5."</td>
                    <td>".$count_comm_f5."</td>
                </tr>
                <tr class='text-center'>
                    <td>Form 6</td>
                    <td>".$count_math_f6."</td>
                    <td>".$count_eng_f6."</td>
                    <td>".$count_kisw_f6."</td>
                    <td>".$count_geo_f6."</td>
                    <td>".$count_hist_f6."</td>
                    <td>".$count_civ_f6."</td>
                    <td>".$count_chem_f6."</td>
                    <td>".$count_phys_f6."</td>
                    <td>".$count_bio_f6."</td>
                    <td>".$count_bk_f6."</td>
                    <td>".$count_comm_f6."</td>
                </tr>
            </tbody>
        </table>
    </div>
        </div></div>
        </div>
        ";
    }  
       
       
    if (($dot_len > 1) && ($dot_len2 > 1)  && isset($_SESSION['form_selected'])){ //Form & Subject have been selected
        //$_SESSION ['form_selected']
        //$_SESSION ['subj_selected']
//        echo $_SESSION ['form_selected']. " ". $_SESSION ['subj_selected'];
        $selected_sub = $_SESSION ['subj_selected'];
        $selected_form = "Form ".$_SESSION ['form_selected'];
        
        $get_rec_Books = "SELECT * FROM recommended_books WHERE subject_id = '$selected_sub' AND Form = '$selected_form'";
        $run_rec_Books = $conn -> query ($get_rec_Books);
        $res_rec_Books = $run_rec_Books -> fetch_assoc();
        $numberRes_rec_Books = mysqli_num_rows($run_rec_Books);
        
        $get_max_no ="SELECT MAX(book_id) AS max_book_id FROM recommended_books WHERE Form = '$selected_form'";
        $run_max = $conn -> query ($get_max_no);
        $res_max = $run_max -> fetch_assoc();
        $total_res_books = $res_max['max_book_id'];
        //echo $numberRes_rec_Books; //result 1
        
        if ($numberRes_rec_Books != 0){ //Results have been found
            
    ?>
    <div class='container mt-3'>
        <div class='row'>
            <div class='col'>
                <div class='col-lg-12 col-12 ml-auto mr-auto'>
                    <div class='table-responsive' style='border: 1px solid #0C7FCF;'>
                        <table class='table table-striped' style='font-size: 14px;'>
                            <thead>
                                <tr style='background-color: #0C7FCF; color:white;'>
                                    <th style='width: 5%'>SN</th>
                                    <th style='width: 10%'>SUBJECT</th>
                                    <th style='width: 20%'>TOPICS</th>
                                    <th style='width: 40%'>TITLE &amp; AUTHOR</th>
                                    <th style='width: 15%'>ESTIMATE PRICE (TZS)</th>
                                </tr>
                            </thead>
                    <tbody>
                    
           <?php      //Results have been found
            $loop = 1;
            $dsp = 1;
            while ($loop <= $total_res_books){
        $get_rec_Books2 = "SELECT * FROM recommended_books WHERE (book_id='$loop' AND subject_id = '$selected_sub' AND Form = '$selected_form')";
        $run_rec_Books2 = $conn -> query ($get_rec_Books2);
        $res_rec_Books2 = $run_rec_Books2 -> fetch_assoc();
        $numberRes_rec_Books2 = mysqli_num_rows($run_rec_Books2);
//        echo $numberRes_rec_Books2;
        if ($numberRes_rec_Books2 != 0){         
                echo "
                        <tr>
                            <td>".$dsp."</td>
                            <td>".$res_rec_Books2['subject_name']."</td>
                            <td>".$res_rec_Books2['topics']."</td>
                            <td>".$res_rec_Books2['book_name']."</td>
                            <td>".$res_rec_Books2['estimate_price']."</td>
                        </tr>"; 
                $dsp = $dsp + 1;
            }
                $loop = $loop + 1;
            }?>
            
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
        </div> 
            
            
            <?php
        }else {
            echo "
            <div class='container'>
            <div><hr/> </div>
            <font color='red' style='font-size:14px; font-weight:500;'> No books for the Subject selected </font>
            </div>
            ";  
        }
    }
    ?>
    
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