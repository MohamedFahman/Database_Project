<?php
session_start();

if (isset($_POST['order_now'])) {
    // Retrieve the cart data from the session
    $cartItems = $_SESSION['cart'];

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

    // Generate the order number (you can use any logic to generate a unique order number)
    $orderNumber = generateOrderNumber();

    // Calculate the total amount
    $totalAmount = calculateTotalAmount($cartItems);

    // Get the customer ID from your authentication system or form input
    $customerID = 123; // Replace with the actual customer ID

    // Get the payment method and expected delivery date from the form
    $paymentMethod = $_POST['Payment_Method'];
    $expectedDeliveryDate = date('Y-m-d', strtotime('+2 days'));

    // Insert the order details into the database
    $query = "INSERT INTO `order` (OrderNo, Total_Amount, Payment_Method, Order_Date, Expected_Delivery_Date, CustomerID) 
          VALUES ('$orderNumber', $totalAmount, '$paymentMethod', CURDATE(), '$expectedDeliveryDate', $customerID)";
    mysqli_query($conn, $query);


    // Insert the order items into the database
    foreach ($cartItems as $cartItem) {
        $productID = $cartItem['productID'];
        $quantity = $cartItem['quantity'];

        $query = "INSERT INTO contain (OrderNo, ProductID, No_of_Product) 
                  VALUES ('$orderNumber', $productID, $quantity)";
        mysqli_query($conn, $query);
    }

    // Clear the cart
    $_SESSION['cart'] = array();

    // Close the database connection
    mysqli_close($conn);

    // Redirect to a success page or display a success message
    echo "Order placed successfully!";
}

// Function to generate a unique order number
function generateOrderNumber() {
    // Implement your logic to generate a unique order number
    return uniqid();
}

// Function to calculate the total amount of the order
function calculateTotalAmount($cartItems) {
    $total = 0;

    foreach ($cartItems as $cartItem) {
        $sellingPrice = $cartItem['sellingPrice'];
        $quantity = $cartItem['quantity'];

        $total += $sellingPrice * $quantity;
    }

    return $total;
}
?>
