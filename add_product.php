<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "planto");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];

    // Upload image
    $target_dir = "uploads/";
    $image_filename = $target_dir . basename($_FILES["product_image"]["name"]);

    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $image_filename)) {
        // Insert data into the products table
        $sql = "INSERT INTO products (name, price, image_filename) VALUES ('$name', $price, '$image_filename')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Product added successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
.div{
    font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
}


        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="div">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<h2>Add a New Plant</h2><hr>
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" required><br>

    <label for="product_price">Product Price (₹):</label>
    <input type="number" name="product_price" min="0" max="<?php echo $maxPrice; ?>" step="0.01" required><br>

    <label for="product_image">Product Image:</label>
    <input type="file" name="product_image" accept="image/*" required><br>

    <input type="submit" value="Add Product">
</form>
</div>
</body>
</html>
