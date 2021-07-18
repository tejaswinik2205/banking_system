<!Doctype html>
  <html>
      <head>
          <title> Customers Details </title>
          <meta charset="utf-8">
          <meta content="width=device-width, initial-scale=1.0" name="viewport">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
          <link rel="stylesheet" href="css/nav.css">
          <link rel="stylesheet" href="css/style.css" >
          <link rel="stylesheet" hef="css/service.css">
          <style>
                    
            .card {
              box-shadow: 10px 10px 10px 10px rgba(0, 0, 0, 0.2);
              border-radius: 25px;
              font-family:"Open Sans", sans-serif;
              max-width: 500px;
              max-height: 600px;
              margin: auto;
              background-color: white;
              text-align: center;
              font-family: arial;
                }
                         
            .title {
              color: grey;
              font-size: 18px;
            }

            button {
              border: none;
              outline: 0;
              display: inline-block;
              padding: 8px;
              border-radius:0px 0px 25px 25px;  
              color: white;
              background-color: #4BB543;
              text-align: center;
              cursor: pointer;
              width: 100%;
              font-size: 18px;
            }

            h3{
                font-size:25px;
                color:orange;
            } 
            /*a {
              text-decoration: none;
              font-size: 22px;
              color: black;
            }*/

            button:hover, a:hover {
              opacity: 0.7;
            }


          </style>
        </head>
<body>
    
<div class="topnav" id="myTopnav">
    <a  class="brand" href="index.html"><i><b>FlexCube Banking</b></i></a>
    <a href="index.html" ><b>Home</b></a>
    <a href="transfer_hist.php" ><i ></i><b>Transaction History</b></a>
    <a href="customer_details.php" class="active"><i> </i><b>Customers Details</b></a>
    <a href="index.html#aboutus"><b>About Us</b></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
</div>

   <section id="services" class="services section-bg">
    <div class="container" style="align-items: center;">
     
    <div class="section-title" data-aos="fade-up">
      <h2>Customer Details</h2>
       <p> </p>
    </div>  

      <?php
      
        include 'connect_backend.php';

        //session_start();
        $sql = "SELECT id,c_name, email, country,balance FROM customers";
          $result = $conn->query($sql);

          if ($result->num_rows >0){
              while($rows =$result->fetch_assoc()){
      ?>

      <br>
     <div class="card">
              <h1><?php echo $rows["c_name"] ?></h1>
              <b><p class="title_card">Customer ID:<?php echo $rows["id"] ?></p></b>
              <b><p class="title_card"><?php echo $rows["email"] ?></p></b>
              <b><p class="title_card"><?php echo $rows["country"] ?></p></b>
              <b><p><i class="fa fa-rupee"></i>&nbsp;<?php echo $rows["balance"] ?></p></b>
              <div style="margin: 24px 0;">
              <a href="#"><i class="fa fa-dribbble"></i></a> 
              <a href="#"><i class="fa fa-twitter"></i></a>  
              <a href="#"><i class="fa fa-linkedin"></i></a>  
              <a href="#"><i class="fa fa-facebook"></i></a> 
            </div>
            <p><a href="selecting_users.php?id=<?php echo $rows['id']; ?>"><button class="fa fa-exchange"> Transfer Money</button></a></p>
     </div>
        
      <?php
                   
          }
        }
        else{
            
                echo "0 result in database";
              }
        
      ?>
    </section>
    
<script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
    </script>

<footer>
<div>
  <a href="https://www.youtube.com/"><i class="fa fa-youtube-play" style="color:white"></i></a>&nbsp;
  <a href="https://www.linkedin.com/in/tejaswini-kadam-035128207"><i class="fa fa-linkedin-square" style="color:white"></i></a>&nbsp;
  <a href="https://www.google.com/"><i class="fa fa-google" style="color:white"></i></a>&nbsp;
  <a href="https://github.com/tejaswinik2205"><i class="fa fa-github" style="color:white"></i></a>&nbsp;
  </div> 
  <small>&copy; Copyright 2021, Tejaswini Kadam</small>
  <br>
</footer>

</body>
</html>