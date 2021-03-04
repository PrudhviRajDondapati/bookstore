<?php

session_start();



require_once ("mysqli_connect.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(empty($_POST['firstname'])){
    echo "<script type='text/javascript'> alert('Please Enter First name');  </script>";
  }elseif(empty($_POST['email'])){
    echo "<script type='text/javascript'> alert('Please Enter email');  </script>";
  }elseif(empty($_POST['address'])){
    echo "<script type='text/javascript'> alert('Please Enter address');  </script>";
  }elseif(empty($_POST['city'])){
    echo "<script type='text/javascript'> alert('Please Enter city');  </script>";
  }elseif(empty($_POST['state'])){
    echo "<script type='text/javascript'> alert('Please Enter state');  </script>";
  }elseif(empty($_POST['zip'])){
    echo "<script type='text/javascript'> alert('Please Enter ZIP');  </script>";
  }elseif(empty($_POST['city'])){
    echo "<script type='text/javascript'> alert('Please Enter City');  </script>";
  }elseif(empty($_POST['cardname'])){
    echo "<script type='text/javascript'> alert('Please Enter the name on the card');  </script>";
  }elseif(empty($_POST['cardnumber'])){
    echo "<script type='text/javascript'> alert('Please Enter the Card Number');  </script>";
  }elseif(empty($_POST['expmonth'])){
    echo "<script type='text/javascript'> alert('Please Enter the expiry Month');  </script>";
  }elseif(empty($_POST['expyear'])){
    echo "<script type='text/javascript'> alert('Please Enter the Expiry year');  </script>";
  }elseif(empty($_POST['cvv'])){
    echo "<script type='text/javascript'> alert('Please Enter CVV');  </script>";
  }else {
    $firstname= $_POST['firstname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $q1 = "INSERT INTO orders VALUES(null, '$firstname', '$email', '$address')";
    $r1 = mysqli_query($dbc, $q1) or die (mysqli_error($dbc));

    $temp1=$_SESSION["id"];
    $q2 = "Update bookstore SET quantity=quantity-1 WHERE userid = '$temp1'";
    $r2 = mysqli_query($dbc, $q2) or die (mysqli_error($dbc));
    echo "<script type='text/javascript'> alert('Thank You For your order');  </script>";
    header("Location: thankyou.html");


  }




  
  }


  

//     if (isset($_POST['add'])){
//         $_SESSION["id"]= $_POST['product_id'];
//         header("Location: cart.php");

//     }

// }



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

    <link rel="stylesheet" href="cart.css">
    
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
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="cart.php" method= "post">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa">&#xf19c;</i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fab fa-cc-visa" style="color:navy;"></i>
              <i class="fab fa-cc-amex" style="color:blue;"></i>
              <i class="fab fa-cc-mastercard" style="color:red;"></i>
              <i class="fab fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Continue to checkout" name="submit" class="btn">
      </form>
    </div>
  </div>
  <?php
        
        $temp = $_SESSION["id"];
        $q = "select userid, bookname, price, quantity, image from bookstore where userid = '$temp'";
        $r = mysqli_query($dbc, $q) or die (mysqli_error($dbc));
        
        $num = mysqli_num_rows($r);
        
        if ($num > 0) {
            while($row = $r->fetch_assoc()) {
            // echo $row["bookname"]. "<img src=" . $row["image"]. ">";
            $bookname = $row["bookname"];
            $price = $row["price"];
            $element1 = "
              <div class=\"col-25\">
              <div class=\"container\">
                <h4> Cart
                  <span class=\"price\" style=\"color:black\">
                    <i class=\"fa fa-shopping-cart\"></i>
                    <b>1</b>
                  </span>
                </h4>
                <p>
                  <h5> $bookname 
                  <span class=\"price\"> $price </span>
                  </h5> 
                  
                </p>
                <hr>
                <p>Total <span class=\"price\" style=\"color:black\"><b> $price </b></span></p>
              </div>
            </div>
          </div>
          ";
          echo $element1;
          


           

            }                  
            
    } else {
      echo "0 results";
    }               
            
    ?>

</body>
</html>
