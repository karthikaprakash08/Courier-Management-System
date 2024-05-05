<!DOCTYPE html>
<html lang="en">
<head>
<?php 
    include '../server/api.php';  


    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COURIER MANAGEMENT</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
    <nav>
        <label class="logo">Kourier</label>
        <div class="navigation">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="request.php">Request</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php if (isset($_SESSION['customer'])) : ?>
                <li><a href="profile.php" class="nav-link">Profile</a></li>
                <li><a href="tracking.php" class="nav-link">Tracking</a></li>
                <li><a href="/admin/logout.php" class="nav-link">Logout</a></li>
                <?php else : ?>
                <li><a href="/admin/login.php" class="btnLogin-popup">Login</a></li>
                <?php endif; ?>
                  
            </ul>
        </div>
    </nav>