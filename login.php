<?php
   include('config.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST["txtUsername"]);
      $mypassword = mysqli_real_escape_string($conn,$_POST["txtPassword"]); 
      
      $sql = "SELECT userID FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row["active"];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION["login_user"] = $row["userID"];
         
         header("location: dashboard.php");
      }else {
         $info = "Your Login Name or Password is invalid";
      }
   }
   mysqli_close($conn);
?>

<html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/><link type="text/css" rel="stylesheet" href="css/logincss.css"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
      </head>
      
      <body>
      <nav>
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="enginemods.html">Engine Modifications</a></li>
            <li><a href="alloys.html">Alloy Modifications</a></li>
        </ul>
          <ul id="dropdown2" class="dropdown-content">
            <li><a href="seating.html">Seating and Comfort</a></li>
            <li><a href="entertainment.html">Interior Entertainment</a></li>
        </ul>
          <ul id="dropdown3" class="dropdown-content">
            <li><a href="shop.html">Clothing</a></li>
            <li><a href="carshop.html">Car Accessories</a></li>
        </ul>
        <div class="nav-wrapper">
            <a href="index.html" class="brand-logo">100% Ford</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.html">Home</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Exterior<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Interior<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="review.html">Review</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Shop<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="index.html">Home</a></li>
                <li><a href="enginemods.html">Engine Modifications</a></li>
                <li><a href="alloys.html">Alloy Modifications</a></li>
                <li><a href="seating.html">Seating and Comfort</a></li>
                <li><a href="entertainment.html">Interior Entertainment</a></li>
                <li><a href="review.html">Review</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="login.php">Login</a></li>
 
            </ul>
        </div>
    </nav>
          <div class="banner">
                <img class="bannerpic" src="assets/reviewbanner.jpg"> 
            <div class="banner-text">
                <h1>LOGIN</h1>  
            </div>
          </div>
          <div class="row">
    <form class="col s12">
        <h1 class="welcome">Welcome to 100% Ford Login</h1>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input name="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Username</label>
        </div>
        <div class="input-field col s6">
            <i class="material-icons prefix">chat_bubble</i>
          <input name="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Password</label>
        </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
          <i class="material-icons prefix">contact_mail</i>
          <input name="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Email</label>
        </div>
        </div>
    </form>
  </div>
    </body>
</html>
<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col s12">
                <h5 class="white-text">FIND AND CONTACT US ON SOCIAL MEDIA</h5>
                  <ul>
                  <a href="https://twitter.com/official100ford" class="fa fa-twitter"></a>
                  <a href="https://www.instagram.com/official100ford/?hl=en" class="fa fa-instagram"></a>
                  <a href="https://plus.google.com/u/0/102788440268858728741" class="fa fa-google"></a>
                </ul>
                <img src="assets/logofooter.png">  
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © Copyright Linzi Gould
            </div>
          </div>
        </footer>
<script>
$(document).ready(function() {
    Materialize.updateTextFields();
  });
</script>