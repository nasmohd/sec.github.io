<?php
    include '../db.php';

    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Username = $_POST['Username'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $P_PhoneNumber = $_POST['P_PhoneNumber'];
    $form = $_POST['form'];
    $combination = $_POST['combination'];
    $pwd = $_POST['pwd'];

    echo $FirstName;
    echo $LastName;
    echo $Username;
    echo $PhoneNumber;
    echo $P_PhoneNumber;
    echo $form;
    echo $combination;
    echo $pwd;

    $insert_DB = mysqli_query ($conn, "INSERT INTO student_info (FirstName, LastName, username, Acad_Level, Class_combination, Student_PhoneNumber, Parent_PhoneNumber, Password, subject_id) VALUES ('$FirstName', '$LastName', '$Username', '$form', '$combination', '$PhoneNumber', '$P_PhoneNumber', '$pwd', '3')");




header ('Location: ../index.php');


