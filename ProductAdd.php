<!DOCTYPE html>
<html>
    <head>
        <title>
            Online Shopping
        </title>
        <link rel = "icon" href = Logo.jpg type = "image/x-icon">
        <link rel="stylesheet" type="text/css" href="test.css" />
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>

    <body>
        <div class="header">
            <div class="logocontainer">
            <a href="Home.html">
              <img class="logoimg" src="LogoFinal.jpg" alt="Logo">
            </a>
              <h2>The largest online shopping platform in Sri Lanka.</h2>
            </div>
        
            <ul class="login">
              <li><a href="Login.html">Log in</a></li>
              <li><a href="Signup.html">Sign up</a></li>
              <li><a href="admin.html">Admin</a></li>
            </ul>
          </div>

            <ul class="NavigationBar">
                <li class="active"><a href=Home.html class="active"> Home </a></li>
                <li ><a href=Popular.html> Popular Categories </a></li>
                <li ><a href=NewAddtion.html> New Additions </a></li>
                <li ><a href=OnSale.html> On Sale </a></li>
                <li ><a href=orderNow.html> Order Now </a></li>
                <li ><a href=contacts.html> Contacts Us </a></li>
                <li ><a href=Rating.html> Rate Us </a></li>
            </ul>


<?php

    // Establish a connection to the database
    $host = "localhost";
    $dbname = "project_database";
    $username = "root";
    $password = "";
    
    $conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
$ProductName = $_POST["ProductName"];
$image = $_POST["image"];
$Price = $_POST["Price"];
$tagPrice = $_POST["tagPrice"];
$SellingPrice = $_POST["SellingPrice"];
$description = mysqli_real_escape_string($conn, $_POST["description"]);




    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert the Product details
    $sql = "INSERT INTO Product (ProductName, Price, image, tagPrice_percentage, SellingPrice_percentage,Description)
            VALUES ('$ProductName', '$Price', '$image', $tagPrice, $SellingPrice, '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

    </body>

    <footer>
        <p>&copy; 2023 Online Shopping, Sri Lanka </p>
    </footer>

</html>



