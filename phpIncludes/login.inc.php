<?php
    include '../db.php';

    if (isset($_POST['submit_btn'])){
        $username = $_POST['Username'];
        $pwd = $_POST['pwd'];
        $check_db = "SELECT * FROM student_info WHERE username='$username' AND Password='$pwd'";
        $run_query = $conn -> query ($check_db);
        $res_db = $run_query -> fetch_assoc();
        $res_num = mysqli_num_rows($run_query);
        
        if ($res_num != 0){
            header ('Location: ../pages/home.php');
            $_SESSION['current_userID'] = $res_db['student_id'];
            
            
//            echo "OK";
        }else{
            header ('Location: ../index.php?1');
            $_SESSION['wrong_pwd'] = '1';
            wrong_password();
            
        }  
    }
    
    