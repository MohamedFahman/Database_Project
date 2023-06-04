<!DOCTYPE html>

<html>
    <head>
        <title>
            Online Shopping
        </title>
        <link rel = "icon" href = Logo.jpg type = "image/x-icon">
        <link rel="stylesheet" type="text/css" href="test.css" />
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <link rel="stylesheet" type="text/css" href="php.css" />
        <link rel="stylesheet" type="text/css" href="AdminStyle.css" />
        
    </head>

    <body>
        <div class="header">
            <div class="logocontainer">
              <img class="logoimg" src="LogoFinal.jpg" alt="Logo">
              <h2>The largest online shopping platform in Sri Lanka.</h2>
            </div>
        
            <ul class="login">
              <li><a href="Login.html">Log in</a></li> 
              <li><a href="Signup.html">Sign up</a></li>
            </ul>
        </div>

           <ul class="NavigationBar">
                <li class="active"><a href=Home.html> Home </a></li>
                <li ><a href=Popular.html> Popular Categories </a></li>
                <li ><a href=NewAddtion.html> New Additions </a></li>
                <li ><a href=OnSale.html> On Sale </a></li>
                <li ><a href=orderNow.html> Order Now </a></li>
                <li ><a href=contacts.html> Contacts Us </a></li>
                <li ><a href=Rating.html> Rating Us </a></li>
            </ul>
        
<?php

// Establish a database connection
$host = "localhost";
$dbname = "project_database";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to retrieve all employee details
$sql = "SELECT * FROM Stock";
$result = mysqli_query($conn, $sql);

// Check if any results were returned
if (mysqli_num_rows($result) > 0) {
    // Loop through each row and print employee details
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Branch ID: " . $row["BranchID"] . "<br>";
        echo "Product ID: " . $row["ProductID"] . "<br>";
        echo "Quantity: " . $row["Quantity"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No Stock Available.";
}

// Close the database connection
mysqli_close($conn);

?>

    <br><br>
    </body>

    <footer>
        <p>&copy; 2023 Online Shopping, Sri Lanka </p>
    </footer>

</html>









