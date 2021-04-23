<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style2.css">
  <title>Document</title>
</head>
<body>
  



<?php
  include "head.php";

?>

 <form class="WELCOM">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header navbar-left">
      <a class="navbar-brand" href="#">WELCOME <?php session_start(); 
     echo $_SESSION["user"];?></a>
    </div>
   
  
    <div class="nav navbar-nav navbar-right">
      <li><a class="logout" href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout </a></li>
    </div>
  </div>

</nav>
</form>
</body>
</html>

