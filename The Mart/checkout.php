<?php
$servername = "localhost";
$username = "root"; // default for local
$password = "";     // default for local (XAMPP)
$dbname = "themart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $cardName = $_POST['cardname'];
    $cardNumber = $_POST['cardnumber'];
    $expMonth = $_POST['expmonth'];
    $expYear = $_POST['expyear'];
    $cvv = $_POST['cvv'];
    $sameAddress = isset($_POST['sameaddress']) ? 1 : 0;

    // Prepare and insert data
    $sql = "INSERT INTO orders (
                full_name, email, address, city, state, zip,
                card_name, card_number, exp_month, exp_year, cvv, same_address
            ) VALUES (
                '$fullName', '$email', '$address', '$city', '$state', '$zip',
                '$cardName', '$cardNumber', '$expMonth', '$expYear', '$cvv', '$sameAddress'
            )";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>