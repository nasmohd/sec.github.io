<?php
    include '../db.php';
    
    //1. Mathematics
    $Math_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'Mathematics' AND Form = 'Form 1'"; //Form 1
    $Math_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'Mathematics' AND Form = 'Form 2'"; //Form 2
    $Math_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'Mathematics' AND Form = 'Form 3'"; //Form 3
    $Math_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'Mathematics' AND Form = 'Form 4'"; //Form 4
    $Math_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'Mathematics' AND Form = 'Form 5'"; //Form 5
    $Math_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'Mathematics' AND Form = 'Form 6'"; //Form 6
    
    $run_math_f1 = $conn -> query ($Math_f1_books);
    $count_math_f1 = mysqli_num_rows ($run_math_f1);

    $run_math_f2 = $conn -> query ($Math_f2_books);
    $count_math_f2 = mysqli_num_rows ($run_math_f2);

    $run_math_f3 = $conn -> query ($Math_f3_books);
    $count_math_f3 = mysqli_num_rows ($run_math_f3);

    $run_math_f4 = $conn -> query ($Math_f4_books);
    $count_math_f4 = mysqli_num_rows ($run_math_f4);

    $run_math_f5 = $conn -> query ($Math_f5_books);
    $count_math_f5 = mysqli_num_rows ($run_math_f5);

    $run_math_f6 = $conn -> query ($Math_f6_books);
    $count_math_f6 = mysqli_num_rows ($run_math_f6);


    //2. English
    $Eng_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'English' AND Form = 'Form 1'"; //Form 1
    $Eng_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'English' AND Form = 'Form 2'"; //Form 2
    $Eng_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'English' AND Form = 'Form 3'"; //Form 3
    $Eng_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'English' AND Form = 'Form 4'"; //Form 4
    $Eng_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'English' AND Form = 'Form 5'"; //Form 5
    $Eng_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'English' AND Form = 'Form 6'"; //Form 6

    $run_eng_f1 = $conn -> query ($Eng_f1_books);
    $count_eng_f1 = mysqli_num_rows ($run_eng_f1);

    $run_eng_f2 = $conn -> query ($Eng_f2_books);
    $count_eng_f2 = mysqli_num_rows ($run_eng_f2);

    $run_eng_f3 = $conn -> query ($Eng_f3_books);
    $count_eng_f3 = mysqli_num_rows ($run_eng_f3);

    $run_eng_f4 = $conn -> query ($Eng_f4_books);
    $count_eng_f4 = mysqli_num_rows ($run_eng_f4);

    $run_eng_f5 = $conn -> query ($Eng_f5_books);
    $count_eng_f5 = mysqli_num_rows ($run_eng_f5);

    $run_eng_f6 = $conn -> query ($Eng_f6_books);
    $count_eng_f6 = mysqli_num_rows ($run_eng_f6);

    //3. Kiswahili
    $Kisw_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'Kiswahili' AND Form = 'Form 1'"; //Form 1
    $Kisw_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'Kiswahili' AND Form = 'Form 2'"; //Form 2
    $Kisw_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'Kiswahili' AND Form = 'Form 3'"; //Form 3
    $Kisw_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'Kiswahili' AND Form = 'Form 4'"; //Form 4
    $Kisw_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'Kiswahili' AND Form = 'Form 5'"; //Form 5
    $Kisw_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'Kiswahili' AND Form = 'Form 6'"; //Form 6

    $run_kisw_f1 = $conn -> query ($Kisw_f1_books);
    $count_kisw_f1 = mysqli_num_rows ($run_kisw_f1);

    $run_kisw_f2 = $conn -> query ($Kisw_f2_books);
    $count_kisw_f2 = mysqli_num_rows ($run_kisw_f2);

    $run_kisw_f3 = $conn -> query ($Kisw_f3_books);
    $count_kisw_f3 = mysqli_num_rows ($run_kisw_f3);

    $run_kisw_f4 = $conn -> query ($Kisw_f4_books);
    $count_kisw_f4 = mysqli_num_rows ($run_kisw_f4);

    $run_kisw_f5 = $conn -> query ($Kisw_f5_books);
    $count_kisw_f5 = mysqli_num_rows ($run_kisw_f5);

    $run_kisw_f6 = $conn -> query ($Kisw_f6_books);
    $count_kisw_f6 = mysqli_num_rows ($run_kisw_f6);



    //4. Geography
    $Geo_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'Geography' AND Form = 'Form 1'"; //Form 1
    $Geo_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'Geography' AND Form = 'Form 2'"; //Form 2
    $Geo_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'Geography' AND Form = 'Form 3'"; //Form 3
    $Geo_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'Geography' AND Form = 'Form 4'"; //Form 4
    $Geo_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'Geography' AND Form = 'Form 5'"; //Form 5
    $Geo_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'Geography' AND Form = 'Form 6'"; //Form 6

    $run_geo_f1 = $conn -> query ($Geo_f1_books);
    $count_geo_f1 = mysqli_num_rows ($run_geo_f1);

    $run_geo_f2 = $conn -> query ($Geo_f2_books);
    $count_geo_f2 = mysqli_num_rows ($run_geo_f2);

    $run_geo_f3 = $conn -> query ($Geo_f3_books);
    $count_geo_f3 = mysqli_num_rows ($run_geo_f3);

    $run_geo_f4 = $conn -> query ($Geo_f4_books);
    $count_geo_f4 = mysqli_num_rows ($run_geo_f4);

    $run_geo_f5 = $conn -> query ($Geo_f5_books);
    $count_geo_f5 = mysqli_num_rows ($run_geo_f5);

    $run_geo_f6 = $conn -> query ($Geo_f6_books);
    $count_geo_f6 = mysqli_num_rows ($run_geo_f6);

    

    //5. History
    $Hist_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'History' AND Form = 'Form 1'"; //Form 1
    $Hist_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'History' AND Form = 'Form 2'"; //Form 2
    $Hist_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'History' AND Form = 'Form 3'"; //Form 3
    $Hist_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'History' AND Form = 'Form 4'"; //Form 4
    $Hist_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'History' AND Form = 'Form 5'"; //Form 5
    $Hist_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'History' AND Form = 'Form 6'"; //Form 6

    $run_hist_f1 = $conn -> query ($Hist_f1_books);
    $count_hist_f1 = mysqli_num_rows ($run_hist_f1);

    $run_hist_f2 = $conn -> query ($Hist_f2_books);
    $count_hist_f2 = mysqli_num_rows ($run_hist_f2);

    $run_hist_f3 = $conn -> query ($Hist_f3_books);
    $count_hist_f3 = mysqli_num_rows ($run_hist_f3);

    $run_hist_f4 = $conn -> query ($Hist_f4_books);
    $count_hist_f4 = mysqli_num_rows ($run_hist_f4);

    $run_hist_f5 = $conn -> query ($Hist_f5_books);
    $count_hist_f5 = mysqli_num_rows ($run_hist_f5);

    $run_hist_f6 = $conn -> query ($Hist_f6_books);
    $count_hist_f6 = mysqli_num_rows ($run_hist_f6);


    //6. Civics
    $Civ_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'Civics' AND Form = 'Form 1'"; //Form 1
    $Civ_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'Civics' AND Form = 'Form 2'"; //Form 2
    $Civ_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'Civics' AND Form = 'Form 3'"; //Form 3
    $Civ_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'Civics' AND Form = 'Form 4'"; //Form 4
    $Civ_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'Civics' AND Form = 'Form 5'"; //Form 5
    $Civ_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'Civics' AND Form = 'Form 6'"; //Form 6

    $run_civ_f1 = $conn -> query ($Civ_f1_books);
    $count_civ_f1 = mysqli_num_rows ($run_civ_f1);

    $run_civ_f2 = $conn -> query ($Civ_f2_books);
    $count_civ_f2 = mysqli_num_rows ($run_civ_f2);

    $run_civ_f3 = $conn -> query ($Civ_f3_books);
    $count_civ_f3 = mysqli_num_rows ($run_civ_f3);

    $run_civ_f4 = $conn -> query ($Civ_f4_books);
    $count_civ_f4 = mysqli_num_rows ($run_civ_f4);

    $run_civ_f5 = $conn -> query ($Civ_f5_books);
    $count_civ_f5 = mysqli_num_rows ($run_civ_f5);

    $run_civ_f6 = $conn -> query ($Civ_f6_books);
    $count_civ_f6 = mysqli_num_rows ($run_civ_f6);
    


    //7. Chemistry
    $Chem_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'Chemistry' AND Form = 'Form 1'"; //Form 1
    $Chem_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'Chemistry' AND Form = 'Form 2'"; //Form 2
    $Chem_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'Chemistry' AND Form = 'Form 3'"; //Form 3
    $Chem_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'Chemistry' AND Form = 'Form 4'"; //Form 4
    $Chem_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'Chemistry' AND Form = 'Form 5'"; //Form 5
    $Chem_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'Chemistry' AND Form = 'Form 6'"; //Form 6

    $run_chem_f1 = $conn -> query ($Chem_f1_books);
    $count_chem_f1 = mysqli_num_rows ($run_chem_f1);

    $run_chem_f2 = $conn -> query ($Chem_f2_books);
    $count_chem_f2 = mysqli_num_rows ($run_chem_f2);

    $run_chem_f3 = $conn -> query ($Chem_f3_books);
    $count_chem_f3 = mysqli_num_rows ($run_chem_f3);

    $run_chem_f4 = $conn -> query ($Chem_f4_books);
    $count_chem_f4 = mysqli_num_rows ($run_chem_f4);

    $run_chem_f5 = $conn -> query ($Chem_f5_books);
    $count_chem_f5 = mysqli_num_rows ($run_chem_f5);

    $run_chem_f6 = $conn -> query ($Chem_f6_books);
    $count_chem_f6 = mysqli_num_rows ($run_chem_f6);
    

    //8. Physics
    $Phys_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'Physics' AND Form = 'Form 1'"; //Form 1
    $Phys_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'Physics' AND Form = 'Form 2'"; //Form 2
    $Phys_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'Physics' AND Form = 'Form 3'"; //Form 3
    $Phys_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'Physics' AND Form = 'Form 4'"; //Form 4
    $Phys_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'Physics' AND Form = 'Form 5'"; //Form 5
    $Phys_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'Physics' AND Form = 'Form 6'"; //Form 6

    $run_phys_f1 = $conn -> query ($Phys_f1_books);
    $count_phys_f1 = mysqli_num_rows ($run_phys_f1);

    $run_phys_f2 = $conn -> query ($Phys_f2_books);
    $count_phys_f2 = mysqli_num_rows ($run_phys_f2);

    $run_phys_f3 = $conn -> query ($Phys_f3_books);
    $count_phys_f3 = mysqli_num_rows ($run_phys_f3);

    $run_phys_f4 = $conn -> query ($Phys_f4_books);
    $count_phys_f4 = mysqli_num_rows ($run_phys_f4);

    $run_phys_f5 = $conn -> query ($Phys_f5_books);
    $count_phys_f5 = mysqli_num_rows ($run_phys_f5);

    $run_phys_f6 = $conn -> query ($Phys_f6_books);
    $count_phys_f6 = mysqli_num_rows ($run_phys_f6);


    //9. Biology
    $Bio_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'Biology' AND Form = 'Form 1'"; //Form 1
    $Bio_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'Biology' AND Form = 'Form 2'"; //Form 2
    $Bio_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'Biology' AND Form = 'Form 3'"; //Form 3
    $Bio_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'Biology' AND Form = 'Form 4'"; //Form 4
    $Bio_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'Biology' AND Form = 'Form 5'"; //Form 5
    $Bio_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'Biology' AND Form = 'Form 6'"; //Form 6

    $run_bio_f1 = $conn -> query ($Bio_f1_books);
    $count_bio_f1 = mysqli_num_rows ($run_bio_f1);

    $run_bio_f2 = $conn -> query ($Bio_f2_books);
    $count_bio_f2 = mysqli_num_rows ($run_bio_f2);

    $run_bio_f3 = $conn -> query ($Bio_f3_books);
    $count_bio_f3 = mysqli_num_rows ($run_bio_f3);

    $run_bio_f4 = $conn -> query ($Bio_f4_books);
    $count_bio_f4 = mysqli_num_rows ($run_bio_f4);

    $run_bio_f5 = $conn -> query ($Bio_f5_books);
    $count_bio_f5 = mysqli_num_rows ($run_bio_f5);

    $run_bio_f6 = $conn -> query ($Bio_f6_books);
    $count_bio_f6 = mysqli_num_rows ($run_bio_f6);


    //10. Book Keeping
    $BK_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'Book Keeping' AND Form = 'Form 1'"; //Form 1
    $BK_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'Book Keeping' AND Form = 'Form 2'"; //Form 2
    $BK_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'Book Keeping' AND Form = 'Form 3'"; //Form 3
    $BK_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'Book Keeping' AND Form = 'Form 4'"; //Form 4
    $BK_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'Book Keeping' AND Form = 'Form 5'"; //Form 5
    $BK_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'Book Keeping' AND Form = 'Form 6'"; //Form 6

    $run_bk_f1 = $conn -> query ($BK_f1_books);
    $count_bk_f1 = mysqli_num_rows ($run_bk_f1);

    $run_bk_f2 = $conn -> query ($BK_f2_books);
    $count_bk_f2 = mysqli_num_rows ($run_bk_f2);

    $run_bk_f3 = $conn -> query ($BK_f3_books);
    $count_bk_f3 = mysqli_num_rows ($run_bk_f3);

    $run_bk_f4 = $conn -> query ($BK_f4_books);
    $count_bk_f4 = mysqli_num_rows ($run_bk_f4);

    $run_bk_f5 = $conn -> query ($BK_f5_books);
    $count_bk_f5 = mysqli_num_rows ($run_bk_f5);

    $run_bk_f6 = $conn -> query ($BK_f6_books);
    $count_bk_f6 = mysqli_num_rows ($run_bk_f6);



    //11. Commerce
    $Comm_f1_books = "SELECT * FROM recommended_books WHERE subject_name = 'Commerce' AND Form = 'Form 1'"; //Form 1
    $Comm_f2_books = "SELECT * FROM recommended_books WHERE subject_name = 'Commerce' AND Form = 'Form 2'"; //Form 2
    $Comm_f3_books = "SELECT * FROM recommended_books WHERE subject_name = 'Commerce' AND Form = 'Form 3'"; //Form 3
    $Comm_f4_books = "SELECT * FROM recommended_books WHERE subject_name = 'Commerce' AND Form = 'Form 4'"; //Form 4
    $Comm_f5_books = "SELECT * FROM recommended_books WHERE subject_name = 'Commerce' AND Form = 'Form 5'"; //Form 5
    $Comm_f6_books = "SELECT * FROM recommended_books WHERE subject_name = 'Commerce' AND Form = 'Form 6'"; //Form 6
    
    $run_comm_f1 = $conn -> query ($Comm_f1_books);
    $count_comm_f1 = mysqli_num_rows ($run_comm_f1);

    $run_comm_f2 = $conn -> query ($Comm_f2_books);
    $count_comm_f2 = mysqli_num_rows ($run_comm_f2);

    $run_comm_f3 = $conn -> query ($Comm_f3_books);
    $count_comm_f3 = mysqli_num_rows ($run_comm_f3);

    $run_comm_f4 = $conn -> query ($Comm_f4_books);
    $count_comm_f4 = mysqli_num_rows ($run_comm_f4);

    $run_comm_f5 = $conn -> query ($Comm_f5_books);
    $count_comm_f5 = mysqli_num_rows ($run_comm_f5);

    $run_comm_f6 = $conn -> query ($Comm_f6_books);
    $count_comm_f6 = mysqli_num_rows ($run_comm_f6);

?>