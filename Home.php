<!DOCTYPE html>
<html>
<head>
    <title>Online Shopping</title>
    <link rel="icon" href="Logo.jpg" type="image/x-icon">
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
        <li class="active"><a href="Home.html" class="active"> Home </a></li>
        <li><a href="Popular.html"> Popular Categories </a></li>
        <li><a href="NewAddtion.html"> New Additions </a></li>
        <li><a href="OnSale.html"> On Sale </a></li>
        <li><a href="orderNow.html"> Order Now </a></li>
        <li><a href="contacts.html"> Contacts Us </a></li>
        <li><a href="Rating.html"> Rate Us </a></li>
    </ul>

    <br><br><br>

    <div class="products-container">
        <?php
        // Connect to your MySQL database
        $host = "localhost";
        $dbname = "project_database";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($host, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to retrieve product data from the database
        $query = "SELECT * FROM product";
        $result = mysqli_query($conn, $query);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through the retrieved data and generate HTML for each product
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="product-block">';
                echo '<a href="ProductDetails.php?id='. $row['ProductID'] . '" class="offerlink">';
                echo '<img src="data:image/jpg;base64,'.base64_encode($row['image']).'" alt="Product Image">';
                echo '<h3>' . $row['ProductName'] . '</h3>';
                echo '<p><p class="offer">' ."LKR ". number_format($row['Tag_Price'], 2) . '</p class="price">' ."LKR ". number_format($row['Selling_Price'], 2) . '</p></a>';

                echo '<form action="cart.php" method="POST">';
                echo '<input type="hidden" name="productID" value="' . $row['ProductID'] . '">';
                echo '<input type="hidden" name="productName" value="' . $row['ProductName'] . '">';
                echo '<input type="hidden" name="sellingPrice" value="' . $row['Selling_Price'] . '">';
                echo '<input type="hidden" name="quantity" value="1">';
                echo '<button type="submit" name="add_to_cart">Add to Cart</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            // Display message when no products are found
            echo '<p class="product_block_text">There are no available products for sale!</p>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>

    <br><br>

    <footer>
        <p>&copy; 2023 Online Shopping, Sri Lanka</p>
    </footer>

</body>
</html>
