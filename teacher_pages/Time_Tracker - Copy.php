<?php
    include '../db.php';
    session_start();
    $current_user = $_SESSION['current_userID'];

    if (isset($_POST['add_entry'])){
//        $res_get_tracker['tracker_id']
        $start_date = $_POST['from_date'];
        $end_date = $_POST['to_date'];
        $topics = $_POST['topics'];
        $date_added = date("d/m/Y");
        $form = "Form ".$_SESSION ['form_selected'];
        $subject = $_SESSION ['subj_selected'];
        $selected_sub_ID = $_SESSION ['subj_selected'];
        
        //$_SESSION ['form_selected']
        //$_SESSION ['subj_selected']
        include '../phpIncludes/sub.php';
            
        $insert_track = "INSERT INTO time_tracker (subject_name, subject_id, form, start_date, end_date, topics, status, teacher_id, date_added) VALUES ('$subject_name', '$selected_sub_ID','$form', '$start_date', '$end_date', '$topics', '0', '$current_user', '$date_added')";
//
        $run_to_insert = $conn -> query ($insert_track);
        
//        if ($run_to_insert){
//            echo "Success";
//        }else{
//            echo "Bump";
//        }

    }

    if (isset($_POST['delete_entry'])){
//        echo "DELETE";
    }



    if (isset($_POST['delete_entry'])){
        $selected_id = $_POST['tracker_id'];

        
        $del_entry = "DELETE FROM time_tracker WHERE tracker_id = '$selected_id'";
        $run_del = $conn -> query ($del_entry);

    }

    if (isset($_POST['update_entry'])){
        $selected_id = $_POST['tracker_id'];
        $start_date = $_POST['from_date'];
        $end_date = $_POST['to_date'];
        $topics = $_POST['topics'];
        $date_added = date("d/m/Y");
        
        $update_track = "UPDATE time_tracker SET start_date = '$start_date', end_date = '$end_date', topics = '$topics' WHERE tracker_id = '$selected_id'";
//
        $run_to_update = $conn -> query ($update_track);
        
//        echo "DELETE";
    }

    //$_SESSION ['tracker_id']
    

    
    include 'count_books.php';
    
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    // http://localhost/Sec/index.php?1
    $dot = explode ('.php?', $urlComponents[3]); //$dot = 2 after form selection, $dot = Array ( [0] => index [1] => php?1 ) 
    $dot2 = explode ('.php?sub', $urlComponents[3]);
    $dot_len = count($dot);
//    print_r ($dot2);
    $dot_len2 = count($dot2); //$dot2 = 1 for form, 2 for subj
    
//    echo $dot_len." ".$dot_len2;
//    print_r ($dot);
//    print_r ($dot2);
//    echo "<br/>".$dot_len."<br/>";
//    echo $dot_len;


    //Code to delete
//    if ($dot_len > 1){
//        $del = explode ('?del', $dot[1]);
////    echo $del[1];
//        $total_del = count($del);
//        echo $total_del;
//        $lp_del = 1;
//        while ($lp_del < $total_del){
//            //check if present in db, then delete
//            $now = $del[$lp_del];
//            $check_entry = "SELECT * FROM time_tracker WHERE tracker_id = '$now'";
//            $run_check = $conn -> query ($check_entry);
//            $count_check = mysqli_num_rows ($run_check);
//            
//            if ($count_check != 0){  //such an entry is present
//                $del_entry = "DELETE FROM time_tracker WHERE tracker_id = '$now'";
//                $run_del = $conn -> query ($del_entry);
//            }
//            
//            $lp_del = $lp_del + 1;
//        }
//        
//        print_r ($del);
//    }
    


    if (($dot_len > 1) && ($dot_len2 < 2)){ //Only form has been selected;
        $_SESSION ['form_selected'] = $dot[1];
    }
    
    if (($dot_len > 1) && ($dot_len2 > 1)){ //Form & Subject have been selected
//        $_SESSION ['form_selected'] = '1';
        $_SESSION ['subj_selected'] = $dot2[1];
    }

    

//    echo "<br/>".$_SESSION ['form_selected']."<br/>";
//    echo $_SESSION ['subj_selected']."<br/>";

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
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
</head>

<body>
   <div id = "page-container">
   
   <div id="content-wrap">
        <?php include '../phpIncludes/header_teacher.php' ?>
    <!-- Page Content goes Below here -->
    
    <div class="container mt-3"> <!-- THIS -->
        <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-6 col-12 offset-md-2 offset-xl-0">
              <font color="#0C7FCF" style='font-size:16px; font-weight:500;'>Please make a selection</font>
                <div style="color: #0C7FCF"><hr></div>
               <span style="font-size:14px;">Pick One:  </span>
                <div class='ml-3 btn btn-primary nav-item dropdown'>
                   <a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='#' style="color:white;">
                   
                    <span style='font-size:14px;' id='form_text'>Select One</span>
                    </a>
                    <div class='dropdown-menu' role='menu'>
                    <a class='dropdown-item' role='presentation' href='?1' onclick="form_selected('1')">Form 1</a>
                    <a class='dropdown-item' role='presentation' href='?2' onclick="form_selected('2')">Form 2</a>
                    <a class='dropdown-item' role='presentation' href='?3' onclick="form_selected('3')">Form 3</a>
                    <a class='dropdown-item' role='presentation' href='?4' onclick="form_selected('4')">Form 4</a>
                    <a class='dropdown-item' role='presentation' href='?5' onclick="form_selected('5')">Form 5</a>
                    <a class='dropdown-item' role='presentation' href='?6' onclick="form_selected('6')">Form 6</a>
                    </div>
                </div>
                
                <br/>
                <span style="font-size:14px;">Pick One: </span>
                <div class='ml-3 mt-1 btn btn-primary nav-item dropdown'>
                   <a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='#' style='color:white;'>
                    <span style='font-size:14px;' id='subj_text'>Select Subject</span>

                   </a>
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
                
                <?php
                if (($dot_len > 1) && ($dot_len2 < 2)){ //Only form has been selected;
                    echo "
                <font class='ml-lg-2' style='font-size:14px; font-weight:400; color: red;'>Select subject</font>
                ";
                }
                
                ?>
                
                
            </div>
            
            
            <div class="col-md-3 col-lg-7 col-xl-6 col-12 offset-md-2 offset-xl-0 mt-4 py-2 text-justify font-italic card" style="font-size: 14px;">
            <h5> About this page</h5>
            <p> In this Page, you can plan out your teaching plan for the Academic Year </p> 
            <p> Inform your students about your plans regarding the Year ahead of them in order to make proper preparations and track pacing </p> 
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
    
//    echo "
//        <script>
//            function form_selected(y){
//                var txt2 = document.getElementById(\"form_text\");
//                txt2.innerHTML = \"Form \" + y;
//            }
//        </script>
//    ";
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
    
    <?php
    if (($dot_len == 1) && ($dot_len2 == 1)){
        echo "
        <div class='container mt-3'>
        <div class='row'>
        <div class='col-lg-12 col-12 ml-auto mr-auto'>
        <div> <hr></div>
        
        <font color='#0C7FCF' style='font-size:15px; color: #28A745; font-weight: 500;'>O-Level Books in Our Database</font>
        
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
                        <td>Form 1</td>
                        <td>".$count_math_f1."</td>
                        <td>".$count_eng_f1."</td>
                        <td>".$count_kisw_f1."</td>
                        <td>".$count_geo_f1."</td>
                        <td>".$count_hist_f1."</td>
                        <td>".$count_civ_f1."</td>
                        <td>".$count_chem_f1."</td>
                        <td>".$count_phys_f1."</td>
                        <td>".$count_bio_f1."</td>
                        <td>".$count_bk_f1."</td>
                        <td>".$count_comm_f1."</td>
                    </tr>
                    <tr class='text-center'>
                        <td>Form 2</td>
                        <td>".$count_math_f2."</td>
                        <td>".$count_eng_f2."</td>
                        <td>".$count_kisw_f2."</td>
                        <td>".$count_geo_f2."</td>
                        <td>".$count_hist_f2."</td>
                        <td>".$count_civ_f2."</td>
                        <td>".$count_chem_f2."</td>
                        <td>".$count_phys_f2."</td>
                        <td>".$count_bio_f2."</td>
                        <td>".$count_bk_f2."</td>
                        <td>".$count_comm_f2."</td>
                    </tr>
                    <tr class='text-center'>
                        <td>Form 3</td>
                        <td>".$count_math_f3."</td>
                        <td>".$count_eng_f3."</td>
                        <td>".$count_kisw_f3."</td>
                        <td>".$count_geo_f3."</td>
                        <td>".$count_hist_f3."</td>
                        <td>".$count_civ_f3."</td>
                        <td>".$count_chem_f3."</td>
                        <td>".$count_phys_f3."</td>
                        <td>".$count_bio_f3."</td>
                        <td>".$count_bk_f3."</td>
                        <td>".$count_comm_f3."</td>
                    </tr>
                    <tr class='text-center'>
                        <td>Form 4</td>
                        <td>".$count_math_f4."</td>
                        <td>".$count_eng_f4."</td>
                        <td>".$count_kisw_f4."</td>
                        <td>".$count_geo_f4."</td>
                        <td>".$count_hist_f4."</td>
                        <td>".$count_civ_f4."</td>
                        <td>".$count_chem_f4."</td>
                        <td>".$count_phys_f4."</td>
                        <td>".$count_bio_f4."</td>
                        <td>".$count_bk_f4."</td>
                        <td>".$count_comm_f4."</td>
                    </tr>
                    
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
       
       
    if (($dot_len > 1) && ($dot_len2 > 1) && isset($_SESSION['form_selected'])){ //Form & Subject have been selected
        //$_SESSION ['form_selected']
        //$_SESSION ['subj_selected']

        $selected_sub = $_SESSION ['subj_selected'];
        $selected_form = "Form ".$_SESSION ['form_selected'];
        
        $get_time_tracker = "SELECT * FROM time_tracker WHERE subject_id = '$selected_sub' AND form = '$selected_form'";
        $run_time_tracker = $conn -> query ($get_time_tracker);
        $res_time_tracker = $run_time_tracker -> fetch_assoc();
        $numberRes_time_tracker = mysqli_num_rows($run_time_tracker);
        
        $get_max_no ="SELECT MAX(tracker_id) AS max_tracker_id FROM time_tracker WHERE form = '$selected_form'";
        $run_max = $conn -> query ($get_max_no);
        $res_max = $run_max -> fetch_assoc();
        $total_time_tracker = $res_max['max_tracker_id'];
        //echo $numberRes_rec_Books; //result 1
        
        $change_status = explode ('?', $dot2[1]);
        $change_status_count = count($change_status);
//        echo $changes_status[1];
//        print_r ($change_status);
//        echo $change_status_count;
        
        $sts = 0;
        while ($sts < $change_status_count){
            $y_or_n = explode ('y', $change_status[$sts]); 
            //$check_yn = 2 for y
            $check_yn = count ($y_or_n);

            
            if ($check_yn == 2){ //means n to y
                $y = explode ('y', $change_status[$sts]);
//                $check_n = count ($n); //$check_n = 2 for n
//                print_r ($n);
//                echo $check_n;
                $selected_toY = $y[1];
//                echo $selected_toN;
                $update_tracker_toY = "UPDATE time_tracker SET status = '1' WHERE tracker_id = '$selected_toY'";
                $run_update_tracker_toY = $conn -> query ($update_tracker_toY);
                
            }
            
            if ($check_yn == 1){ //$check_yn = 1 for n
                $n = explode ('n', $change_status[$sts]);
                $check_n = count ($n); //$check_n = 2 for n
//                print_r ($n);
//                echo $n[1];
                if ($check_n > 1){
                    $selected_toN = $n[1];
                    $update_tracker_toN = "UPDATE time_tracker SET status = '0' WHERE tracker_id = '$selected_toN'";
                    $run_update_tracker_toN = $conn -> query ($update_tracker_toN);
                }
//                $selected_toY = $n[1];
//                echo $selected_toN;
//                print_r ($n);
//                $update_tracker_toN = "UPDATE time_tracker SET status = '1' WHERE tracker_id = '$selected_toN'";
            }
            
            $sts = $sts + 1;
        }
        
   
        if ($numberRes_time_tracker != 0){
    ?>        
    <div class='container mt-3'>
        <div class='row'>
           
            <div class='col'>
               <hr>
               
               <div class="col-lg-12 mb-2">
               <label title="Add New Entry">               
               <button type="button" class="btn btn-info"><span style="font-size:14px;" data-toggle="modal" data-target="#modal-default"> Add Entry </span></button>
               </label>
               
                </div>
               
                <div class='col-lg-12 col-12 ml-auto mr-auto'>
                    <div class='table-responsive' style='border: 1px solid #0C7FCF;'>
                        <table class='table table-striped' style='font-size: 14px;'>
                            <thead>
                                <tr style='background-color: #0C7FCF; color:white;'>
                                    <th style='width: 5%'>SN</th>
                                    <th style='width: 10%'>FROM (DATE)</th>
                                    <th style='width: 10%'>TO (DATE)</th>
                                    <th style='width: 40%'>TOPIC(s) </th>
                                    <th class='text-center' style='width: 14%'>STATUS </th>
                                    <th style='width: 15%' class='text-center'>ACTION </th>
                                </tr>
                            </thead><tbody>

      <?php      //Results have been found
            $loop = 1;
            $dsp = 1;
            while ($loop <= $total_time_tracker){
        $get_tracker = "SELECT * FROM time_tracker WHERE (tracker_id='$loop' AND subject_id = '$selected_sub' AND Form = '$selected_form' AND teacher_id = '$current_user')";
        $run_get_tracker = $conn -> query ($get_tracker);
        $res_get_tracker = $run_get_tracker -> fetch_assoc();
        $numberRes_get_tracker = mysqli_num_rows($run_get_tracker);
                
//        echo $numberRes_rec_Books2;
        if ($numberRes_get_tracker != 0){
                echo "
                    <tr>
                        <td>".$dsp."</td>
                        <td>".$res_get_tracker['start_date']."</td>
                        <td>".$res_get_tracker['end_date']."</td>
                        <td>".$res_get_tracker['topics']."</td>";
            
            if ($res_get_tracker['status'] == 0){
                echo "
                <td class='text-center'>
                        <i class='fas fa-2x fa-times-circle' style='color: #D54C48;'></i>
                        <label title='Change Status'>
                        <a href='?sub".$selected_sub."?y".$res_get_tracker['tracker_id']."' class='btn btn-dark' style='font-size: 13px;'><i class='fas fa-pencil-alt' style='color:white;'></i></a>
                        </label>
                        
                </td>
                ";
            }
            
            if ($res_get_tracker['status'] == 1){
                echo "
                <td class='text-center'>
                        <i class='fas fa-2x fa-check-circle' style='color: #57B257;'></i>
                        
                        <label title='Change Status'>
                        <a href='?sub".$selected_sub."?n".$res_get_tracker['tracker_id']."' class='btn btn-dark' style='font-size: 13px;' name='' >
                        <i class='fas fa-pencil-alt' style='color:white;'></i>
                        </a>
                        </label>         
                </td>
                ";
            }
//            $_SESSION ['tracker_id'] = $res_get_tracker['tracker_id'];
                     //href='?sub".$selected_sub."?del".$res_get_tracker['tracker_id']."'
            echo"               
                        <td class='text-center'>
                        <label title='Edit this Entry'>
                        <a type='button' class='btn btn-info' data-toggle='modal' data-target='#modal-default".$res_get_tracker['tracker_id']."'><span style='font-size:14px; color:white;'> Edit</span></a>
                        </label>
                        
                        <label title='Delete this Entry'>
                        <a type='button' class='btn btn-danger' data-toggle='modal' data-target='#modal2-default".$res_get_tracker['tracker_id']."'><span style='font-size:14px; color:white;'>Delete</span></a>
                        </label>
    
    <form method='post'>
    <div class='modal fade text-left' id='modal-default".$res_get_tracker['tracker_id']."'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header' style='background-color: #0C7FCF; color:white;'>
              <h5 class='modal-title'>Edit Entry</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                
                
                <div class='form-group'>
                  <div class='row'>
                    <div class='col col-md-5'>
                      <label>From:</label>
                      <input type='date' name='from_date' class='form-control' placeholder='From date' style='font-size:14px;' value='".$res_get_tracker['start_date']."' required>
                    </div>

                    <div class='col col-md-5'>
                      <label>To:</label>
                      <input type='date' name='to_date' class='form-control' placeholder='To date' style='font-size:14px;' value='".$res_get_tracker['end_date']."' required>
                    </div>
                     
                  </div>
                </div>
                
                <div class='form-group'>
                  <div class='row'>
                    <div class='col col-md-12 mt-2'>
                      <label>Topics to cover:</label>
                        <textarea type='text' name='topics' class='form-control' placeholder='Topics to be covered in this time' rows='7' required style='resize:none; font-size:14px;'> ".$res_get_tracker['topics']."</textarea>
                    </div>
                  </div>
                </div>
                 
            </div>
            <div class='modal-footer justify-content-between'>
            <input type='hidden' value='".$res_get_tracker['tracker_id']."' name='tracker_id'>
              <button type='button' class='btn btn-danger' data-dismiss='modal'><span style='font-size:14px;'>Close</span></button>
              <button type='submit' name='update_entry' class='btn btn-primary'><span style='font-size:14px;'>Update Entry</span></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
      
      <form method='post'>
    <div class='modal fade text-left' id='modal2-default".$res_get_tracker['tracker_id']."' style='margin-top: 20vh;'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header' style='background-color: #DC3545; color:white;'>
              <h5 class='modal-title'>Are you sure you want to delete?</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                
                
            </div>
            <div class='modal-footer justify-content-between'>
            <input type='hidden' value='".$res_get_tracker['tracker_id']."' name='tracker_id'>
              <button type='button' class='btn btn-danger' data-dismiss='modal'><span style='font-size:14px;'>No</span></button>
              <button type='submit' name='delete_entry' class='btn btn-danger'><span style='font-size:14px;'>Delete Entry</span></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
    
                        
                        
                        </td>
                    </tr>
                "; 
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
            <font color='red' style='font-size:14px; font-weight:500;'>No Teaching Plan for the Subject selected </font>
            </div>
            ";
        }
    }
    ?>
    
    
    </div>
    
    <div class="footer-basic text-center" style="background-color: #0C7FCF;" id="footer">
        <div>
            <p class="copyright mt-4" style="color:white; font-size:14px;">© 2020 - Secondary School Syllabus Guider</p>
        </div>
    </div>
    
    </div>
    
    
    
    <form method="post" style="font-size:14px;">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #0C7FCF; color:white;">
              <h5 class="modal-title">Add New Entry to Teaching Plan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                
                
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5">
                      <label>From:</label>
                      <input type="date" name="from_date" class="form-control" placeholder="From date" style="font-size:14px;" required>
                    </div>
                    
                    <div class="col col-md-5">
                      <label>To:</label>
                      <input type="date" name="to_date" class="form-control" placeholder="To date" style="font-size:14px;" required>
                    </div>
                     
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-12 mt-2">
                      <label>Topics to cover:</label>
                        <textarea type="text" name="topics" class="form-control" placeholder="Topics to be covered in this time" rows="7" required style="resize:none;" ></textarea>
                    </div>
                  </div>
                </div>
                 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><span style="font-size:14px;">Close</span></button>

              <button type="submit" name="add_entry" class="btn btn-primary"><span style="font-size:14px;">Add Entry</span></button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
    
    
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