<?php
    session_start();
    require 'includes/dbconnect.php ';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto Paint Job</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="/css/styles.css">

    </head>
    <body>
            <div id="wrapper">
            <header>
             <strong><h1> JUAN'S AUTO PAINT</strong></h1>
            </header>
            <nav> 
                <ul class="menu">
                   <strong> <li><a href="#" style="color:black">NEW PAINT JOB</a></li></strong>
                   <strong> <li><a href="pageJobs.php" style="text-decoration: none;">PAINT JOBS</a></li></strong>
                </ul>
            </nav>   
            <section>
               <strong><h1>New Paint Job</strong></h1>
               <img src ="images/default.png" style ="margin-left: 100px" >
               <img src ="images/arrow.png" style ="margin-left:-30px"  >
               <img src ="images/default.png" style ="margin-left:-30px" >
            </section>
            
            <form action = "includes/insertDetails.php" method = "post" class="details" >
              <strong><p> Car Details </p> </strong>
              <div class="row">
                    <label for="plateNumber"><span> Plate No. </span> </label>
                    <input type="text" class="input-field" name="plateNo"> </input>
              </div>
              <div class="row">
                    <label for="currentColor"><span> Current Color</span></label>
                    <select name="currentColor" id="select1" class = "select-field">
                    <option style="display:none;"></option>
                        <option  > Red </option>
                        <option> Blue </option>
                        <option > Green </option>
                        </select>
              </div>   
                <div class="row">
                    <label for="targetColor"><span>Target Color</span></label>
                    <select name="targetColor" id="" class = "select-field" >
                    <option style="display:none;"></option>
                      <option> Red </option>
                        <option> Blue </option>
                        <option> Green </option>
                    </select>
                </div>
                <div class="row">
                  <button class="btn" name="submit" onclick="window.location.href = '/pageJobs.php';"> Submit </button>
                </div>            
                </form>
            
            </div>
    </body>
</html>
