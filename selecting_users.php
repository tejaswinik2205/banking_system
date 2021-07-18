<?php 
   include 'connect_backend.php';
  
   if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



  
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

               
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE customers set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['c_name'];
                $receiver = $sql2['c_name'];
                $sql = "INSERT INTO transaction(`Sender_name`, `Receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);
                 


                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='reciept.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
 
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intital-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style type="text/css">
        button{
           border:none;
           background:#d9d9d9;
        }
     
     input["text"],input["number"]{
         background-color:skyblue;
     }

        button:hover{
           background-color:#777E8B;
           transform: scale(1.1);
           color:white;
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

    <div class="section-title" data-aos="fade-up">
                        <p> Welcome To Transfer Page</p>
    </div> 


            <?php
                include 'connect_backend.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            
    <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <center>
                    <h3>Sender Information</h3>

                    <b><p>Full Name:<?php echo $rows['c_name'] ?></p></b>  
                    <b><p>Email:<?php echo $rows['email'] ?></p></b>
                    <b><p>Country:<?php echo $rows['country']?></p></b>
                    <b><p>Balance:<?php echo $rows['balance'] ?></p></b>
                </center>
     
        </div>
        
        <div class="container">
        <br><br><br>
                <h3><p class="section-title" data-aos="fade-up">Transfer To</p></h3>
                <select name="to" class="form-control" required>
                    <option value="" disabled selected>Choose</option>
                    <?php
                        include 'connect_backend.php';
                        $sid=$_GET['id'];
                        $sql = "SELECT * FROM customers where id!=$sid";
                        $result=mysqli_query($conn,$sql);
                        if(!$result)
                        {
                            echo "Error ".$sql."<br>".mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <option class="table" value="<?php echo $rows['id'];?>" >
                        
                            <?php echo $rows['c_name'] ;?>
                        </option>                       
                    
                    <?php 
                        } 
                    ?>
                    <div>
                </select>
            <br>
            <br>
            <label><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
            <div class="text-center" >
            <button class="btn mt-3 btn btn-success" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
             
        </form>
    </div>
 </section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

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
  <small>&copy; Copyright 2021, Darshan Khaire</small>
  <br>
</footer>

</body>
</html>