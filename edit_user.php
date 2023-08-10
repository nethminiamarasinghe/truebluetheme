<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit user</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit user</h2>
  <?php
   $conn= mysqli_connect('localhost','root','','webster'); 
  if(isset($_GET['edit'])) {
    $edit_id=$_GET['edit'];

    $select="SELECT * FROM user WHERE user_id='$edit_id'";
        $run=mysqli_query($conn,$select);
        $row_user=mysqli_fetch_array($run);

        
        $user_name=$row_user['user_name'];
        $user_email=$row_user['user_email'];
        $user_password=$row_user['user_password'];
        $user_message=$row_user['user_message'];
        $user_title=$row_user['user_title'];
        $user_description=$row_user['user_description'];
        $user_image=$row_user['user_image'];
    }
  ?>   
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control"placeholder="Enter name" name="user_name" >
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="user_email;">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="user_password">
    </div>
    <div class="form-group">
      <label for="message">Message:</label>
      <input type="message" class="form-control id="message" placeholder="Enter message" name="user_message">
    </div>
    <div class="form-group">
      <label for="id">ID:</label>
      <input type="id" class="form-control" id="id" placeholder="Enter ID" name="user_id">
    </div>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="title" class="form-controlid="title" placeholder="Enter title" name="user_title">
    </div>
    <div class="form-group">
      <label >Description:</label>
      <textarea class="form-control name="user_description"></textarea>
    </div>
    <div class="form-group">
      <label >Image:</label>
      <input type="file" class="form-control"  name="image">
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
    $euser_name=$_POST['user_name'];
    $euser_email=$_POST['user_email'];
    $euser_password=$_POST['user_password'];
    $euser_message=$_POST['user_message'];
    $euser_title=$_POST['user_title'];
    $euser_description=$_POST['user_description'];
    $eimage=$_FILES['image']['name'];
    $eimage_tmp=$_FILES['image']['tmp_name'];


    if(empty($eimage)){
      $eimage=$user_image;
    }

    $update="UPDATE user SET user_name='$euser_name',user_email='$euser_email',user_password='$euser_password',user_message='$euser_message',user_title='$euser_title',user_description='$euser_description',user_image='$eimage'" ;

    $run_update=mysqli_query($conn,$update);
    if($run_update==true){
      echo "Data has been updated";
      move_uploaded_file($eimage_tmp,"upload/$eimage");
    }else{
      echo "failed,try again!";
    }
  }

?>
<a class="btn btn-primary" href="view_user.php">View user</a>
</div>

</body>
</html>
