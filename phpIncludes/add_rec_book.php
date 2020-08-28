<?php
    include '../db.php';
    session_start();

    $topic = $_POST['topic'];
    $title = $_POST['title'];
    $est_price = $_POST['est_price'];
    $form = "Form ".$_SESSION ['form_selected'];
    $subject = $_SESSION ['subj_selected'];
    $teacher_id = $_SESSION['current_userID'];
    
    if ($subject == 1){
        $subject_name = 'Mathematics';
    }

    if ($subject == 2){
        $subject_name = 'English';
    }

    if ($subject == 3){
        $subject_name = 'Kiswahili';
    }

    if ($subject == 4){
        $subject_name = 'Geography';
    }

    if ($subject == 5){
        $subject_name = 'History';
    }

    if ($subject == 6){
        $subject_name = 'Civics';
    }

    if ($subject == 7){
        $subject_name = 'Chemistry';
    }

    if ($subject == 8){
        $subject_name = 'Physics';
    }

    if ($subject == 9){
        $subject_name = 'Biology';
    }

    if ($subject == 10){
        $subject_name = 'Book Keeping';
    }

    if ($subject == 11){
        $subject_name = 'Commerce';
    }

//    echo $topic."<br/>";
//    echo $title."<br/>";
//    echo $est_price."<br/>";
//    echo $form."<br/>";
//    echo $subject."<br/>";
//    echo $subject_name."<br/>";

    $insert_rec_book = "INSERT INTO recommended_books (book_name, estimate_price, subject_name, subject_id, topics, Form, teacher_id) VALUES ('$title', '$est_price', '$subject_name', '$subject', '$topic', '$form', '$teacher_id')";
    
    $run_insert = $conn -> query ($insert_rec_book);


header ('Location: ../teacher_pages/rec_alevel.php');
    
    