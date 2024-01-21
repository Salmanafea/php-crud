<?php

include 'connect.php';

if(isset($_GET['id'])){
    $userid= $_GET['id'];
    $sql = "DELETE FROM `clients` WHERE  `id`='$userid'";
    $result= $con->query($sql);
    if($result == TRUE){
            echo "record deleted succesfully";
            
          }else{
            echo "Erorr:".$sql."<br>".$con->erorr;
          }
           
}

header("Location:index.php");
exit;
