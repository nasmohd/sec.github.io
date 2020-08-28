<?php
    include '../db.php';
    session_start();

    if (isset($_POST['submit_btn'])){
        $username = $_POST['Username'];
        $pwd = $_POST['pwd'];
        $check_db = "SELECT * FROM student_info WHERE username='$username' AND Password='$pwd'";
        $run_query = $conn -> query ($check_db);
        $res_db = $run_query -> fetch_assoc();
        $res_num = mysqli_num_rows($run_query);
        
        $check_db2 = "SELECT * FROM teacher_info WHERE username='$username' AND password='$pwd'";
        $run_query2 = $conn -> query ($check_db2);
        $res_db2 = $run_query2 -> fetch_assoc();
        $res_num2 = mysqli_num_rows($run_query2);
        
        if ($res_num != 0){ //The information entered fits to student
            header ('Location: ../pages/home.php');
            $_SESSION['user_student'] = "Student";
            $_SESSION['current_userID'] = $res_db['student_id'];
            $_SESSION['FirstName'] = $res_db['FirstName'];
            $_SESSION['LastName'] = $res_db['LastName'];
  
//        }else{
//            header ('Location: ../index.php?1');
//            $_SESSION['wrong_pwd'] = '1';
//            wrong_password();     
//        }
        }
        else if ($res_num2 != 0){ //The information entered fits to Teacher
            header ('Location: ../teacher_pages/home.php');
            $_SESSION['user_teacher'] = "Teacher";
            $_SESSION['current_userID'] = $res_db2['teacher_id'];
            $_SESSION['FirstName'] = $res_db2['FirstName'];
            $_SESSION['LastName'] = $res_db2['LastName'];
        }
        
        else{
            header ('Location: ../index.php?1');
            $_SESSION['wrong_pwd'] = '1';
            wrong_password();   
        } 
    }
    
    