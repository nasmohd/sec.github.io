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


    }

    if (isset($_POST['add_new'])){

//        $res_get_tracker['tracker_id']
        $start_date = $_POST['from_date'];
        $end_date = $_POST['to_date'];
        $topics = $_POST['topics'];
        $date_added = date("d/m/Y");
        $form = $_POST['form'];
        $subject = $_POST['subject'];
//        $selected_sub_ID = $_SESSION ['subj_selected'];
        
        //$_SESSION ['form_selected']
        //$_SESSION ['subj_selected']
        include '../phpIncludes/rev_sub.php';
            
        $insert_track = "INSERT INTO time_tracker (subject_name, subject_id, form, start_date, end_date, topics, status, teacher_id, date_added) VALUES ('$subject', '$subject_id','$form', '$start_date', '$end_date', '$topics', '0', '$current_user', '$date_added')";
//
        $run_to_insert = $conn -> query ($insert_track);


    }


    if (isset($_POST['delete_entry'])){
        $selected_id = $_POST['tracker_id'];

        $del_entry = "DELETE FROM time_tracker WHERE tracker_id = '$selected_id'";
        $run_del = $conn -> query ($del_entry);

    }

    if (isset($_POST['delete_all'])){
        $selected_id2 = $_POST['tracker_id'];

        $del_entry2 = "DELETE FROM time_tracker WHERE subject_name = '$selected_id2'";
        $run_del2 = $conn -> query ($del_entry2);

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
            <div class="col-md-3 col-lg-9 col-xl-6 col-12 offset-md-2 offset-xl-0">
             <font color="#0C7FCF" style='font-size:16px; font-weight:500;'>Subject Trackers submitted</font>
                <div style="color: #0C7FCF"><hr></div>
                <div class="col-lg-12 mb-2">
               <label title="Add New Entry">               
               <button type="button" class="btn btn-info"><span style="font-size:14px;" data-toggle="modal" data-target="#modal-default"> Add Entry </span></button>
               </label>
               
                </div>
              <!-- Table should go in here -->
                <div class='table-responsive' style='border: 1px solid #28A745;'>
                    <table class='table table-striped' style='font-size: 14px;'>
                        <thead>
                            <tr style='background-color: #28A745; color:white;'>
                                <th style='width: 5%'>SN</th>
                                <th style='width: 20%'>FORM</th>
                                <th style='width: 20%'>SUBJECT</th>
                                <th style='width: 30%'>LAST UPDATED </th>
                                <th style='width: 20%' class="text-center">ACTION </th>
                            </tr>
                        </thead>
                        <tbody>                    
        <?php
        
       
       $get_max_no ="SELECT MAX(tracker_id) AS max_tracker_id FROM time_tracker WHERE teacher_id = '$current_user'";
        $run_max = $conn -> query ($get_max_no);
        $res_max = $run_max -> fetch_assoc();
        $total_time_tracker = $res_max['max_tracker_id']; //19
       
       $getSubmits = mysqli_query ($conn, "SELECT DISTINCT subject_name FROM time_tracker WHERE teacher_id = '$current_user'"); //get subs this teacher uploaded
       $cnt = 0;
       $prnt = 1;
       $sn = 1;
       while ($cnt <= $total_time_tracker){

           $getRes = mysqli_fetch_assoc($getSubmits);
//           echo $getRes['subject_name']." ".$cnt ;
           
           $sub_name = $getRes['subject_name'];
           $getmaxDate = mysqli_query ($conn, "SELECT MAX(date_added) AS max_date FROM time_tracker WHERE (subject_name = '$sub_name')"); //get max date
           $getRes_maxDate = mysqli_fetch_assoc($getmaxDate);
           $maxDate = $getRes_maxDate['max_date'];
           
//           echo $maxDate;
           
           $getsubs = mysqli_query ($conn, "SELECT * FROM time_tracker WHERE (teacher_id = '$current_user' AND subject_name = '$sub_name' AND date_added = '$maxDate')"); //get max date
           $getRes_maxSubs = mysqli_fetch_assoc($getsubs);
            $totalRes = mysqli_num_rows($getsubs);
//           print_r ($getSubmits);
           
           if ($totalRes != 0){ //results have been found
           echo '
           <tr>
                <td>'.$sn.'</td>
                <td><a href="View_tracker.php?id='.$getRes_maxSubs['tracker_id'].'">'.$getRes_maxSubs['form'].'</a></td>
                <td><a href="View_tracker.php?id='.$getRes_maxSubs['tracker_id'].'">'.$getRes_maxSubs['subject_name'].'</a></td>
                <td>'.$getRes_maxSubs['date_added'].'</td>
                <td class="text-center">
                <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal2-default'.$getRes_maxSubs["tracker_id"].'"><span style="font-size:14px; color:white;">Delete</span></a>
                
    <form method="post">
    <div class="modal fade text-left" id="modal2-default'.$getRes_maxSubs["tracker_id"].'" style="margin-top: 20vh;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #DC3545; color:white;">
              <h5 class="modal-title">Are you sure you want to delete?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p> Delete all <strong>'.$getRes_maxSubs['subject_name'].'</strong> entries?</p>
                
            </div>
            <div class="modal-footer justify-content-between">
            <input type="hidden" value="'.$getRes_maxSubs["subject_name"].'" name="tracker_id">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><span style="font-size:14px;">No</span></button>
              <button type="submit" name="delete_all" class="btn btn-danger"><span style="font-size:14px;">Delete Entry</span></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </form>
                
                
                
                
                </td>
                     
        
        </tr>
           '; 
            $sn = $sn + 1;
           }

           $prnt = $prnt + 1;
           $cnt = $cnt + 1;
       }
        ?>
                                        
                        </tbody>
                    </table>
                </div>
                
            </div>
            
            
            <div class="col-md-3 col-lg-3 col-xl-6 col-12 offset-md-2 offset-xl-0 mt-4 py-2 text-justify font-italic card" style="font-size: 14px;">
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

        </div>
    </div>
    
    <?php
    
       
       
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
    
<?php
    include '../phpIncludes/footer.php';       
       
?>
    
    </div>
    
    
    
    <form method="post" style="font-size:14px;">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #0C7FCF; color:white;">
              <h5 class="modal-title">Add New Subject Entry</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>Form:</label>
                        <select class="form-control" name="form">
                          <option>Form 1</option>
                          <option>Form 2</option>
                          <option>Form 3</option>
                          <option>Form 4</option>
                          <option>Form 5</option>
                          <option>Form 6</option>  
                        </select>
                      
                    </div>
      
                    <div class="col col-md-5 mt-2">
                      <label>Subject:</label>
                        <select class="form-control" name="subject">
                          <option>Mathematics</option>
                          <option>English</option>
                          <option>Kiswahili</option>
                          <option>Geography</option>
                          <option>History</option>
                          <option>Civics</option>
                          <option>Chemistry</option>
                          <option>Physics</option>
                          <option>Biology</option>
                          <option>Book Keeping</option>
                          <option>Commerce</option> 
                          <option>GS</option> 
                        </select>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>From:</label>
                      <input type="date" name="from_date" class="form-control" placeholder="From date" style="font-size:14px;" required>
                    </div>
                    
                    <div class="col col-md-5 mt-2">
                      <label>To:</label>
                      <input type="date" name="to_date" class="form-control" placeholder="To date" style="font-size:14px;" required>
                    </div>
                     
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-12 mt-2">
                      <label>Topics to cover:</label>
                        <textarea type="text" name="topics" class="form-control" placeholder="Topics to be covered in this time" rows="4" required style="resize:none;" ></textarea>
                    </div>
                  </div>
                </div>
                 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><span style="font-size:14px;">Close</span></button>

              <button type="submit" name="add_new" class="btn btn-primary"><span style="font-size:14px;">Add</span></button>
              
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