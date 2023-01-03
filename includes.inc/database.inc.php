<?php
   $connection = mysqli_connect("localhost", "root", "", "igxoiomy_fuo");
   if(!$connection){
    die('Connection Failed' . mysqli_connect_error());
   }