<?php
include 'connect.php';
$id ="";
$name ="";
$email = "";
$phone = "";
$address ="";


$errorMessage ="All the fields are required";
$successMessage ="";
if($_SERVER['REQUEST_METHOD']=="GET"){
    if(!isset($_GET["id"])){
        header("Location:index.php");
        exit;
    }
    $id =$_GET["id"];
    $sql ="SELECT *FROM clients WHERE id=$id";
    $result = $con->query($sql);
    $row =$result->fetch_assoc();

    if(!$row){
        header("Location:index.php");
        exit;
    }


   $name   =$row["name"];
   $email  =$row ["email"];
   $phone  =$row ["phone"];
  $address =$row ["address"];

}
else{
    $id = $_POST["id"];
    $name =$_POST["name"];
    $email =$_POST["email"];
    $phone =$_POST["phone"];
    $address =$_POST["address"];

    do{
        if(empty($id)||empty($name)||empty($email)||empty($phone)||empty($address)){
            $errorMessage ="All the fields are required";
            break;
        }
  
        $sql="UPDATE `clients` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address' WHERE id=$id";

        $result = $con->query($sql);
        if(!$result){
            $errorMessage = "Invalied query: ".$conn->error;
            break;
        }
    
        $successMessage = "client updated correctly";
        header("Location:index.php");
        exit;

    }while(false);



}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
    <h2>New Client</h2> 
    <?php
    if(!empty($erorrMessage)){
            echo "
            <div class='alert alert-warning alert-dimissible fade show' role='alert'>
            <strong>$erorrMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
          ";
        }
        ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value ="<?php echo $id;?>">
                 <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"name="name" value="<?php echo $name;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"name="email" value="<?php echo $email;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"name="phone" value="<?php echo $phone;?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"name="address" value="<?php echo $address;?>">
                    </div>
                </div>
                <div class="row mb-3">
           <div class="offset-sm-3 col-sm-2 d-grid">
               <button type="sumbit" class="btn btn-primary">Sumbit</button>
           </div>
           <div class="col-sm-2 d-grid">
               <a class="btn btn-outline-primary" role="button" href="index.php">Cancel</a>
           </div>
          </div>
    
</body>
</html>