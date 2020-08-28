<?php
    include '../db.php';
    session_start();
    $current_user = $_SESSION['current_userID'];


    include 'count_books.php';
    
    $requestUrl = $_SERVER ['REQUEST_URI'];
    $urlComponents = explode ('/', $requestUrl);

    // http://localhost/Sec/index.php?1
    $dot = explode ('.php?id=', $urlComponents[3]); //$dot = 2 after form selection, $dot = Array ( [0] => index [1] => php?1 ) 
    $selected_id = $dot[1];

    $dbCheck = mysqli_query ($conn, "SELECT * FROM time_tracker WHERE tracker_id ='$selected_id'");
    $dbRes = mysqli_fetch_assoc($dbCheck);

    $_SESSION ['subj_selected'] = $dbRes ['subject_id'];
    $_SESSION ['form_selected'] = $dbRes ['form'];

//    echo $_SESSION ['subj_selected'];
        
    $dot2 = explode ('.php?sub', $urlComponents[3]);
    $dot_len = count($dot);
//    print_r ($dot2);
    $dot_len2 = count($dot2); //$dot2 = 1 for form, 2 for subj
    

    if (isset($_POST['add_entry'])){
//        $res_get_tracker['tracker_id']
        $start_date = $_POST['from_date'];
        $end_date = $_POST['to_date'];
        $topics = $_POST['topics'];
        $date_added = date("d/m/Y");
        $form = $_SESSION ['form_selected'];
        $subject = $_SESSION ['subj_selected']; //give number of sub
        include '../phpIncludes/sub.php';
        
//        echo $subject;
        $getName = mysqli_query ($conn, "SELECT * FROM time_tracker WHERE subject_id ='$subject'");
        $getDBSUB =  mysqli_fetch_assoc($getName);
        $cnt_Res = mysqli_num_rows($getName);

        $insert_track = "INSERT INTO time_tracker (subject_name, subject_id, form, start_date, end_date, topics, status, teacher_id, date_added) VALUES ('$subject_name', '$subject','$form', '$start_date', '$end_date', '$topics', '0', '$current_user', '$date_added')";
//
            $run_to_insert = $conn -> query ($insert_track);
            
        
        
        
//        include 'subj_codes.php';
//        $selected_sub_ID = $_SESSION ['subj_selected'];
        
        //$_SESSION ['form_selected']
        //$_SESSION ['subj_selected']
        
            
        

    }


    if (isset($_POST['delete_entry'])){
        $selected_id = $_POST['tracker_id'];
        $del_entry = "DELETE FROM time_tracker WHERE tracker_id = '$selected_id'";
        $run_del = $conn -> query ($del_entry);
    }

    if (isset($_POST['change_status'])){
        $selected_id = $_POST['tracker_id'];
        $change_entry = "SELECT * FROM time_tracker WHERE tracker_id = '$selected_id'";
        $run_change = $conn -> query ($change_entry);
        $res_change = mysqli_fetch_assoc($run_change);
        
        if ($res_change['status'] == 0){
            $upd = mysqli_query ($conn, "UPDATE time_tracker SET status ='1' WHERE tracker_id = '$selected_id'");
//            header("location: View_tracker.php?id=".$selected_id."");
        }
        
        if ($res_change['status'] == 1){
            $upd = mysqli_query ($conn, "UPDATE time_tracker SET status ='0' WHERE tracker_id = '$selected_id'");
//            header("location: View_tracker.php?id=id=".$selected_id."");
        }
        
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
    
    <?php
    
       
       
    if ((isset($_SESSION['form_selected'])) && (isset($_SESSION['subj_selected']))){ //Form & Subject have been selected
        //$_SESSION ['form_selected']
        //$_SESSION ['subj_selected']

        $selected_sub = $_SESSION ['subj_selected'];
        $selected_form = $_SESSION ['form_selected'];
        
//        echo $selected_sub." ".$selected_form;
        
        $get_time_tracker = "SELECT * FROM time_tracker WHERE subject_id = '$selected_sub' AND form = '$selected_form'";
        $run_time_tracker = $conn -> query ($get_time_tracker);
        $res_time_tracker = $run_time_tracker -> fetch_assoc();
        $numberRes_time_tracker = mysqli_num_rows($run_time_tracker);
        
        $get_max_no ="SELECT MAX(tracker_id) AS max_tracker_id FROM time_tracker WHERE form = '$selected_form'";
        $run_max = $conn -> query ($get_max_no);
        $res_max = $run_max -> fetch_assoc();
        $total_time_tracker = $res_max['max_tracker_id'];
        //echo $numberRes_rec_Books; //result 1
        
        
        
   
        if ($numberRes_time_tracker != 0){
    ?>        
    <div class='container mt-3'>
        <div class='row'>
            <div class='col'>
               <hr>
               <div class="col-lg-3 mb-2">
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
                        <a type='button' data-toggle='modal' data-target='#modal3-default".$res_get_tracker['tracker_id']."' class='btn btn-dark' style='font-size: 13px;' name='' >
                        <i class='fas fa-pencil-alt' style='color:white;'></i></a>
                        </label>
                        
                </td>
                ";
            }
            
            if ($res_get_tracker['status'] == 1){
                echo "
                <td class='text-center'>
                        <i class='fas fa-2x fa-check-circle' style='color: #57B257;'></i>
                        
                        <label title='Change Status'>
                        <a type='button' data-toggle='modal' data-target='#modal3-default".$res_get_tracker['tracker_id']."' class='btn btn-dark' style='font-size: 13px;' name='' >
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
      
    <form method='post'>
    <div class='modal fade text-left' id='modal3-default".$res_get_tracker['tracker_id']."' style='margin-top: 20vh;'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header' style='background-color: #343A40; color:white;'>
              <h5 class='modal-title'>Change Status?</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                
                
            </div>
            <div class='modal-footer justify-content-between'>
            <input type='hidden' value='".$res_get_tracker['tracker_id']."' name='tracker_id'>
              <button type='button' class='btn btn-dark' data-dismiss='modal'><span style='font-size:14px;'>No</span></button>
              <button type='submit' name='change_status' class='btn btn-dark'><span style='font-size:14px;'>Change Status</span></button>
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