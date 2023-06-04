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
$passwordHost = "";

$conn = mysqli_connect($host, $username, $passwordHost, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the AdminID and password from the database based on the provided AdminID
$AdminID = $_POST['AdminID']; // Assuming the AdminID is submitted via POST method
$query = "SELECT Password FROM Admin WHERE AdminID = '$AdminID'";
$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // AdminID exists in the database, so check the password
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['Password'];
        $providedPassword = $_POST['Password']; // Assuming the password is submitted via POST method

        // Compare the stored password with the provided password
        if (password_verify($providedPassword, $storedPassword)) {
            // Passwords match, authentication successful
            echo "Authentication successful!";
        } else {
            // Passwords do not match
            echo "Invalid password!";
        }
    } else {
        // AdminID does not exist in the database
        echo "Invalid AdminID!";
    }
} else {
    // Error executing the query
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>


<div class="middle">
<ul>
        <li class="selection"> <a href=EmployeeView.php> View Employee Details </a></li><br><br>
        <li class="selection"> <a href=EmployeeAdd.html> Add a employee </a></li><br><br>
        <li class="selection"> <a href=EmployeeRemove.html> Remove a employee </a></li><br><br>
        <li class="selection"> <a href=EmployeeModify.html> Modify a employee details </a></li><br><br>

        <li class="selection"> <a href=Stockview.php> View Stock Details </a></li><br><br>
        <li class="selection"> <a href=Supplyview.php> View Supply Details </a></li><br><br>
        <li class="selection"> <a href=StockAdd.html>Add a product to stock </a></li><br><br>
        <li class="selection"> <a href=StockRemove.html> Remove a product from stock </a></li><br><br>

        <li class="selection"> <a href=SupplierView.php> View supplier Details </a></li><br><br>
        <li class="selection"> <a href=SupplierAdd.html> Add a supplier </a></li><br><br>
        <li class="selection"> <a href=SupplierRemove.html> Remove a supplier </a></li><br><br>
        <li class="selection"> <a href=SupplierModify.html> Modify a supplier details </a></li><br><br>

        <li class="selection"> <a href=ProductView.php> View product Details </a></li><br><br>
        <li class="selection"> <a href=ProductAdd.html> Add a product </a></li><br><br>
        <li class="selection"> <a href=ProductRemove.html> Remove a product </a></li><br><br>
        <li class="selection"> <a href=ProductModify.html> Modify a product details </a></li><br><br>
</ul>
<div>

    <br><br>
    </body>


    <footer>
        <p>&copy; 2023 Online Shopping, Sri Lanka </p>
    </footer>

</html>






