<?php
require("mysqli_connect.php");
    
    $q = "select userid, bookname, quantity, image from bookstore";
     $r = mysqli_query($dbc, $q) or die (mysqli_error($dbc));
    
    $num = mysqli_num_rows($r);
    
    if ($num > 0) {
        while($row = $r->fetch_assoc()) {
   
    echo $row["bookname"]. "<img src=" . $row["image"]. ">";
  }
} else {
  echo "0 results";
}
//        session_start();
//        $_SESSION["login"]=true;
//        header("Location: account.php");
//        
//        
//    }else{
//        echo "Wrong login credentials. Please try again";
//        header("Location: index.html");
//            
//}

?>