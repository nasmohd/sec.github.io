<?php
    include '../db.php';
    session_start();
    $current_user = $_SESSION['current_userID'];

    $get_Teacher_relation = mysqli_query ($conn, "SELECT * FROM teacher_to_student WHERE student_id = '$current_user'");
    $count_Teacher_relation = mysqli_num_rows ($get_Teacher_relation);
    $getRes_Teacher_relation = mysqli_fetch_assoc($get_Teacher_relation);
//    echo $getRes_Teacher_relation['id'];

    $teacher = $getRes_Teacher_relation['teacher_id'];

    

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
    
    
    <div class="container mt-3"> <!-- THIS -->
        <div class="row">
            <div class="col-md-3 col-lg-9 col-xl-6 col-12 offset-md-2 offset-xl-0">
             <font color="#0C7FCF" style='font-size:16px; font-weight:500;'>Subject Trackers submitted</font>
                <div style="color: #0C7FCF"><hr></div>
                <div class="col-lg-12 mb-2">
              
               
                </div>
              <!-- Table should go in here -->
                <div class='table-responsive' style='border: 1px solid #28A745;'>
                    <table class='table table-striped table-hover' style='font-size: 14px;'>
                        <thead>
                            <tr style='background-color: #28A745; color:white;'>
                                <th style='width: 10%;'>SN</th>
                                <th style='width: 20%;'>FORM</th>
                                <th style='width: 20%;'>SUBJECT</th>
                                <th style='width: 30%;'>LAST UPDATED </th>
<!--                                <th style='width: 20%' class="text-center">ACTION </th>-->
                            </tr>
                        </thead>
                        <tbody>                    
        <?php
        
       
       $get_max_no ="SELECT MAX(tracker_id) AS max_tracker_id FROM time_tracker WHERE teacher_id = '$teacher'";
        $run_max = $conn -> query ($get_max_no);
        $res_max = $run_max -> fetch_assoc();
        $total_time_tracker = $res_max['max_tracker_id']; //19
       
       $getSubmits = mysqli_query ($conn, "SELECT DISTINCT subject_name FROM time_tracker WHERE teacher_id = '$teacher'"); //get subs this teacher uploaded
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
           
           $getsubs = mysqli_query ($conn, "SELECT * FROM time_tracker WHERE (teacher_id = '$teacher' AND subject_name = '$sub_name' AND date_added = '$maxDate')"); //get max date
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
            <p> In this Page, you can see your teacher's teaching plans for the Academic Year </p> 
            <p> Be Informed by your teacher about their plans regarding the Year ahead in order to make proper preparations and track pacing </p> 
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