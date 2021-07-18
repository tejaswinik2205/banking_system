<?php  
  include 'connect_backend.php';  
 if(isset($_POST["insert"]))  
 {  
      $Name = $_POST['c_name'];
      $Email =$_POST['email'];
      $Country=$_POST['country'];
      $Balance=$_POST['balance'];
      $query = "INSERT INTO customers(c_name,email,country,balance) VALUES ('$Name','$Email','$Country','$Balance')";  
      if(mysqli_query($conn, $query))  
      {  
           
         echo "<script> alert('Added Customer Successful');
         window.location='add_customer.php';
       </script>";
      }  
 }  
   
?>

<!DOCTYPE HTML>
<html lang='en'>
<head>
    <title>Add Customer</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/style.css" rel="stylesheet"> 
    
    <style>
    input[text]{
      width: 100%;
      height:30%;
      padding: 10px 18px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;

    }

    form 
    {
      width: 100;
      height:100;
      border: 6px solid #f1f1f1;
    }
    
    body 
    { 
       
        
           margin: 0px;
           padding: 0px;
           text-align: center;
           font-size: 15px;
           color: #000;
           font-family: sans-serif;
           font-weight: 300;
      }
      i.star{
          color:red;
      }

    </style>

</head>
<body>
    
<div class="topnav" id="myTopnav">
    <a  class="brand" href="index.html"><i><b>FlexCube Banking</b></i></a>
    <a href="index.html"><b>Home</b></a>
    <a href="transfer_hist.php" ><i ></i><b>Transaction History</b></a>
    <a href="customer_details.php" ><i> </i><b>Customers Details</b></a>
    <a href="index.html#aboutus"><b>About Us</b></a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
</div>
   
<section class="section-bg">  
<center> 
    <div class="section-title" data-aos="fade-up">
            <h2>Add Customer Details</h2>
            <p> </p>
    </div> 

    <table class="table table-bordered">    
    <form method="post" enctype="multipart/form-data">  
                        <label>FULL NAME:<i class="star">*</i></lable>
                        &nbsp;<input type="text" name="c_name" id="c_name" required maxlength="20" size="50"/>  
                        <br>
                        <br>
                        <lable>EMAIL ID:<i class="star">*</i></lable> 
                        <input type="text" name="email" id="email" required  maxlength="20" size="50"/>  
                        <br>
                        <br>
                        <lable>COUNTRY:<i class="star">*</i></lable> 
                        <input type="text" name="country" id="email" required  maxlength="20" size="50"/>  
                        <br>
                        <br>
                        <lable>Balance:<i class="star">*</i></lable> 
                        <input type="text" name="balance" id="balance" required  maxlength="20" size="50"/> 
                        <br>
                        <br > 
                        </h4></br><input type="submit" name="insert" id="insert" value="ADD RECORD " class="btn btn-success" />  
    </form>
    </table>  
</center> 
<br>
<br>
<br>
<br>
<br>
<br>
<p></p>
</section>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','jfif']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>