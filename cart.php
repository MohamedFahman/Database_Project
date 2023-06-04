<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Initialize the cart array if it doesn't exist
}

if (isset($_POST['add_to_cart'])) {
    // Retrieve the product details from the form
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $sellingPrice = $_POST['sellingPrice'];
    $quantity = $_POST['quantity'];

    // Create an associative array for the cart item
    $cartItem = array(
        'productID' => $productID,
        'productName' => $productName,
        'sellingPrice' => $sellingPrice,
        'quantity' => $quantity
    );

    // Add the cart item to the cart array in the session
    $_SESSION['cart'][] = $cartItem;
}

// Display the cart contents
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '    <title>Cart Page</title>';
echo '    <link rel="stylesheet" type="text/css" href="test.css" />'; //TODO: ADD CSS
echo '</head>';
echo '<body>';
echo '    <h1>Cart Page</h1>';
echo '    <table>';
echo '        <tr><th>Product ID</th><th>Product Name</th><th>Selling Price</th><th>Quantity</th></tr>';

foreach ($_SESSION['cart'] as $cartItem) {
    echo '        <tr>';
    echo '            <td>' . $cartItem['productID'] . '</td>';
    echo '            <td>' . $cartItem['productName'] . '</td>';
    echo '            <td>' . $cartItem['sellingPrice'] . '</td>';
    echo '            <td>' . $cartItem['quantity'] . '</td>';
    echo '        </tr>';
}
echo '    </table>';



echo '<form action="ordernow.php" method="post">';

echo '<div>';
echo '<br>'.'<br>';
echo '<label> Payment Method :</label>';
echo '<input name="Payment_Method" type="radio" value = "Cash_Payment"> Cash Payment </input>';
echo '<input name="Payment_Method" type="radio" value = "Card_Payment"> Card Payment </input>';
echo '<br>'.'<br>'.'<br>';
echo '</div>';

echo '    <button type="submit" name="order_now" class="ordernow"> Order Now </button>';

echo '</form>';



echo '</body>';

echo '</html>';
?>
