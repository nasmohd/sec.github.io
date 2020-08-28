<?php
    include '../db.php';
    session_start();
    $current_user = $_SESSION['current_userID'];

    if (isset($_POST['add_new_Calendar'])){
        $color = $_POST['color'];
        $subject = $_POST['subject'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $start_hours = $_POST['start_hours'];
        $start_minutes = $_POST['start_minutes'];
        
        $end_hours = $_POST['end_hours'];
        $end_minutes = $_POST['end_minutes'];
        
        $insert_timetable = "INSERT INTO timetable_info (student_id, information, color, start_date, end_date, start_hours, start_minutes, end_hours, end_minutes) VALUES ('$current_user', '$subject', '$color', '$from_date', '$to_date', '$start_hours', '$start_minutes', '$end_hours', '$end_minutes')";
        
        $run_to_insert = $conn -> query ($insert_timetable);
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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <link rel="stylesheet" href="../plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="../plugins/fullcalendar-bootstrap/main.min.css">
    <link rel="stylesheet" href="../dist/css/main.css">
    
</head>

<body>
   <div id = "page-container">
   
   <div id="content-wrap">
    <?php include '../phpIncludes/header.php' ?>
    
    <!-- Page Content goes Below here -->
    <section class="content-header">
      <div class="container">
        <div class="row my-3">
          <div class="col-sm-6">
<!--            <h4 style="color: #0C7FCF;">MY STUDY TIMETABLE</h4>-->
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header" style="background-color: #007BFF; color:white;">
                  <h5 class="card-title">Subjects</h5>
                </div>
                <div class="card-body" style="border: 1px solid #0C7FCF; font-size:14px; color:white;">
                  <!-- the events -->
                  <div id="external-events">
<!--
                    <div class="external-event bg-success">Mathematics</div>
                    <div class="external-event bg-warning">English</div>
                    <div class="external-event bg-info">Kiswahili</div>
                    <div class="external-event bg-primary">Geography</div>
                    <div class="external-event bg-danger">History</div>
                    <div class="external-event bg-danger">Civics</div>
                    <div class="external-event bg-danger">Chemistry</div>
                    <div class="external-event bg-danger">Physics</div>
                    <div class="external-event bg-danger">Biology</div>
                    <div class="external-event bg-danger">Book Keeping</div>
                    <div class="external-event bg-danger">Commerce</div>
-->
                    <div class="checkbox" style='display:none;'>
                      <label for="drop-remove" style="color:black; font-weight:bold; font-size:13px;">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                      
                    </div>
                    <div class="text-bold">
                        <label style="color:black; font-weight:bold;">Add a subject to the calendar</label>
                    </div>
                    <button type="button" class="btn btn-primary"><span style="font-size:14px;" data-toggle="modal" data-target="#modal-default"> Add Subject </span></button>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              
            </div>
             
             <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header" style="background-color: #17A2B8; color:white;">
                  <h6 class="card-title">EDIT ENTRIES</h6>
                </div>
                
                <form method="post" action="edit_ttable.php">
                <div class="card-body" style="border: 1px solid #17A2B8; font-size:14px; color:white;">
                  <!-- the events -->
                  <div id="external-events">
<!--
                    <div class="external-event bg-success">Mathematics</div>
                    <div class="external-event bg-warning">English</div>
                    <div class="external-event bg-info">Kiswahili</div>
                    <div class="external-event bg-primary">Geography</div>
                    <div class="external-event bg-danger">History</div>
                    <div class="external-event bg-danger">Civics</div>
                    <div class="external-event bg-danger">Chemistry</div>
                    <div class="external-event bg-danger">Physics</div>
                    <div class="external-event bg-danger">Biology</div>
                    <div class="external-event bg-danger">Book Keeping</div>
                    <div class="external-event bg-danger">Commerce</div>
-->
                   
                    <div class="checkbox">
                      <label for="drop-remove" style="color:black; font-weight:bold; font-size:13px;">
                       Select a date to edit
                        <input class="form-control col-md-12" type="date" name="edit_date" style="font-size:12px; margin-left:-15px;" id="edit_date" required>
                        
                      </label>
                      
                    </div>
                     
                    <div class="checkbox" style='display:none;'>
                      <label for="drop-remove" style="color:black; font-weight:bold; font-size:13px;">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                    
                    
                    
                    <?php
//                    if (isset($_POST['edit_btn'])){
//                        
//                        echo "
//                        <select class='form-control' name='color' id='color_select' onclick='add_color('#007BFF')'>
//                    <option selected disabled> Select One</option>
//                        ";
//                        $edit_date = $_POST['edit_date'];
                        
                        //Get entries with the inserted date
//                        $get_dateENTRIES = mysqli_query($conn, "SELECT * FROM timetable_info WHERE start_date = '$edit_date'");
//                        $get_MAXdateENTRIES = mysqli_query($conn, "SELECT MAX(timetable_id) AS max_timetableID FROM timetable_info WHERE start_date = '$edit_date'");
//                        $get_resMAXdateENTRIES = mysqli_fetch_assoc($get_MAXdateENTRIES);
//
//
//                        $get_res_dateENTRIES = mysqli_fetch_assoc($get_dateENTRIES);
//                        $count_dateENTRIES = mysqli_num_rows($get_dateENTRIES);

//                    $lp2 = 1;
//                    while ($lp2 <= $get_resMAXdateENTRIES){
//                        $getUnique = mysqli_query ($conn, "SELECT * FROM timetable_info WHERE start_date='$edit_date' AND timetable_id='$lp2'");
//                        $run_getUnique = mysqli_fetch_assoc($getUnique);
//                        $count_Unique = mysqli_num_rows ($getUnique);
//
//                        if ($count_Unique != 0){
//                            echo "
//                            
//                            <option style='color:black;'>".$run_getUnique['information']."</option>
//                            ";
//                        }
//                        $lp2 = $lp2 + 1;
//                    }  
//                        
//                    }
    
                    ?>
<!--                    </select>-->
                      
                    
                    <button type="submit" name="edit_btn" class="btn btn-info"><span style="font-size:14px;"> EDIT </span></button>
                  </div>
                  
                  
                  
                </div>
                </form>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              
            </div>
          </div>
          

          <form method="post" style="font-size:14px;">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #0C7FCF; color:white;">
              <h5 class="modal-title">Add New Subject and Entry</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>Choose Color:</label>
                        <select class="form-control" name="color" id="color_select" onclick="add_color('#007BFF')">
                            <option selected disabled style="background-color:white;"> Select One</option>
                          <option class='bg-primary text-light' id="option_menu">#007BFF</option>
                          <option class="bg-warning text-light" onclick="add_color('#FFC107')" id="option_menu">#FFC107</option>
                          <option class="bg-success text-light" onclick="add_color('#28A745')" id="option_menu">#28A745</option>
                          <option class="bg-danger text-light" onclick="add_color('#DC3545')" id="option_menu">#DC3545</option>
                          <option class="bg-dark text-light" onclick="add_color('#6C757D')" id="option_menu">#6C757D</option>
                          <option class="bg-info text-light" onclick="add_color('#17A2B8')" id="option_menu">#17A2B8</option>
                           
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
                    <div class="col col-md-5 mt-2">
                      <label>STARTING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="start_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="start_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                 
                 <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>ENDING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="end_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="end_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                
<!--
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-12 mt-2">
                      <label>Topics to cover:</label>
                        <textarea type="text" name="topics" class="form-control" placeholder="Topics to be covered in this time" rows="4" required style="resize:none;" ></textarea>
                    </div>
                  </div>
                </div>
-->
                 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary" data-dismiss="modal"><span style="font-size:14px;">Close</span></button>

              <button type="submit" name="" class="btn btn-primary"><span style="font-size:14px;">Edit this entry</span></button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
    
<script>
    function check_value(){
    var edit_date = document.getElementById("edit_date");
    var date_value = edit_date.value;

    var btn_target = document.getElementById("modal_edit");
    btn_target.dataset.target = "#modal3-default" + date_value;
    var pass_modal = "modal3-default" + date_value;

    var modal_target = document.getElementsByClassName("trgt");
    var start_date = document.getElementById("start_date");
    start_date.value = date_value;
    console.log(start_date.value);
        
//    console.log(modal_target);
    modal_target[0].id = pass_modal;
    window.location.href = "#"+date_value;
    console.log(modal_target[0].id);
    console.log(btn_target.dataset.target);
    window.localStorage.setItem ('date_selected', date_value);
    var cookie1 = date_value;
    document.cookie = "cookie1=" + cookie1;
    setcookie ('cookie1', $uname, time() + 60*30);
    $_COOKIE['uname'] = $uname;
    
    
//    console.log (document.cookie);
        
    var date_selected = window.localStorage.getItem('date_selected');
    console.log(date_selected);
//    console.log(date_value);

    }
</script>
    
    
    <form method="post" style="font-size:14px;">
    <div class="modal fade trgt"> <!-- modal3 -->
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #17A2B8; color:white;">
              <h5 class="modal-title">Edit Entry</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
              </button>
            </div>
            
            
<!--
            <script>
                var date_selected = window.localStorage.getItem('date_selected');
                var modal_id = document.getElementsByClassName("trgt");
                var id_name = modal_id[0].id;
                console.log(date_selected);


            </script>
-->
            
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>Choose An Entry to Edit:</label>
                        <select class="form-control" name="color" id="color_select" onclick="add_color('#007BFF')">
                            <option selected disabled style=""> Select One</option>
                    
                          
                          <?php
                            $requestUrl = $_SERVER ['REQUEST_URI'];
                            $urlComponents = explode ('/', $requestUrl);

                            // http://localhost/Sec/index.php?1
//                            $dot = explode ('.php#', $urlComponents[3]);
                            
                            $cookie1 = $_COOKIE ['cookie1'];
                            $edit_date = $cookie1;
//                            echo $cookie1;
//                            $v = "abcd";
//                            echo "
//                                    <option style='color:black;'>".$cookie1."</option>
//                                    ";
                            $get_dateENTRIES = mysqli_query($conn, "SELECT * FROM timetable_info WHERE start_date = '$edit_date'");
                            $get_MAXdateENTRIES = mysqli_query($conn, "SELECT MAX(timetable_id) AS max_timetableID FROM timetable_info WHERE start_date = '$edit_date'");
                            $get_resMAXdateENTRIES = mysqli_fetch_assoc($get_MAXdateENTRIES);
       
                            
                            $get_res_dateENTRIES = mysqli_fetch_assoc($get_dateENTRIES);
                            $count_dateENTRIES = mysqli_num_rows($get_dateENTRIES);
                            echo "
                                    <option style='color:black;'1>".$get_resMAXdateENTRIES['max_timetableID']."</option>
                                    ";
                            
//                            $lp2 = 1;
//                            while ($lp2 <= $get_resMAXdateENTRIES){
//                                $getUnique = mysqli_query ($conn, "SELECT * FROM timetable_info WHERE start_date='$edit_date' AND timetable_id='$lp2'");
//                                $run_getUnique = mysqli_fetch_assoc($getUnique);
//                                $count_Unique = mysqli_num_rows ($getUnique);
//                                
//                                if ($count_Unique != 0){
//                                    echo "
//                                    <option style='color:black;'>".$run_getUnique['information']."</option>
//                                    ";
//                                }
//                                $lp2 = $lp2 + 1;
//                            }  
                        
    
    
                        ?>
                           
                        </select>
                    </div>
   
                    <div class="col col-md-5 mt-2">
                      <label>Change to:</label>
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
                        </select>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>From:</label>
                      <input type="date" name="from_date" class="form-control" placeholder="From date" style="font-size:14px;" id="start_date" required>
                    </div>
                    
                    <div class="col col-md-5 mt-2">
                      <label>To:</label>
                      <input type="date" name="to_date" class="form-control" placeholder="To date" style="font-size:14px;" required>
                    </div>
                     
                  </div>
                </div>
                 
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>STARTING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="start_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="start_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                 
                 <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>ENDING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="end_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="end_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                
<!--
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-12 mt-2">
                      <label>Topics to cover:</label>
                        <textarea type="text" name="topics" class="form-control" placeholder="Topics to be covered in this time" rows="4" required style="resize:none;" ></textarea>
                    </div>
                  </div>
                </div>
-->
                 
            </div>
            <div class="modal-footer justify-content-between">
             <input type='hidden' value='' name='tracker_id'>
              <button type="button" class="btn btn-info" data-dismiss="modal"><span style="font-size:14px;">Close</span></button>

              <button type="button" name="" class="btn btn-info" data-toggle="modal" data-target="#modal4-default"><span style="font-size:14px;">Edit this Entry</span></button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
    
    

    
    
    <form method="post" style="font-size:14px;">
    <div class="modal fade" id="modal4-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #17A2B8; color:white;">
              <h5 class="modal-title">Edit Entry</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>Choose An Entry to Edit:</label>
                        <select class="form-control" name="color" id="color_select" onclick="add_color('#007BFF')">
                            <option selected disabled style="background-color:white;"> Select One</option>
                          <option class='bg-primary text-light' id="option_menu">#007BFF</option>
                          <option class="bg-warning text-light" onclick="add_color('#FFC107')" id="option_menu">#FFC107</option>
                          <option class="bg-success text-light" onclick="add_color('#28A745')" id="option_menu">#28A745</option>
                          <option class="bg-danger text-light" onclick="add_color('#DC3545')" id="option_menu">#DC3545</option>
                          <option class="bg-dark text-light" onclick="add_color('#6C757D')" id="option_menu">#6C757D</option>
                          <option class="bg-info text-light" onclick="add_color('#17A2B8')" id="option_menu">#17A2B8</option>
                           
                        </select>
                    </div>
   
                    <div class="col col-md-5 mt-2">
                      <label>Change to:</label>
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
                    <div class="col col-md-5 mt-2">
                      <label>STARTING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="start_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="start_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                 
                 <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>ENDING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="end_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="end_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                
<!--
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-12 mt-2">
                      <label>Topics to cover:</label>
                        <textarea type="text" name="topics" class="form-control" placeholder="Topics to be covered in this time" rows="4" required style="resize:none;" ></textarea>
                    </div>
                  </div>
                </div>
-->
                 
            </div>
            <div class="modal-footer justify-content-between">
             <input type='hidden' value='' name='tracker_id'>
              <button type="button" class="btn btn-info" data-dismiss="modal"><span style="font-size:14px;">Close</span></button>

              <button type="submit" name="add_new_Calendar" class="btn btn-info"><span style="font-size:14px;">Save Changes</span></button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
    
    
    
<!--    Events -->
    <form method="post" style="font-size:14px;">
    <div class="modal fade" id="modal2-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #343A40; color:white;">
              <h5 class="modal-title">Add New Event</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>Choose Color:</label>
                        <select class="form-control" name="color" id="color_select2" onclick="add_color('#007BFF')">
                            <option selected disabled style="background-color:white;"> Select One</option>
                          <option class='bg-primary text-light' id="option_menu">#007BFF</option>
                          <option class="bg-warning text-light" onclick="add_color('#FFC107')" id="option_menu">#FFC107</option>
                          <option class="bg-success text-light" onclick="add_color('#28A745')" id="option_menu">#28A745</option>
                          <option class="bg-danger text-light" onclick="add_color('#DC3545')" id="option_menu">#DC3545</option>
                          <option class="bg-dark text-light" onclick="add_color('#6C757D')" id="option_menu">#6C757D</option>
                          <option class="bg-info text-light" onclick="add_color('#17A2B8')" id="option_menu">#17A2B8</option>
                           
                        </select>
                    </div>
      
                    <div class="col col-md-7 mt-2">
                      <label>Event:</label>
                       <input type="text" class="form-control" style="font-size:14px;" placeholder="Event name" name="subject">
<!--
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
                        </select>
-->
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
                    <div class="col col-md-5 mt-2">
                      <label>STARTING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="start_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="start_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                 
                 <div class="form-group">
                  <div class="row">
                    <div class="col col-md-5 mt-2">
                      <label>ENDING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type="text" name="end_hours" class="form-control" placeholder="Hour (00 to 23)" style="font-size:14px;">
                    </div>
                    
                    <div class="col col-md-5 mt-2 pt-2">
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type="text" name="end_minutes" class="form-control" placeholder="Minutes (00 to 60)" style="font-size:14px;">
                    </div>
                     
                  </div>
                </div>
                
<!--
                <div class="form-group">
                  <div class="row">
                    <div class="col col-md-12 mt-2">
                      <label>Topics to cover:</label>
                        <textarea type="text" name="topics" class="form-control" placeholder="Topics to be covered in this time" rows="4" required style="resize:none;" ></textarea>
                    </div>
                  </div>
                </div>
-->
                 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-dark" data-dismiss="modal"><span style="font-size:14px;">Close</span></button>

              <button type="submit" name="add_new_Calendar" class="btn btn-dark"><span style="font-size:14px;">Add</span></button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
          
          
        <script type="text/javascript">
          function add_color(x){
              var color_select = document.getElementById("color_select");
              var color_select2 = document.getElementById("color_select2");
              
              var selected_color = color_select.value;
              var selected_color2 = color_select2.value;
//                          color.backgroundColor = x;
              console.log(selected_color);
              color_select.style.backgroundColor = selected_color;
              color_select2.style.backgroundColor = selected_color2;
              
              color_select.style.color = "#000000";
              color_select2.style.color = "#000000";
          }
    </script>
         
         <style>
             #color_select option:active, #color_select option:hover, #color_select option:focus{
/*                 outline:none;*/
                 background-color: #306FA0;
             }   
             
             
        </style>
          
          <div class="col-md-8">
            <div class="card card-primary px-3" style="border: 2px solid #343A40;">
              <div class="card-body p-0" >
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        <div class="col-md-2">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header bg-dark" style="background-color: #0C7FCF; color:white; ">
                  <h5 class="card-title">Events/Tasks</h5>
                </div>
                <div class="card-body" style="border: 1px solid #343A40; font-size:14px; color:white">
                  <!-- the events -->
                  <div id="external-events2" style="display:none;">
                    <div class="external-event2 bg-success">Lunch</div>
                    <div class="external-event2 bg-warning">Go home</div>
                    <div class="external-event2 bg-info">Do homework</div>
<!--
                    <div class="external-event2 bg-primary">UI design</div>
                    <div class="external-event2 bg-danger">Sleep tight</div>
-->
                    <div class="checkbox">
                      <label for="drop-remove" style="color:black; font-weight:bold; font-size:13px;">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                  <div class="text-bold">
                        <label style="color:black; font-weight:bold;">Add an Event to the calendar</label>
                    </div>
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal2-default"><span style="font-size:14px;"> Add Event </span></button>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card mt-lg-2" style="border: 1px solid #343A40; display:none;">
                <div class="card-header bg-dark text-light">
                  <h5 class="card-title">Create Event</h5>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
<!--                   <div class="col-12">-->
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title" style="border: 1px solid #343A40;">
<!--                    </div>-->
                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="mt-2 ml-2 btn btn-dark"><span style="font-size:14px;"> Click to add </span></button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

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
    
<script src="assets/bootstrap/js/bootstrap.min.js"></script>  
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- jQuery Calendar UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script> 
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

    
<!-- Calendar Plugins -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.min.js"></script>
<script src="../plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="../plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="../plugins/fullcalendar-interaction/main.min.js"></script>
<script src="../plugins/fullcalendar-bootstrap/main.min.js"></script>




<?php
    $start = mysqli_query ($conn, "SELECT MAX(timetable_id) AS t_id FROM timetable_info WHERE student_id ='$current_user'");
    $start2 = mysqli_query ($conn, "SELECT * FROM timetable_info WHERE student_id ='$current_user'");
    $res_start = mysqli_fetch_assoc ($start);
    $res_count = mysqli_num_rows ($start2); //returns 5
    $res_max = $res_start['t_id'];
//    echo $res_max;
    
       
    $lp = 1;
    $over = 1;
    $arr_lp = 0;
    while ($over <= $res_max){ //res_max = 12
        $get_Ttable = mysqli_query ($conn, "SELECT * FROM timetable_info WHERE timetable_id='$over' AND student_id='$current_user'");
        $tst = mysqli_num_rows ($get_Ttable);
        
        $res_Ttable = mysqli_fetch_assoc ($get_Ttable);
        
        
        if ($tst != 0){ //Result has been found
//            echo $res_Ttable['timetable_id']."<br/>";
//        echo $res_Ttable['information'];
        $getdays = explode ('-', $res_Ttable['start_date']);
            
        $full_startdate = $getdays[0].', ' .($getdays[1]-1).', '.$getdays[2].', '.$res_Ttable['start_hours'].', '.$res_Ttable['start_minutes'];

        $getdays2 = explode ('-', $res_Ttable['end_date']);
        $full_enddate = $getdays2[0].', ' .($getdays2[1]-1).', '.$getdays2[2].', '.$res_Ttable['end_hours'].', '.$res_Ttable['end_minutes'];
//        echo $full_startdate." ".$full_enddate;
//            while ($arr_lp < $res_count){
        $k = $res_count;
        $arr_info[$arr_lp] =  $res_Ttable['information'];
        $arr_color[$arr_lp] =  $res_Ttable['color'];
//            $arr_start[$arr_lp] =  $full_startdate;
//            $arr_end[$arr_lp] =  $full_enddate;

        $arr_startYear[$arr_lp] = $getdays[0];
        $arr_startMonth[$arr_lp] = ($getdays[1]-1);
        $arr_startDay[$arr_lp] = $getdays[2];

        $arr_endYear[$arr_lp] = $getdays2[0];
        $arr_endMonth[$arr_lp] = ($getdays2[1]-1);
        $arr_endDay[$arr_lp] = $getdays2[2];

        $arr_startHours[$arr_lp] = $res_Ttable['start_hours'];
        $arr_startMinutes[$arr_lp] = $res_Ttable['start_minutes'];
        $arr_color[$arr_lp] = $res_Ttable['color'];
        

        $arr_endHours[$arr_lp] = $res_Ttable['end_hours'];
        $arr_endMinutes[$arr_lp] = $res_Ttable['end_minutes'];

        $arr_lp = $arr_lp + 1;
//        }
//            print_r ($arr_end);
            
            echo "
 
";
            
            $lp = $lp + 1;
        }
    $over = $over + 1;
    }
         
?>

<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))
    ini_events($('#external-events2 div.external2-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var containerEl2 = document.getElementById('external-events2');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------
    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });
      
    new Draggable(containerEl2, {
      itemSelector: '.external-event2',
      eventData: function(eventEl2) {
        console.log(eventEl2);
        return {
          title: eventEl2.innerText,
          backgroundColor: window.getComputedStyle( eventEl2 ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl2 ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl2 ,null).getPropertyValue('color'),
        };
      }
    });
      
    
    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      //Random default events
    
    
      events    : [
        {
          title          : 'Today',
          start          : new Date(y, m, d),
          backgroundColor: '#007BFF', //red
          borderColor    : '#007BFF', //red
          allDay         : true
        }
//        {
//          title          : 'X',
//          start          : new Date(y, m, d),
//          backgroundColor: '#f56954', //red
//          borderColor    : '#f56954', //red
//          allDay         : true
//        },
//        {
//          title          : 'Long Event',
//          start          : new Date(y, m, d - 5),
//          end            : new Date(y, m, d - 2),
//          backgroundColor: '#f39c12', //yellow
//          borderColor    : '#f39c12' //yellow
//        },
//        {
//          title          : 'Meeting',
//          start          : new Date(y, m, d, 10, 30),
//          allDay         : false,
//          backgroundColor: '#0073b7', //Blue
//          borderColor    : '#0073b7' //Blue
//        },
//        {
//          title          : 'Lunch',
//          start          : new Date(y, m, d, 12, 0),
//          end            : new Date(y, m, d, 14, 0),
//          allDay         : false,
//          backgroundColor: '#00c0ef', //Info (aqua)
//          borderColor    : '#00c0ef' //Info (aqua)
//        },
//        {
//          title          : 'Birthday Party',
//          start          : new Date(y, m, d + 1, 19, 0),
//          end            : new Date(y, m, d + 1, 22, 30),
//          allDay         : false,
//          backgroundColor: '#00a65a', //Success (green)
//          borderColor    : '#00a65a' //Success (green)
//        },
//        
//        
//        {
//          title          : 'Click for Google',
//          start          : new Date(y, m, 28),
//          end            : new Date(y, m, 29),
//          url            : 'http://google.com/',
//          backgroundColor: '#3c8dbc', //Primary (light-blue)
//          borderColor    : '#3c8dbc' //Primary (light-blue)
//        }
        
        
      ],
      editable  : false,
      droppable : false, // this allows things to be dropped onto the calendar !!!
      drop      : function(info, d) {
          //After the event has been dropped

          
        // is the 'remove after drop' checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the 'Draggable Events' list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });
    
          
    calendar.render();
    // $('#calendar').fullCalendar()
    var k = "<?php echo $k ?>";
//    var lp = 0;
      
     var arr_info = <?php echo json_encode($arr_info); ?>;
    var arr_startYear = <?php echo json_encode($arr_startYear); ?>;
    var arr_startMonth = <?php echo json_encode($arr_startMonth); ?>;
    var arr_startDay = <?php echo json_encode($arr_startDay); ?>;
    var arr_endYear = <?php echo json_encode($arr_endYear); ?>;
    var arr_endMonth = <?php echo json_encode($arr_endMonth); ?>;
    var arr_endDay = <?php echo json_encode($arr_endDay); ?>;
    var arr_startHours = <?php echo json_encode($arr_startHours); ?>;
    var arr_startMinutes = <?php echo json_encode($arr_startMinutes); ?>;
    var arr_endHours = <?php echo json_encode($arr_endHours); ?>;
    var arr_endMinutes = <?php echo json_encode($arr_endMinutes); ?>;
    
    var arr_color = <?php echo json_encode($arr_color); ?>;
    
    
      
    for (var i=0; i<k; i++){
//        alert (arr_color);
//        var s = arr_start[i];
//        console.log(s);
        calendar.addEvent({
            title          : arr_info[i],
              start          : new Date(arr_startYear[i], arr_startMonth[i], arr_startDay[i], arr_startHours[i], arr_startMinutes[i]),
              end            : new Date(arr_endYear[i], arr_endMonth[i], arr_endDay[i], arr_endHours[i], arr_endMinutes[i]),
            textColor            : "#262626",
              backgroundColor: arr_color[i], //red
              borderColor    : arr_color[i], //red
              allDay         : false 
        });
        
    }
      
    
      
//      $arr_info[$arr_lp]
//$arr_color[$arr_lp]
//$arr_start[$arr_lp]
//$arr_end[$arr_lp]
    
    
      
      

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }
        
//    $('#calendar').fullCalendar({
//        dayClick: function (date, jsEvent, view){
//            console.log('Selected Date: ' + date.d)
//        }
//    });

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events2').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
    </script>

</body>

</html>