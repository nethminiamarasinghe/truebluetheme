<?php
function validateForm($data) {
    $errors = [];

    if (empty($data['user_name'])) {
        $errors[] = "user Name is required.";
    }

    return $errors;
}
function connectDatabase() {
    $host = "localhost";
    $username = "root";
    $password = " ";
    $database = "webster";

    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}
function insertProject($data) {
    $connection = connectDatabase();

    
    $stmt = $connection->prepare("INSERT INTO user (user_name, user_description) VALUES (?, ?)");
    $stmt->bind_param("ss", $data['user_name'], $data['user_description']);
    $stmt->execute();

    $stmt->close();
    $connection->close();
}

function getProjects() {
    $connection = connectDatabase();
    $query = "SELECT * FROM user";
    $result = $connection->query($query);

    $user = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user[] = $row;
        }
    }

    $result->close();
    $connection->close();

    return $user;
}

function updateProject($user_id, $data) {
    $connection = connectDatabase();

    $stmt = $connection->prepare("UPDATE user SET user_name = ?, user_description = ? WHERE user_id = ?");
    $stmt->bind_param("ssi", $data['user_name'], $data['user_description'], $user_id);
    $stmt->execute();

    $stmt->close();
    $connection->close();
}
function deleteProject($user_id) {
    $connection = connectDatabase();

    $stmt = $connection->prepare("DELETE FROM user WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $stmt->close();
    $connection->close();
}


?>
