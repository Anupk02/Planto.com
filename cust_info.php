<?php
session_start();

// Assuming you have a database connection
$conn = mysqli_connect("localhost", "root", "", "planto");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (!isset($_SESSION['admin'])) {
    header("Location: http://localhost/nursery2.0/index.php");
    exit;
}

// Display a welcome message for the admin
if (isset($_SESSION['status'])) {
    echo "<script>alert('Welcome on admin page as {$_SESSION['admin']}.')</script>";
    unset($_SESSION['status']);
}
// Fetch all customer data from the database
$sql = "SELECT * FROM customers";
$result = mysqli_query($conn, $sql);

$customerData = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $customerData[] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planto</title>
    <link rel="stylesheet" href="main.css?v=1">
    <link rel="icon" type="image/x-icon" href="fevicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/all.min.css">
    <script src="jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <style>
  div.admin-profile p {
        margin: 10px 0;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    p.no-data {
        color: #777;
    }
    </style>
</head>
<body>
    <div class="navbar h">
    <div class="logo1">
        <img src="logo_thumbnail.png" class="logo" alt="icon">
    </div>
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="index.php">Privacy</a></li>
      <li><a href="add_product.php">ADD product</a></li>
      <li><a href="cust_info.php">customer_info</a></li>
      <li><a href="about.html">About</a></li>
    </div>
    <div class="main h">
      <div class="navbar1" style="height: 5.5rem;">
        <div class="hamburger-menu">
          <input id="menu__toggle" type="checkbox" />
          <label class="menu__btn" for="menu__toggle">
            <span></span>
          </label>
          <ul class="menu__box">
          <div class="logo3">
          <img src="logo_thumbnail.png" class="logo2" alt="icon">
          </div>
          <li><a class="menu__item" href="index.php">HOME</a></li>
          <li><a class="menu__item" href="index.php">Privacy</a></li>
      
      <li><a href="add_product.php">ADD product</a></li>
         <li><a href="users.php">customer_info</a></li>
          <li><a href="about.html">About</a></li>
          </ul>
          </div>
          
          
          <div class="box1" >
          <a href="" class="btn-search" style="color:green;"><i class="fa-solid fa-user"></i>  <?php echo $_SESSION['admin'] ?></a>
          <a href="logout.php" onclick="return confirm('Are You sure you want to logout?');"><button  class="btn-search"><i class="fa-solid fa-sign-out"></i> Logout</button></bytton></a>
    </div>
    </div>
    <div class="products">
    <?php if ($customerData): ?>
    <?php $isAdmin = (isset($_SESSION['admin']) && $_SESSION['admin'] === $customerData[0]['username']); ?>

    <?php if ($isAdmin): ?>
        <h1>Admin Profile</h1>
        <div>
            <p> Username: <?php echo $customerData[0]['username']; ?></p>
            <p>Email: <?php echo $customerData[0]['email']; ?></p>
            <p>Address: <?php echo $customerData[0]['address']; ?></p>
            <p>Logged In: Yes</p>
            <!-- Add more admin profile details as needed -->
        </div>
    <?php endif; ?>

    <h1>All Customer Data</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Address</th>
            <th>Logged In</th>
            <!-- Add more table headers as needed -->
        </tr>
        <?php foreach ($customerData as $customer): ?>
            <?php if (!$isAdmin || $customer['username'] !== $customerData[0]['username']): ?>
                <tr>
                    <td><?php echo $customer['username']; ?></td>
                    <td><?php echo $customer['email']; ?></td>
                    <td><?php echo $customer['address']; ?></td>
                    <td><?php echo (isset($_SESSION['user']) && strtolower($_SESSION['user']) === strtolower($customer['username'])) ? 'Yes' : 'No'; ?></td>
                    <!-- Add more table data as needed -->
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No customer data found</p>
<?php endif; ?>


      <!--main-->
      <button onclick="topFunction()" id="top" title="Go to top">Top  <i class="fa-solid fa-arrow-up-from-bracket"></i></button>
            
      <script>
        let mybutton = document.getElementById("top");
        
        window.onscroll = function() {scrollFunction()};
        
        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }
        
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
        </script>
          </div>

          <p id="not-found" style="display: none;" class="not-found">No matching products found.</p>
              <script src="search.js"></script>      

<script>
  const links = document.querySelectorAll('.add-to-cart');
  const button = document.getElementById('form-open');

  links.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      button.click();
    });
  });
</script>

        
        </section> 

        </div>    
    </div>

</body>
</html>