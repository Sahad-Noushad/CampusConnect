<?php
    session_start();
    if(isset($_SESSION['idno'])){
?>

<html>
    <head>
        <title>calendar</title>
        <script src="../../js/jquery-3.7.0.min.js"></script>
        <link rel="stylesheet" href="calendar.css">
        <script>
            function eventdate(edate){
                $.post("calendar.php",{date:edate,op:'event'},function(data){
                    $("#main").html(data);
                });
            }
        </script>
    </head>
    <body>
        <div class="eventdet" id="eventdet">
            <div class="head">
                <p>Events</p>
            </div>
            <div class="main" id="main">

            </div>
        </div>
        <div class="calendar">
            <div class="calendar-header">
                <span class="month">
                    <span class="year-change" id="prev-month">
                        <pre><</pre>
                    </span>
                    <span class="month-picker" id="month-picker">August</span>
                    <span class="year-change" id="next-month">
                        <pre>></pre>
                    </span>
                </span>
                
                <div class="year-picker">
                    <span class="year-change" id="prev-year">
                        <pre><</pre>
                    </span>
                    <span id="year">2022</span>
                    <span class="year-change" id="next-year">
                        <pre>></pre>
                    </span>
                </div>
            </div>

            <div class="calendar-body">
                <div class="calendar-week-day">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="calendar-days"></div>
            </div>

            <div class="month-list"></div>

            <div class="year-list"></div>

        </div>

        <script src="calendar.js"></script>
    </body>
</html>

<?php
    }
    else{
        header("../../login.html");
        exit();
    }
?>