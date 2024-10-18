
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
<?php
session_start();

$conn = new mysqli("localhost:3306","root", "mt5XlO","my_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    
    $sql = "SELECT * FROM myimage WHERE username='$inputUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($inputPassword, $row['password'])) {
             $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $row['username'];
           $_SESSION['image'] = $row['image'];
           $_SESSION['id'] = $row['id'];
           $_SESSION['password'] = $row['password'];
            header("Location: welcome.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username.";
    }
}

$conn->close();
?>


