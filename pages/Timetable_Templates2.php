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
    
          <div class='container mt-3'>
        <div class='row'>
            <div class='col'>
               <hr>
               <div class="col-lg-3 mb-2">
               <label title="Add New Entry">               
               <button type="button" class="btn btn-info"><span style="font-size:14px;" data-toggle="modal" data-target="#modal-default"> Add Entry </span></button>
               
               
               
               </label>
               
                </div>
               
                <div class='col-lg-12 col-12 ml-auto mr-auto'>
                    <div class='table-responsive' style='border: 1px solid #0C7FCF;'>
                        <table class='table table-striped' style='font-size: 14px;'>
                            <thead>
                                <tr style='background-color: #0C7FCF; color:white;'>
                                    <th style='width: 5%'>SN</th>
                                    <th style='width: 10%'>FROM (DATE)</th>
                                    <th style='width: 10%'>TO (DATE)</th>
                                    <th style='width: 40%'>TOPIC(s) </th>
                                    <th class='text-center' style='width: 14%'>STATUS </th>
                                    <th style='width: 15%' class='text-center'>ACTION </th>
                                </tr>
                            </thead>
                            <tbody>
                            
<?php
                if (isset($_POST['edit_btn'])){
                    $edit_date = $_POST['edit_date'];
                    
                    $getDate = mysqli_query($conn, "SELECT * FROM timetable_info WHERE start_date = '$edit_date' AND student_id='$current_user'");
                    $get_res = mysqli_fetch_assoc($getDate);
                    
                    $getMAX = mysqli_query ($conn, "SELECT MAX(timetable_id) AS MAX_ttable FROM timetable_info");
                    $getres_MAX = mysqli_fetch_assoc ($getMAX);
                    
                    $lp1 = 1;
                    $sn = 1;
                    while ($lp1 <= $getres_MAX){
                        $getEXACTS = mysqli_query ($conn, "SELECT * FROM timetable_info WHERE start_date = '$edit_date' AND student_id='$current_user' AND timetable_id = '$lp1'");
                        $res_EXACTS = mysqli_fetch_assoc($getEXACTS);
                        $count_EXACTS = mysqli_num_rows($getEXACTS);
                        
                        if ($count_EXACTS != 0){
                            echo "
                            <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            
                            </tr>
                            ";
                            
                        }
                        
                        $lp1 = $lp1 + 1;
                    }
                    
                }
    
                ?>
                            
                            
                            
                            
                            
                            
                            
                            </tbody></table>
                            </div></div></div>
         
         <style>
             #color_select option:active, #color_select option:hover, #color_select option:focus{
/*                 outline:none;*/
                 background-color: #306FA0;
             }   
             
             
        </style>
          
          
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    </div>
    
    <div class="footer-basic text-center" style="background-color: #0C7FCF;" id="footer">
        <div>
            <p class="copyright mt-4" style="color:white; font-size:14px;">© 2020 - Secondary School Syllabus Guider</p>
        </div>
    </div>
    
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