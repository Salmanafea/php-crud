<?php
include 'connect.php';
$name  ="";
$email = "";
$phone ="";
$address ="";
$erorrMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];



    do{
        if(empty($name)||empty($email)||empty($phone)||empty($address)){
            $erorrMessage ="ALL The Fields are required";
            break;

        }

   

    $sql = "INSERT INTO `clients`( `name`, `phone`, `email`, `address`) VALUES ('$name','$phone','$email','$address')";
    $result = $con->query($sql);
    if(!$result){
        $erorrMessage = "Invalied query :".$con->$error;
        break;
    }

    
$name  ="";
$email = "";
$phone ="";
$address ="";
$successMessage="client added correctly";

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
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
     


          <div class="container my-5">
            <h2>New Client</h2>
            <?php
        if(!empty($erorrMessage)){
            echo "
            <div class='alert alert-warning alert-dimissible fade show' role='alert>
            <strong>$erorrMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='close'></button>
            </div>
            
            ";
        }
        ?>
            <form action="" method="POST">
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

      </form>
     
   </div>

</body>
</html>