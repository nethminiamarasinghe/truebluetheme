<?php

function validateForm() {

  $errors = [];

  if (empty($_POST['user_name'])) {
    $errors[] = 'Please enter your name.';
  }

  if (empty($_POST['user_email'])) {
    $errors[] = 'Please enter your email address.';
  }

  if (empty($_POST['user_id'])) {
    $errors[] = 'Please enter a id.';
  }
  if (empty($_POST['user_password'])) {
    $errors[] = 'Please enter your password.';
  }

  if (empty($_POST['user_message'])) {
    $errors[] = 'Please enter your message.';
  }

  if (empty($_POST['user_title'])) {
    $errors[] = 'Please enter a title.';
  }
  if (empty($_POST['user_description'])) {
    $errors[] = 'Please enter a project description.';
  }
  if (empty($_POST['user_image'])) {
    $errors[] = 'Please enter your image.';
  }
  return $errors;
}

function connectDatabase() {
 

  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'user';

  $connection = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  return $connection;
}

function insertProject() {
 

  $connection = connectDatabase();

  $euser_name = $_POST['user_name'];
  $euser_mail = $_POST['user_email'];
  $euser_id = $_POST['user_id'];
  $euser_password=$_POST['user_password'];
  $euser_message=$_POST['user_message'];
  $euser_title=$_POST['user_title'];
  $euser_description=$_POST['user_description'];
  $euser_image = $_POST['user_image'];

  $query = 'INSERT INTO user (user_name,user_email,user_id,user_password,user_message,user_title,user_description,user_image) VALUES (?, ?, ?, ?)';
  $statement = $connection->prepare($query);
  $statement->execute([$euser_name, $euser_email, $euser_id, $euser_password, $euser_message,$euser_title,$euser_description,$euser_image]);

  $connection = null;
}

function getProjects() {
  $connection = connectDatabase();

  $query = 'SELECT * FROM user';
  $statement = $connection->prepare($query);
  $statement->execute();

  $projects = $statement->fetchAll();

  $connection = null;

  return $user;
}

function updateProject() {
 

  $connection = connectDatabase();

  $euser_name = $_POST['user_name'];
  $euser_mail = $_POST['user_email'];
  $euser_id = $_POST['user_id'];
  $euser_password=$_POST['user_password'];
  $euser_message=$_POST['user_message'];
  $euser_title=$_POST['user_title'];
  $euser_description=$_POST['user_description'];
  $euser_image = $_POST['user_image'];

  $query = 'UPDATE user SET user_name=?, user_email=?,user_id =?,user_password =?,user_message=?,user_title=?,user_description=?,user_image WHERE id=?';
  $statement = $connection->prepare($query);
  $statement->execute([$euser_name, $euser_email, $euser_id, $euser_password, $euser_message,$euser_title,$euser_description,$euser_image]);

  $connection = null;
}

function deleteProject() {

  $connection = connectDatabase();

  $id = $_POST['user_id'];

  $query = 'DELETE FROM user WHERE user_id=?';
  $statement = $connection->prepare($query);
  $statement->execute([$user_id]);

  $connection = null;
}

?>