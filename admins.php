<?php
session_start();

if (isset($_SESSION['status'])) {
    echo "<script>alert('Welcome on admin page as .')</script>";

    unset($_SESSION['status']);
}

if (!isset($_SESSION['admin'])) {
  header("Location: http://localhost/nursery2.0/index.php");
  exit;
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
      <div class="subnav">
      <li><a href="index.php">Categories</a></li>
      <div class="sub-menu-1">
          <ul>
                        <li><a href="#section1"><i class="fa-solid fa-leaf"></i>   Air Plants</a></li>
                        <li><a href="#section2"><i class="fa-solid fa-leaf"></i>   Aquatic Plants</a></li>
                        <li><a href="#section3"><i class="fa-solid fa-leaf"></i>   Herb plants</a></li>
                        <li><a href="#section4"><i class="fa-solid fa-leaf"></i>   Fruit plants</a></li>
                        <li><a href="#section5"><i class="fa-solid fa-leaf"></i>   Flower plants</a></li>
                        <li><a href="#section6"><i class="fa-solid fa-leaf"></i>   Bonsai plants</a></li>
                      </ul>        
                    </li></div>
      </div>
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
          <div class="subnav">
          <li><a class="menu__item" href="index.php">Categories</a></li>
          <div class="sub-menu-1">
          <ul>
                        <li><a href="#section1"><i class="fa-solid fa-leaf"></i>   Air Plants</a></li>
                        <li><a href="#section2"><i class="fa-solid fa-leaf"></i>   Aquatic Plants</a></li>
                        <li><a href="#section3"><i class="fa-solid fa-leaf"></i>   Herb plants</a></li>
                        <li><a href="#section4"><i class="fa-solid fa-leaf"></i>   Fruit plants</a></li>
                        <li><a href="#section5"><i class="fa-solid fa-leaf"></i>   Flower plants</a></li>
                        <li><a href="#section6"><i class="fa-solid fa-leaf"></i>   Bonsai plants</a></li>
                      </ul>        
                    </li></div>
      <li><a href="add_product.php">ADD product</a></li>
         <li><a href="users.php">customer_info</a></li>
          <li><a href="about.html">About</a></li>
          </ul>
          </div>
          <div class="wrap">
          <div class="input-box">
      <i class="uil uil-search"></i>
      <input  type="text" id="inp" placeholder="Search here..." />
      <button class="button">Search</button>
    </div></div>
          <div class="box1" >
              <a href="" class="btn-search" style="color:green;"><i class="fa-solid fa-user"></i>  <?php echo $_SESSION['admin'] ?></a>
          <a href="logout.php" onclick="return confirm('Are You sure you want to logout?');"><button  class="btn-search"><i class="fa-solid fa-sign-out"></i> Logout</button></bytton></a>
                    <button class="btn-search cart1"  id="cart-icon"><i class="fa-solid fa-cart-shopping"></i> cart</i></button>
                  <div class="cart">
                    <h2 class="cart-title">Your cart</h2>
                    <div class="cart-content">
                    </div>
                    <div class="total">
                      <div class="total-title">Total</div>
                      <div class="total-price">₹0</div>
                    </div>
                    <button type="button" class="btn-buy">Buy Now</button>
                    <i class="fa-solid fa-xmark" id="close-cart"></i>
                    <script src="cart.js"></script>
                  </div>

      </div>
      
      </div>
        <div class="products">
          <h2 style="margin-left: 25px;padding:10px">Trending</h2>
          <hr>
          <div class="product-grid">
          <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant1.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Jasminum sambac, Mogra, Arabian Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹299</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant2.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Peace Lily, Spathiphyllum - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹169</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant3.jpg" alt="icon"class="product-img">
              <h6 class="product-title tooltip">Miniature Rose, Button Rose (Any Color) - Plant <span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹299</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant4.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Parijat Tree, Parijatak, Night Flowering Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹359</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant5.jpg" alt="icon"class="product-img">
              <h6 class="product-title tooltip">Damascus Rose, Scented Rose (Any Color) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹299</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant6.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Elephant bush, Portulacaria afra, Jade plant (Green) - Succulent Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹349</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant7.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Krishna Tulsi Plant, Holy Basil, Ocimum tenuiflorum (Black) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹259</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant8.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Raat Ki Rani, Raat Rani, Night Blooming Jasmine - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹299</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant9.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Madhumalti Dwarf, Rangoon Creeper - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹369</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>   
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant10.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Piper Betel, Maghai Paan - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹311</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant18.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Portulaca, 9 O Clock (Any Color) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹139</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant19.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Clitoria Ternatea, Gokarna (Blue) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹248</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant20.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Krishna Kamal, Passion flower, Passiflora incarnata (Purple) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹274</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant21.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Aloe vera - Succulent Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹260</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant22.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Areca Palm (Small) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹144</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
            </div>
            <div class="grid-product">
              <div class="img-name plant3">
              <img src="./img/plant23.jpg" alt="icon" class="product-img">
              <h6 class="product-title tooltip">Citronella, Odomas - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
              </div> 
              <p class="product-price1"><scan class="product-price">₹255</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
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
                  <h6 class='product-title tooltip'>" . $row['name'] . " - Plant </h6>
                </div> 
                <p class='product-price1'><scan class='product-price'>₹" . number_format($row['price'],2) . "</scan> <button class='add-to-cart'><i class='fa-solid fa-cart-plus'></i> Add to cart</button></p>
              </div>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>


<section class="shop_container" id="section1">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Air Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Air Plant, Tillandsia ionantha Guatemala (Large) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹359</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Ananas - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹664</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Zinn - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹1320 </scan><button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Loving Touch - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹859</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant5.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Living Pearls - Air Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹1009</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img1/plant6.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Air Plant, Tillandsia ionantha var. ionantha - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹359</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section>   
<section class="shop_container" id="section2">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Aquatic Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Lotus, Nelumbo Nucifera (Pink) - Plant<span class="tooltip-text">Images are for reference purposes only. Actual products may vary in shape or appearance based on climate, age, height, etc. The product is replaceable but not returnable.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹878</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Water Lily, Nymphae Nouchali (Blue) - Plant<span class="tooltip-text">nouchali is a day-blooming non-viviparous plant with submerged roots and stems. Part of the leaves are submerged, while others rise slightly above the surface. The leaves are round and green on top; they usually have a darker underside.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹304</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Water Canna, Thalia Dealbata - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹470</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Victoria lily - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹498</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant5.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Water Coleus indoor plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹480</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant6.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Philodendron<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹370</scan><button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img2/plant7.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Peace Lily<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹740</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 
<section class="shop_container" id="section3">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Herb Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Mexican mint, Patharchur, Ajwain Leaves - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹230</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Thyme, Thymus vulgaris - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹260</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Badi Elaichi, Black Cardamom - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹411</scan><button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Thai Basil, Ocimum thyrsiflora - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹208</scan><button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant5.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Brahmi, Gotu Kola, Centella asiatica - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹300</scan><button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant6.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Shatavari Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹466</scan><button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img3/plant7.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Live Tulsi Herbal Live Plant | Tulsi Plant (Rama Tulsi & Krishna Tulsi) with Pots<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹201</scan><button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 
<section class="shop_container" id="section4">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Fruit Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Kagzi Nimboo, Lemon Tree - Plant<span class="tooltip-text">Kagzi Lime is popular for its beautiful appearance and pleasing flavour and for its excellent food qualities.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹505</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Nimboo, Lemon Tree - Plant<span class="tooltip-text">Growing Lemon plant is an easy way to add a tropical flair to your garden. When you know its unique health benefits, and how to care for Lemon plants, you will be rewarded with many years of lovely fruit.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹399</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Pomegranate, Annar, Anar (Grafted) - Plant<span class="tooltip-text">Enjoy the delicious and nutritious watery, red arils of Pomegranate by growing easily at your home.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹369</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Orange Fruit, Santra ( Grafted ) - Plant<span class="tooltip-text">Orange trees are widely grown in tropical and subtropical climates for their sweet fruit. The fruit of the orange tree can be eaten fresh, or processed for its juice or fragrant peel.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹549</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant5.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Guava Tree, Amrud, Psidium guajava (Grown through seeds) - Plant<span class="tooltip-text">Enjoy the delicious and nutritious watery, red arils of Pomegranate by growing easily at your home.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹232</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant6.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Mango Tree (Kesar, Grafted) - Plant<span class="tooltip-text">Mango Kesar smell is its most distinguishing feature, the colour of the pulp resembling saffron, the spice it is named after.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹454</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant7.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Grape, Angoor (Seedless) - Plant<span class="tooltip-text">Mango Kesar smell is its most distinguishing feature, the colour of the pulp resembling saffron, the spice it is named after.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹508</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img4/plant8.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Dragon Fruit - Plant<span class="tooltip-text">Mango Kesar smell is its most distinguishing feature, the colour of the pulp resembling saffron, the spice it is named after.</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹375</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 

<section class="shop_container" id="section5">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Flower Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img5/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Rose (Orange) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹299</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img5/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">5 Best Fragrant Plants<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹1560</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img5/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Madhumalti Dwarf, Rangoon Creeper - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹333</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img5/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Pentas (White) - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹278</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img5/plant5.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Set of 3 Outdoor Flowering Plants for Beautiful Garden<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹820</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img5/plant6.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">greennursery Bird of Paradise Plant  (Hybrid, Pack of 1)<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹180</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 
<section class="shop_container" id="section6">
<br><br><br><br><br><br><br><br>
              <scan class="producth">Bonsai Plants</scan>     
                <hr class="hr3">
              <div class="product-grid">
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img6/plant1.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Ficus microcarpa Bonsai- Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹3980</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img6/plant2.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Ficus Bonsai Vertical Braided Arrangement - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹7465</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img6/plant3.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Banyan tree Bonsai - Plant<span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹2860</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
                <div class="grid-product">
                  <div class="img-name plant3">
                  <img src="./img6/plant4.jpg" alt="icon" class="product-img">
                  <h6 class="product-title tooltip">Ficus Bonsai <span class="tooltip-text">Information about the plant goes here</span></h6>
                  </div> 
                  <p class="product-price1"><scan class="product-price">₹743</scan> <button class="add-to-cart"><i class="fa-solid fa-cart-plus"></i>  Add to cart</button><p>
                </div>
</section> 
   
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
