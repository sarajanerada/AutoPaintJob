<?php 

if (isset($_POST['submit'])) {
  require 'dbconnect.php';

  $plateNo = $_POST ['plateNo'];
  $currentColor = $_POST ['currentColor'];
  $targetColor = $_POST ['targetColor'];

  if (empty($plateNo) || empty($currentColor) || empty($targetColor))
    
  {
     header("location: ../index.php?error=emptyfields&plateNo=".$plateNo."&currentColor=".$currentColor."&targetColor=".$targetColor);
     exit();
     
  }

  else {
      $sql = "INSERT INTO cardetails (plateNo, currentColor, TargetColor ) VALUES ('$plateNo' , '$currentColor' , '$targetColor' )";
      $stmt = mysqli_stmt_init ($conn);

      if(!mysqli_stmt_prepare($stmt , $sql)) {
        header ("location: ..//index.php?error=sqlerror");
        exit();
      }

      else {
        mysqli_stmt_bind_param ($stmt, 'sss' , $plateNo , $currentColor , $targetColor);
        mysqli_stmt_execute($stmt);
        header ("location: ../pageJobs.php");

      }



mysqli_stmt_close($stmt);
mysqli_close($conn);
} }  
else{

header("location: ../index.php");
exit();
};