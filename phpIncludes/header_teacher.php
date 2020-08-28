
    <div>
        <div>
            <div class='container-fluid text-light' style='background-color:#0C7FCF;'>
                <div class='row'>
                    <div class='col-md-8 col-xl-12 offset-md-2 offset-xl-0' style='width: 100%; background-color: #0C7FCF;'>
                        <h1 class='text-center my-4' style='font-size: 30px;'>Syllabus Management and Revision Tracking System</h1>
                        <p class='float-right pr-5 mr-lg-5'> <i>Knowledge is power</i> - Aristotle</p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class='container' style='background-color: #DDEDFF'>
                <div class='row'>
                    <div class='col-md-8 col-xl-12 offset-md-2 offset-xl-0'>
                        <nav class='navbar navbar-light navbar-expand-md pl-lg-4'>
                            <div class='container-fluid'><button data-toggle='collapse' class='navbar-toggler' data-target='#navcol-1'><span class='sr-only'>Toggle navigation</span><span class='navbar-toggler-icon'></span></button>
                                <div class='collapse navbar-collapse' id='navcol-1' style="font-size:15px;">
                                    <ul class='nav navbar-nav'>
                                        <li class='nav-item' role='presentation'>
                                        <a class='nav-link active ml-lg-4' href='../teacher_pages/Home.php'>Profile</a>
                                        </li>
                                        <li class='nav-item ml-lg-5' role='presentation' id='head_txt'>
                                            <div class='nav-item dropdown mt-2'>
                                               <a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='../teacher_pages/Syllabus.php' style='color:black;' onclick="clear_local()" id="header_link">Syllabus</a>
                                                <div class='dropdown-menu' role='menu'  style="font-size:14px;">
                                                    <a class='dropdown-item' role='presentation' href='olevel.php' onclick="clear_local()">O Level</a>
                                                    <a class='dropdown-item' role='presentation' href='alevel.php' onclick="clear_local()">A Level</a>
                                                </div>

                                            </div>
                                        </li>
                                        
                                        <li class='nav-item' role='presentation' id='head_txt'>
                                       <div class='nav-item dropdown mt-2 ml-lg-5'>
                                           <a class='dropdown-toggle active' data-toggle='dropdown' aria-expanded='false' href='../teacher_pages/Syllabus.php' style='color:black;' id="header_link">Recommended books</a>
                                            <div class='dropdown-menu' role='menu' style="font-size:14px;">
                                                <a class='dropdown-item' role='presentation' href='rec_olevel.php' onclick="clear_local()">View books</a>
                                                <a class='dropdown-item' role='presentation' href='rec_alevel.php' onclick="clear_local()">Recommend Books</a>
                                            </div>
                                        </div>
                                        </li>
                                        
                                        <li class='nav-item' role='presentation'><a class='nav-link active ml-lg-4' id='head_txt' href='../teacher_pages/Time_Tracker.php' onclick='clear_local()'>Time Tracker</a></li>
                                        <li class='nav-item' role='presentation'><a class='nav-link active ml-lg-4' id='head_txt' href='../teacher_pages/Career_Guidance.php'>Career Guidance</a></li>
<!--                                        <li class='nav-item' role='presentation'><a class='nav-link active ml-lg-4' id='head_txt' href='../teacher_pages/Timetable_Templates.php'>Study Timetable</a></li>-->
                                    </ul><a class='ml-lg-5' href='../phpIncludes/logout.inc.php'><strong>Logout</strong></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function clear_local(){
            window.localStorage.clear();
            
        }
    </script>

    <style>
        #head_txt:hover{
            color: #0056B3;
            text-decoration: underline;
        }
        
/*
        a:active{
            font-weight: 600;
            color: red;
        }
*/
    
    </style>

