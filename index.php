<?php
session_start();

$message = ""; // Initialize an empty message

if (isset($_POST['submit'])) {
  $conn = mysqli_connect("localhost", "root", "", "planto");
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM customers WHERE email = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $hashedPassword = $row['password'];

    if (password_verify($password, $hashedPassword)) {
      if ($row['is_admin'] == 1) {
        $_SESSION['admin'] = $row['username'];
        header("Location: http://localhost/nursery2.0/admins.php"); // Admin home page
        $_SESSION['status'] = "You have successfully logged in as an admin.";
        exit;
      } else {
        $_SESSION['user'] = $row['username'];
        $_SESSION['address'] = $row['address'];
        header("Location: http://localhost/nursery2.0/home.php"); // Regular user home page
        $_SESSION['status'] = "You have successfully logged in.";
        exit;
      }
    } else {
      $message = "Invalid password";
    }
  } else {
    $message = "Invalid email";
  }
}

if (isset($_POST['save'])) {
  $conn = mysqli_connect("localhost", "root", "", "planto");
  $user = $_POST['user'];
  $email = $_POST['email'];
  $address = $_POST['Address'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  // Check if username exists
  $checkUsernameQuery = "SELECT * FROM customers WHERE LOWER(TRIM(username)) = LOWER(TRIM('$user'))";
  $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

  if (mysqli_num_rows($checkUsernameResult) > 0) {
    $message = "Username already exists";
  } else {
    // Check if email exists
    $checkEmailQuery = "SELECT * FROM customers WHERE LOWER(TRIM(email)) = LOWER(TRIM('$email'))";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
      $message = "Email already exists";
    } else {
      if ($password === $cpassword) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); 

        $sqli = "INSERT INTO customers (username, email, address, password, is_admin) VALUES ('$user', '$email', '$address', '$hashedPassword', 0)";
        if (mysqli_query($conn, $sqli)) {
          $message = "Hello $user, you have registered successfully as an customer";
        } else {
          $message = "Error: " . mysqli_error($conn);
        }
      } else {
        $message = "Passwords do not match";
      }
    }
  }
}
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
</head>
<body>
<div class="navbar h">
    <div class="logo1">
        <img src="logo_thumbnail.png" class="logo" alt="icon">
    </div>
    <ul>
        <li><a href="index.php">HOME</a></li>
        <div class="dropdown">
    <li>
        <a>PLANTS <i class="fa-solid fa-chevron-down"></i></a> 
        <div class="dropdown-content">
            <a href="#section1" rel="noopener"><i class="fa-solid fa-leaf"></i> Air Plants</a><br>
            <a href="#section2" rel="noopener"><i class="fa-solid fa-leaf"></i> Aquatic Plants</a><br>
            <a href="#section3" rel="noopener"><i class="fa-solid fa-leaf"></i> Herb plants</a><br>
            <a href="#section4" rel="noopener"><i class="fa-solid fa-leaf"></i> Fruit plants</a><br>
            <a href="#section5" rel="noopener"><i class="fa-solid fa-leaf"></i> Flower plants</a><br>
            <a href="#section6" rel="noopener"><i class="fa-solid fa-leaf"></i> Bonsai plants</a>
        </div>
    </li>
</div>

        <li><a href="index.php">Blog or Tips</a></li>
        <li><a href="fedback.html">Feedback</a></li>
        <li><a href="about.html">About</a></li>
    </ul>
</div>

    <div class="main h">
      <div class="navbar1" style="height: 5.5rem;">
      <div class="wrap">
          <div class="input-box">
      <i class="uil uil-search"></i>
      <input  type="text" id="inp" placeholder="Search here..." />
      <button class="button">Search</button>
    </div></div>
          <div class="box1" >
          <button id="form-open" class="btn-search" ><i class="fa-solid fa-user"></i>    Login</button>
          <button class="btn-search cart1 add-to-cart" ><i class="fa-solid fa-cart-shopping"></i> cart</i></button>
          <section class="home">
          <div class="form_container">
<i class="uil uil-times form_close"></i>
<h5 style="color:red;text-align: center;padding:2px;">                
	<?php if(!empty($message)) { ?>
      <div class="alert alert-danger"><?php echo $message; ?></div>
      <?php } ?></h5>
                    <div class="form login_form">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">   
                      <h2><i class="fa-solid fa-user"></i>  login</h2>  
                      <div class="input_box">
                        <input type="email" name="email" placeholder="Enter your email" class="form-control" required />
                        <i class="uil uil-envelope-alt email"></i>
                      </div>
                      <div class="input_box">
                        <input type="password" name="password" placeholder="Enter your password" class="form-control" minlength="4" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                      </div>
          
                      <div class="option_field">
                        <span class="checkbox">
                          <input type="checkbox" id="check" />
                          <label for="check">Remember me</label>
                        </span>
                        <a href="reset_password.php" class="forgot_pw">Forgot password?</a>
                      </div>
          
                      <button class="button" name="submit" class="form-open btn btn-success" value="login" >Login Now</button>
          
                      <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
                    </form>
                  </div>     
  
                <!-- Signup From -->
                <div class="form signup_form">
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                      <h2><i class="fa-solid fa-user-plus"></i> Signup</h2>
                      <div class="input_box">
                        <input type="text" name="user" placeholder="Username" class="form-control" required />
                        <i class="fa-solid fa-user"></i> 
                      </div>
                      <div class="input_box">
                        <input type="email" name="email" placeholder="Enter your email" class="form-control" required />
                        <i class="uil uil-envelope-alt email"></i>
                      </div>
                      <div class="input_box">
                        <input type="text" name="Address" placeholder="Enter your address" class="form-control" required />
                        <i class="fa-regular fa-address-book"></i>
                      </div>
                      <div class="input_box">
                        <input type="password" name="password" placeholder="Create password" class="form-control" minlength="4" maxlength="10" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                      </div>
                      <div class="input_box">
                        <input type="password" name="cpassword" placeholder="Confirm password" class="form-control" minlength="4" maxlength="10" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                      </div>
          
                      <button class="button" name="save" class="form-open btn btn-success" value="Register">Signup Now</button>
          
                      <div class="login_signup">Already have an account? <a href="#" id="login" >Login</a></div>
                    </form>
                  </div>
                                  

</div>
<script src="login.js"></script>  
          </section>
      </div>
      
      </div>
        <div class="products">
          <h2 style="margin-left: 25px;padding:10px">Trending </h2>   
          <hr>
          <div class="product-grid">
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant1.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Jasminum sambac, Mogra, Arabian Jasmine - Plant</h6>
              </div> 
              <p class="product-price1">₹299 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant2.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Peace Lily, Spathiphyllum - Plant</h6>
              </div> 
              <p class="product-price1">₹169 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant3.jpg" alt="icon"class="product-img">
              <h6 class="tooltip">Miniature Rose, Button Rose (Any Color) - Plant </h6>
              </div> 
              <p class="product-price1">₹299 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant4.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Parijat Tree, Parijatak, Night Flowering Jasmine - Plant</h6>
              </div> 
              <p class="product-price1">₹359 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant5.jpg" alt="icon"class="product-img">
              <h6 class="tooltip">Damascus Rose, Scented Rose (Any Color) - Plant</h6>
              </div> 
              <p class="product-price1">₹299 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant6.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Elephant bush, Portulacaria afra, Jade plant (Green) - Succulent Plant</h6>
              </div> 
              <p class="product-price1">₹349 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant7.jpg" alt="icon" class="product-imgage">
              <h6 class="tooltip">Krishna Tulsi Plant, Holy Basil, Ocimum tenuiflorum (Black) - Plant</h6>
              </div> 
              <p class="product-price1">₹259 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant8.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Raat Ki Rani, Raat Rani, Night Blooming Jasmine - Plant</h6>
              </div> 
              <p class="product-price1">₹299 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant9.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Madhumalti Dwarf, Rangoon Creeper - Plant</h6>
              </div> 
              <p class="product-price1">₹369 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>   
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant10.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Piper Betel, Maghai Paan - Plant</h6>
              </div> 
              <p class="product-price1">₹311 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant11.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Lemon Grass - Plant</h6>
              </div> 
              <p class="product-price1">₹298 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant12.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Rosemary - Plant</h6>
              </div> 
              <p class="product-price1">₹249 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant13.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Syngonium (Pink) - Plant</h6>
              </div> 
              <p class="product-price1">₹169 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
            <?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "planto");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='grid-product'>
                <div class='img-name plant3'>
                  <img src='" . $row['image_filename'] . "' alt='icon' class='product-img'>
                  <h6 class='tooltip'>" . $row['name'] . " - Plant </h6>
                </div> 
                <p class='product-price1'>₹<scan class='product-price'>" . number_format($row['price'], 2) . "</scan> <button class='add-to-cart'><i class='fa-solid fa-cart-plus'></i> Add to cart</button></p>
              </div>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant14.jpg" alt="icon" class="product-img">
              <h6 class="tooltip">Chlorophytum, Spider Plant - Plant</h6>
              </div> 
              <p class="product-price1">₹285 <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button></p>
            </div>
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
    </div>

</body>
</html>