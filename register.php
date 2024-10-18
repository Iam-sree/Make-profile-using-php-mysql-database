<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="file" name="image" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
<?php

$conn = new mysqli("localhost:3306","root", "mt5XlO","my_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $sql = "INSERT INTO myimage (username, password, image) VALUES ('$username', '$password', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='loginimage.php'>Login now</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>