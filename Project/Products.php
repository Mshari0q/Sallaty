<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Products-Sallaty</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="images/logo-corp-prev.png" width="125px"></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="Products.html">Products</a></li>
                        <li><a href="Contact.html">Contact us</a></li>
                        <li><a href="Administrator.html">Administrator</a></li>
                        <li><a href="Account.html">Account</a></li>
                    </ul>
                </nav>
                <a href="Cart.html"><img src="images/Cart.png" width="50px" height="50px"></a>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <h1 class="lg-title">Sallaty products</h1>
            <p class="text-light">We offer a wide selection of fresh produce, meats, pantry staples, and household
                essentials.</p>

            <div class="product-items">
                <!-- product -->
                <?php
                //connect to database
                $conn = mysqli_connect("localhost", "root", "", "sallatydb");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                //retrieve data from the database
                $query = "SELECT * FROM product";
                $result = mysqli_query($conn, $query);

                //loop through the result set and display the information
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="product">
                        <div class="product-content">
                            <div class="product-img">
                                <img src="<?php echo $row['Image']; ?>" width="200px" height="200px">
                            </div>
                            <div class="product-btns">
                                <a href="Cart.html"><button type="button" class="btn-cart"> add to cart</a>
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-info-top">
                                <h2 class="sm-title"><?php echo $row['Description']; ?></h2>
                            </div>
                            <p class="product-name"><?php echo $row['Name']; ?></p>
                            <p class="product-price">SAR <?php echo $row['Price']; ?></p>
                        </div>
                    </div>
                <?php
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</body>

</html>