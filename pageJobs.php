<?php
    session_start();
    require 'includes/dbconnect.php ';
    $sql = "SELECT * FROM cardetails ORDER BY id ASC  LIMIT 5;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>
    <script type="text/javascript">


     </script>
    <body>
            <div id="wrapper">
            <header>
             <strong><h1> JUAN'S AUTO PAINT</strong></h1>
            </header>
            <nav> 
                <ul class="menu">
                   <strong> <li><a href="home">NEW PAINT JOB</a></li></strong>
                   <strong> <li><a href="#" style="color:black" >PAINT JOBS</a></li></strong>
                </ul>
            </nav>   
            <section>
               <strong><h1>Paint Jobs</strong></h1>
            </section>

            
           
            <table style=" width: 65%; float: left;"  >
                <strong><p> Paint Jobs in Progress</p></strong>
                <tr> 
                    <th> Plate No. </th>
                    <th> Current Color </th> 
                    <th> Target Color </th> 
                    <th> Action </th>     
                </tr>
                <?php 
                while($row = mysqli_fetch_array($result)) {?>
                  <tr>  
                      <td><?php echo $row['plateNo'];?></td>
                      <td><?php echo $row['currentColor'];?></td>
                      <td><?php echo $row['TargetColor'];?></td>
                      <td><form action="include/completed.php" method="post">
                          <input type="checkbox" name="completed" value="<?php echo $row['id'] ?>"> Completed
    
                     </form>
                </td>
                </tr>
                  
                  <?php }
                       
                        ?>
            </table>
            <table style="display: inline-block; margin-left:30px ;width: 30%;">

                <tr>
                <strong>  <th colspan='2' class="left"> SHOP PERFORMANCE </strong> </th>
                     
                </tr>
                <?php 
            
                      $sql = mysqli_query($conn,"SELECT * FROM cardetails where  status ='completed' ");
                      $total = mysqli_num_rows($sql);

                ?>
                <tr class = "summary">
                    <td style="padding-top : 20px"> Total Cars Painted: </td>
                    <td style="padding-top : 20px ; font-weight:bold"><?php echo htmlentities($total);?></td>
                </tr>
                <tr class = "summary">
                    <td> Breakdown: </td>
                    <td> </td>
                </tr>
                <?php 
                  $targetColor="blue";                   
                  $rt = mysqli_query($conn,"SELECT * FROM cardetails where  TargetColor='$targetColor' and status ='completed'");
                  $num1 = mysqli_num_rows($rt);
               ?>
                <tr class = "summary">
                  <td> Blue: </td>
                  <td style="font-weight:bold"><?php echo htmlentities($num1);?></td>
                </tr>
                <?php 
                    $targetColor="red";                   
                    $rt = mysqli_query($conn,"SELECT * FROM cardetails where  TargetColor='$targetColor' and status ='completed'");
                    $num1 = mysqli_num_rows($rt);
            ?>
                <tr class = "summary">
                    <td> Red: </td>
                    <td style="font-weight:bold"><?php echo htmlentities($num1);?></td>
                </tr>
                <?php 

              $targetColor="green";                   
              $rt = mysqli_query($conn,"SELECT * FROM cardetails where  TargetColor='$targetColor' and status ='completed'");
              $num1 = mysqli_num_rows($rt);
            ?>
                <tr class = "summary">
                    <td style="padding-bottom : 20px"> Green: </td>
                    <td style="padding-bottom : 20px  ; font-weight:bold"><?php echo htmlentities($num1);?></td>
            </table>

            <table style=" width: 65%; float: left;"  >
                <strong><p> Paint Queue</p></strong>
                <tr> 
                    <th> Plate No. </th>
                    <th> Current Color </th> 
                    <th> Target Color </th>    
                </tr>
                <?php 
                while($row = mysqli_fetch_array($result)) {?>
                  <tr>  
                      <td><?php echo $row['plateNo'];?></td>
                      <td><?php echo $row['currentColor'];?></td>
                      <td><?php echo $row['TargetColor'];?></td>
                </td>
                </tr>
                <?php }
                       
                       ?>
            </table>

            </div>
    
    </body>
</html>
