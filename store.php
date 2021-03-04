<?php

session_start();


require_once ('component.php');
require_once ("mysqli_connect.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])){
        $_SESSION["id"]= $_POST['product_id'];
        header("Location: cart.php");

    }

}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.html" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-store"></i> Book Store
            </h3>
        </a>
        <a href="store.php" class="navbar-brand">
            <h5 class="px-5">
                <i class="fas fa-book"></i> Books
            </h5>
        </a>
        

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        
                    </h5>
                </a>
            </div>
        </div>

    
</nav>


<div class="container">
        <div class="row text-center py-8 ">
            <?php
                $q = "select userid, bookname, price, quantity, image from bookstore";
                $r = mysqli_query($dbc, $q) or die (mysqli_error($dbc));
               
               $num = mysqli_num_rows($r);
               
               if ($num > 0) {
                   while($row = $r->fetch_assoc()) {
                    component($row['bookname'], $row['price'], $row['image'], $row['userid']);
                    // echo $row["bookname"]. "<img src=" . $row["image"]. ">";

                   }                  
                   
           } else {
             echo "0 results";
           }               
            // $result = $database->getData();
            //     while ($row = mysqli_fetch_assoc($result)){
            //         component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
            //     }
            ?>
        </div>
</div>
</body>
</html>