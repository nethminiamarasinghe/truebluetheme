<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add new user</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" placeholder="Enter name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="user_password">
    </div>
    <div class="form-group">
      <label for="message">Message:</label>
      <input type="message" class="form-control" id="message" placeholder="Enter message" name="user_message">
    </div>
    <div class="form-group">
      <label for="id">ID:</label>
      <input type="id" class="form-control" id="id" placeholder="Enter ID" name="user_id">
    </div>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="title" class="form-control" id="title" placeholder="Enter title" name="user_title">
    </div>
    <div class="form-group">
      <label >Description:</label>
      <textarea class="form-control" name="user_description"></textarea>
    </div>
    <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control"  name="user_image">
    </div>
    
    
    <input type="submit" name="insert-btn" class="btn btn-primary" />
  </form>
<?php
  $conn= mysqli_connect('localhost','root','','webster');
  if(mysqli_connect_errno()){
    echo "connection failed";
  }else{
    echo "connection ok";
  }



  if(isset($_POST['insert-btn'])){
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $user_message=$_POST['user_message'];
    $user_title=$_POST['user_title'];
    $user_description=$_POST['user_description'];
    $image=$_FILES['user_name']['name'];
    $tmp_name=$_FILES['user_image']['tmp_name'];

    $insert="INSERT INTO user(user_name,user_email,user_password,user_message,user_title,user_description,user_image)VALUES ('$user_name','$user_email','$user_password','$user_message','$user_title','$user_description','$image')";

    $run_insert=mysqli_query($conn,$insert);
    if($run_insert==true){
      echo "Data has been inserted";
      move_uploaded_file($tmp_name,"upload/$image");
    }else{
      echo "failed,try again!";
    }
  }

?>

</div>

</body>
</html>
