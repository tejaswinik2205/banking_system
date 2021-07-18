<!DOCTYPE html>
<html>
<head>
    <title>Reciept</title>
    <meta charset="utf-8">
          <meta content="width=device-width, initial-scale=1.0" name="viewport">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="css/nav.css">
          <meta http-equiv = "refresh" content = "5; url = index.html" />
    
    <style>

        body {
               margin: 0;
               font-family: Arial, Helvetica, sans-serif;
        }
        .card {
              
              box-shadow: 10px 10px 10px 10px rgba(0, 0, 0, 0.2);
              border-radius: 25px;
              max-width: 500px;
              max-height: 600px;
              margin: auto;
              background-color: white;
              text-align: center;
              font-family: arial;
                }
        .brand{
            font-family: 'Times New Roman', Times, serif; 
            color:black;
            text-align:center;
        }
        p{
            text-align:center;
            font-size:17px;
            margin: auto;
        }

        .section-bg {
          background-color: #fef8f5;
        }

         a {
          color: #eb5d1e;
        }

        a:hover {
          color: #ef7f4d;
          
        }
                                
     </style>
</head>
<body>
<div class="topnav" id="myTopnav">
    <a  class="brand" href="index.html"><i><b>Easy Transfer</b></i></a>
    <a href="index.html" ><b>Home</b></a>
    <a href="transfer_hist.php" ><i ></i><b>Transaction History</b></a>
    <a href="customer_details.php" ><i> </i><b>Customers Details</b></a>
    <a href="index.html#aboutus"><b>About Us</b></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
</div>
    <section class="section-bg">
      <br>

    <?php
      
      include 'connect_backend.php';
      $result = mysqli_query($conn,"SELECT * from transaction order by srno desc LIMIT 01"); 
    
     while($rows = mysqli_fetch_array($result))
    {
        ?>       
       
      <div class="card">
        <img  src="img/new.jpg" style= "width:100; height:100;"> 
            <a><h3>From <?php echo $rows['Receiver'] ?> </h3></a> 
            <a><h2> ₹ <?php echo $rows['balance']?>.00 </h2></a> 
           <h3>✔️ Completed <?php echo $rows['Date-Time'] ?> </h3>
           <hr>

            <h2 class="brand"><i>Easy Transfer</i></h2>
             <p style="font-size:20px;">&nbsp;&nbsp;<b>Transaction ID</b></><br>
             &nbsp;&nbsp;&nbsp;<a style="color:#696969;"><?php echo $rows['srno'] ?></a>
             <br>
             <p style="font-size:18px;">&nbsp;&nbsp;
                 <b>From: <?php echo $rows['Sender_name']?></b></p>
             <br>
            
             <p style="font-size:18px;">&nbsp;&nbsp;
                 <b>To:<?php echo $rows['Receiver'] ?></b></p>
                                                                  
                 <h2 class="brand"><i>... ThankYou ... </i></h2>
                   <br>
               
       </div>
      <?php 
       }
      ?>  
       <center><a id="blink" style="color: green; align:center"><h4>YOU WILL GET AUTOMATICALLY REDIRECTED TO HOMEPAGE IN 5 sec....!!!</h4></a></center>
      
      </section>
     
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