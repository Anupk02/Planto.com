<?php

$conn = new mysqli("localhost", "root", "", "nursery_shop");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_name = $_POST['product_name'];
$price = $_POST['price'];

$image_path = "uploads/" . basename($_FILES["image_url"]["name"]);

if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $image_path)) {
    $sql = "INSERT INTO products (image_url, product_name, price) VALUES ('$image_path', '$product_name', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully . <a href=\"index.php\">home</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

$conn->close();
?>

