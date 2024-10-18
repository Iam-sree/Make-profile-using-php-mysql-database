
<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: loginimage.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<style>
    img{
        width:200px;
        height:200px;
        position: relative;
        left:550px;
        top:50px;
    }
    .profile{
        width:200px;
        height:200px;
        border-radius:100%;
    }
    #name{
        position: relative;
        left:590px;
        top:50px;
    }
    #id{
        display:none;
    }
    center{
        position: relative;
        top:50px;
        right:20px;
    }
</style>
<body>
<img class="profile" src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['image']); ?>" alt="User Image">

    <h2 id="name">Name:<?php echo $_SESSION['username']; ?></h2>
    <h2 id = "id">W: <?php echo $_SESSION['id']; ?>!</h2>
    <center>
    <form method="post" action="logout.php">
        <button type="submit" name="logout">Logout</button>
    </form>
    </center>
</body>
</html>