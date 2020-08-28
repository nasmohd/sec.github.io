<?php
    include '../db.php';
    session_start();
    $current_user = $_SESSION['current_userID'];



    if (isset($_POST['delete_entry'])){
        $selected_id = $_POST['entry_id'];
        $del_entry = "DELETE FROM timetable_info WHERE timetable_id = '$selected_id'";
        $run_del = $conn -> query ($del_entry);
        header ('Location: Timetable_Templates.php');
    }


    if (isset($_POST['update_entry'])){
        $selected_id = $_POST['entry_id'];
        $color = $_POST['color'];
        $subject = $_POST['subject'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $start_hours = $_POST['start_hours'];
        $start_minutes = $_POST['start_minutes'];
        $end_hours = $_POST['end_hours'];
        $end_minutes = $_POST['end_minutes'];
        $date_added = date("d/m/Y");
        
        $update_track = "UPDATE timetable_info SET information = '$subject', color = '$color', start_date = '$from_date', end_date = '$to_date', start_hours = '$start_hours', start_minutes = '$start_minutes', end_hours = '$end_hours', end_minutes = '$end_minutes' WHERE timetable_id = '$selected_id'";
//
        $run_to_update = $conn -> query ($update_track);
        header ('Location: Timetable_Templates.php');
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
        <?php include '../phpIncludes/header.php' ?>
    <!-- Page Content goes Below here -->
    
      
    <div class='container mt-3'>
        <div class='row'>
            <div class='col'>
               <hr>
               <div class="col-lg-3 mb-2">
<!--
               <label title="Add New Entry">               
               <button type="button" class="btn btn-info"><span style="font-size:14px;" data-toggle="modal" data-target="#modal-default"> Add Entry </span></button>
               </label>
-->
               
                </div>
               
                <div class='col-lg-12 col-12 ml-auto mr-auto'>
                    <div class='table-responsive' style='border: 1px solid #0C7FCF;'>
                        <table class='table table-striped table-hover' style='font-size: 14px;'>
                            <thead>
                                <tr style='background-color: #0C7FCF; color:white;'>
                                    <th style='width: 5%'>SN</th>
                                    <th style='width: 15%'>FROM (DATE)</th>
                                    <th style='width: 10%'>TO (DATE)</th>
                                    <th style='width: 20%'>INFORMATION </th>
                                    <th style='width: 5%'>Color </th>
                                    <th style='width: 15%'>Starting Time </th>
                                    <th style='width: 15%'>Ending Time</th>
                                    <th style='width: 30%' class="text-center">ACTION</th>
<!--
                                    <th class='text-center' style='width: 14%'>STATUS </th>
                                    <th style='width: 15%' class='text-center'>ACTION </th>
-->
                                </tr>
                            </thead><tbody>

      <?php      //Results have been found
               
    if (isset($_POST['edit_btn'])){
//        $res_get_tracker['tracker_id']
        $edit_date = $_POST['edit_date'];
        
        
//        echo $subject;
        $getName = mysqli_query ($conn, "SELECT * FROM timetable_info WHERE start_date ='$edit_date' AND student_id = '$current_user'");
        $getDBSUB =  mysqli_fetch_assoc($getName);
        
        $getMax = mysqli_query ($conn, "SELECT MAX(timetable_id) AS MAX_ttable FROM timetable_info");
        $run_getMax = mysqli_fetch_assoc ($getMax);
        $cnt_Res = mysqli_num_rows($getName);

        $lp = 1;
        $cnt = 1;
        while ($lp <= $run_getMax['MAX_ttable']){
            $getExacts = mysqli_query($conn, "SELECT * FROM timetable_info WHERE timetable_id = '$lp' AND start_date='$edit_date'");
            $run_getExacts = mysqli_fetch_assoc($getExacts);
            $COUNT_getExacts = mysqli_num_rows($getExacts);
            
            if ($COUNT_getExacts != 0){
                echo "
            <tr>
            <td>".$cnt."</td>
            <td>".$run_getExacts['start_date']."</td>
            <td>".$run_getExacts['end_date']."</td>
            <td>".$run_getExacts['information']."</td>
            <td>".$run_getExacts['color']."</td>
            <td>".$run_getExacts['start_hours']." ".$run_getExacts['start_minutes']."</td>
            <td>".$run_getExacts['end_hours']." ".$run_getExacts['end_minutes']."</td>
            <td class='text-center'>
            <a class='btn btn-info' href='#' data-toggle='modal' data-target='#modal-default".$run_getExacts['timetable_id']."'><span style='font-size:13px;'>EDIT</span></a>
            <a class='btn btn-danger' href='#' data-toggle='modal' data-target='#modal2-default".$run_getExacts['timetable_id']."'><span style='font-size:13px;'>DELETE</span></a>
            
            <form method='post' style='font-size:14px;'>
    <div class='modal fade' id='modal-default".$run_getExacts['timetable_id']."'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header' style='background-color: #28A745; color:white;'>
              <h5 class='modal-title'>Add New Event</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                <div class='form-group'>
                  <div class='row'>
                    <div class='col col-md-5 mt-2'>
                      <label class='float-left'>Choose Color: ".$run_getExacts['color']."</label>
                        <select class='form-control' name='color' id='color_select2' onclick='add_color('#007BFF')'>
                            <option selected disabled style='background-color:white;'> Select One</option>
                          <option class='bg-primary text-light' id='option_menu'>#007BFF</option>
                          <option class='bg-warning text-light' onclick='add_color('#FFC107')' id='option_menu'>#FFC107</option>
                          <option class='bg-success text-light' onclick='add_color('#28A745')' id='option_menu'>#28A745</option>
                          <option class='bg-danger text-light' onclick='add_color('#DC3545')' id='option_menu'>#DC3545</option>
                          <option class='bg-dark text-light' onclick='add_color('#6C757D')' id='option_menu'>#6C757D</option>
                          <option class='bg-info text-light' onclick='add_color('#17A2B8')' id='option_menu'>#17A2B8</option>
                           
                        </select>
                    </div>
      
                    <div class='col col-md-7 mt-2'>
                      <label class='float-left'>Event:</label>
                       <input type='text' class='form-control' style='font-size:14px;' placeholder='Event name' name='subject' value='".$run_getExacts['information']."'>
<!--
                        <select class='form-control' name='subject'>
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
                
                <div class='form-group'>
                  <div class='row'>
                    <div class='col col-md-5 mt-2'>
                      <label class='float-left'>From:</label>
                      <input type='date' name='from_date' class='form-control' placeholder='From date' style='font-size:14px;' required value='".$run_getExacts['start_date']."'>
                    </div>
                    
                    <div class='col col-md-5 mt-2'>
                      <label class='float-left'>To:</label>
                      <input type='date' name='to_date' class='form-control' placeholder='To date' style='font-size:14px;' required value='".$run_getExacts['end_date']."'>
                    </div>
                     
                  </div>
                </div>
                 
                <div class='form-group'>
                  <div class='row'>
                    <div class='col col-md-5 mt-2'>
                      <label class='float-left'>STARTING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type='text' name='start_hours' class='form-control' placeholder='Hour (00 to 23)' style='font-size:14px;' value='".$run_getExacts['start_hours']."'>
                    </div>
                    
                    <div class='col col-md-5 mt-2 pt-2'>
                     <br/>
<!--                      <label class='float-left'>Minutes:</label>-->
                      <input type='text' name='start_minutes' class='form-control' placeholder='Minutes (00 to 60)' style='font-size:14px;' value='".$run_getExacts['start_minutes']."'>
                    </div>
                     
                  </div>
                </div>
                 
                 <div class='form-group'>
                  <div class='row'>
                    <div class='col col-md-5 mt-2'>
                      <label class='float-left'>ENDING TIME:</label>
<!--                      <label>Hours:</label>-->
                      <input type='text' name='end_hours' class='form-control' placeholder='Hour (00 to 23)' style='font-size:14px;' value='".$run_getExacts['end_hours']."'>
                    </div>
                    
                    <div class='col col-md-5 mt-2 pt-2'>
                     <br/>
<!--                      <label>Minutes:</label>-->
                      <input type='text' name='end_minutes' class='form-control' placeholder='Minutes (00 to 60)' style='font-size:14px;' value='".$run_getExacts['end_minutes']."' >
                    </div>
                     
                  </div>
                </div>
                
<!--
                <div class='form-group'>
                  <div class='row'>
                    <div class='col col-md-12 mt-2'>
                      <label>Topics to cover:</label>
                        <textarea type='text' name='topics' class='form-control' placeholder='Topics to be covered in this time' rows='4' required style='resize:none;' ></textarea>
                    </div>
                  </div>
                </div>
-->
                 
            </div>
            <div class='modal-footer justify-content-between'>
                <input type='hidden' name='entry_id' value='".$run_getExacts['timetable_id']."'>
              <button type='button' class='btn btn-success' data-dismiss='modal'><span style='font-size:14px;'>Close</span></button>

              <button type='submit' name='update_entry' class='btn btn-success'><span style='font-size:14px;'>UPDATE</span></button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </form>
    
    <form method='post' style='font-size:14px;'>
    <div class='modal fade' id='modal2-default".$run_getExacts['timetable_id']."' style='margin-top:30vh;'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header' style='background-color: #DC3545; color:white;'>
              <h5 class='modal-title'>Proceed to Delete?</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>
                
                
                
            </div>
            <div class='modal-footer justify-content-between'>
            <input type='hidden' name='entry_id' value='".$run_getExacts['timetable_id']."'>
              <button type='button' class='btn btn-danger' data-dismiss='modal'><span style='font-size:14px;'>Close</span></button>

              <button type='submit' name='delete_entry' class='btn btn-danger'><span style='font-size:14px;'>Delete</span></button>
              
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
            $cnt = $cnt + 1;
            }
            
            $lp = $lp + 1;
        }
        
            
        

    }
    ?>
                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
        <?php  
        
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