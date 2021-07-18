<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Transaction History</title>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="css/nav.css">
        <link href="css/style.css" rel="stylesheet">

        <style>
            body{
                  background-color: white;
            }

            input[type=text]{
                width:40%;
                height:15%;
                border:1px;
                border-radius:05px;
                padding: 8px 15px 8px 15px;
                margin: 10px 0px 15px 0px;
                box-shadow:1px 1px 2px 1px  grey;
            }

            input[type=submit]{
                background-color: #4CAF50;
                color:white;
                width:13%;
                height:15%;
                border:1px;
                margin: 4px 2px;
                border-radius:05px;
                box-shadow:1px 1px 2px 1px  grey;
            }

            #users {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                border-radius:15px 50px 30px 5px;
            }

            #users td, #users th {
                border: 1px solid #ddd;
                padding: 8px;
                text-align:center;
            }

            #users tr:nth-child(even){
                background-color: #f2f2f2;
            }

            #users tr:hover {
                background-color: #ddd;
            }

            #users th {
                padding-top: 12px;
                padding-bottom: 12px;
                font-family:Arial, Helvetica, sans-serif;
                background-color: green;
                color: white;
            }

        </style>
    </head>

    <body>
     
    <div class="topnav" id="myTopnav">
        <a  class="brand" href="index.html"><i><b>FlexCube Banking</b></i></a>
        <a href="index.html" ><b>Home</b></a>
        <a href="transfer_hist.php" class="active"><i ></i><b>Transaction History</b></a>
        <a href="customer_details.php" ><i> </i><b>Customers Details</b></a>
        <a href="index.html#aboutus"><b>About Us</b></a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
        </a>
    </div>

    <center>
    <section class="section-bg">    
    <div class="section-title" data-aos="fade-up">
      <h2>Transaction History</h2>
       <p>Credited & Debited </p>
    </div>  
     
    <form  method="POST">
                <input type="text" name="id"  placeholder="Enter customer name">
                <input type="submit" name="search" value="Search" style="background-color:green color:white;"> </br>
     </form>
    
    <?php
       include "connect_backend.php";
        
       if(isset($_POST['search']))
       {
           $id=$_POST['id'];
           $sql="SELECT * from transaction where Sender_name='$id'";
           $query  =mysqli_query($conn,$sql);

           $sql1="SELECT * FROM transaction where Receiver='$id' ";
           $result=mysqli_query($conn,$sql1);

    ?>
    <br>
        <table id="users" >
        <tr>
                       <th>TRANSACTION ID</th>
                       <th>FROM</th>
                       <th>TO</th>
                       <th>AMOUNT</th>
                       <th>DATE & TIME</th>
                     </tr>
            
    <?php
        while($rows=mysqli_fetch_assoc($query))
        {
    ?>
                   
        <tr>
        <td><?php echo $rows['srno'] ?></td>
        <td><?php echo $rows['Sender_name'] ?></td>
        <td><?php echo $rows['Receiver'] ?></td>
        <td>₹ <?php echo $rows['balance'] ?></td>
        <td><?php echo $rows['Date-Time'] ?></td>
        </tr>    
     
    <?php
        }
        while($rows=mysqli_fetch_array($result))
        {
     ?> 
        <tr>
        <td><?php echo $rows['srno'] ?></td>
        <td><?php echo $rows['Sender_name'] ?></td>
        <td><?php echo $rows['Receiver'] ?></td>
        <td>₹ <?php echo $rows['balance'] ?></td>
        <td><?php echo $rows['Date-Time'] ?></td>
        </tr>    

    <?php    
        }

    }
    ?>
    </table>
</section>
</center>

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
<br>

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