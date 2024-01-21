
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
    <h2>List OF Clinets</h2>
    <a href="creat.php" role="button" class="btn btn-primary">New Client</a>
    <br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'connect.php';
    $sql = "SELECT *FROM clients";
    $result=$con->query($sql);
    if(!$result){
        die( "Invalid query:".$con->error);
    }
    while($row = $result->fetch_assoc()){
        echo "
        <tr>
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[phone]</td>
        <td>$row[email]</td>
        <td>$row[address]</td>
        <td>$row[created_at]</td>
        <td>
        <a class='btn btn-primary btn-sm' href='/phpcrudbootsrap/edit.php?id=$row[id]'>Edit</a>
        <a class='btn btn-danger btn-sm' href='/phpcrudbootsrap/delete.php?id=$row[id]'>Delete</a>
    </td>
    </tr>
        
     ";
    }


    ?>

  
  </tbody>

</table>
</div>



    
</body>
</html>