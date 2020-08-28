<?php
    include '../db.php';
    session_start();

    $current_user = $_SESSION['current_userID'];

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
               
               <?php
                $firstName = $_SESSION['FirstName'];
                $lastName = $_SESSION['LastName'];
                $logged_as = $_SESSION['user_teacher'];
       
                $teacher_info = mysqli_query($conn, "SELECT * FROM teacher_info WHERE teacher_id = '$current_user'");
                $res_teacher_info = mysqli_fetch_assoc($teacher_info);
    
                echo "
              <font color='#0C7FCF'><h5> Welcome <font color='#28A745' style='font-size: 15px;'>".$firstName." ".$lastName." </font><font color='#0C7FCF' style='font-size: 15px;'>(as a ".$logged_as.")</font></h5></font>
              <div style='color: #0C7FCF'><hr></div>
                ";
                ?>
               </div>
               
           </div>
           
           <div class="row">
               <div class="col-md-3 col-lg-3 col-xl-6 col-6" >
                    <div class="row">
                        <div class="col-lg-5">
                            <img class="img-fluid" src="../img/21294.png">
                            
                        </div>
                        
                        <div class="col-lg-7">
                        
                        <?php
                            echo "
                        <table class='mt-1 table table-striped' style='font-size: 14px; border: 1px solid #0C7FCF'>
                        <thead style='background-color: #0C7FCF; color:white;'>
                        <tr>
                        <th style='width:60%'> Information </th>
                        <th style='width:40%'> Details: </th>
                        </tr
                        </thead>
                        
                        <tbody>
                        <tr> 
                        <td><b>Name:</b></td>
                        <td>".$res_teacher_info['FirstName']." ",$res_teacher_info['LastName']."</td>
                        </tr>
                        
                        <tr> 
                        <td><b>Username:</b></td>
                        <td>".$res_teacher_info['username']."</td>
                        </tr>
                        
                        </tbody>
                        </table>
                        ";
                        
                        ?>
                        </div>
                        
                        
                        
                    </div>
                   
                       
                   
                   
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