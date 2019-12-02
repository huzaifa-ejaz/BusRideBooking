<?php
    require 'dbconfig.php';
?>
<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Expresso|My Details</title>
        <link rel="stylesheet" type="text/css" href="styles/navbar-styles.css">
        <link rel="stylesheet" type="text/css" href="styles/footer-style.css">
        <link rel="stylesheet" type="text/css" href="styles/forms-styles.css">

    </head>
    <body>
            <ul>
                    <li ><a href="home.html">Home</a></li>
                    <li class="dropdown" class="active">
                            <a href="javascript:void(0)" class="dropbtn">Booking</a>
                            <div class="dropdown-content">
                              <a href="book-ride-start-end.html">Book A New Ride</a>
                              <a href="booked-customer-info.html">I've Alredy Booked</a>
                            </div>
                          </li>
                    <li><a href="help.html">Help</a></li>
                        
                </ul>
        <form method="post">
            Email:
                <input type="email" name="cemail" size="20" maxlength="35" />
                  
            Name:
                <input type="text" name="cname" size="30" maxlength="35"/>
           
            Mobile:
                <input type="text" name="mobile" size="30" maxlength="35"/>
             
            Number of Seats: 1
        <input type="submit" name="bookride" value="Book Now"/>   
        </form>
        <?php
            
            if(isset($_REQUEST["bookride"])) {
                 $email = $_POST["cemail"];
                 $name = $_POST["cname"];
                 $mobile = $_POST["mobile"];
                 
                 $query = "insert into customer(email,name,mobile) values('$email','$name','$mobile')";
                 $result = mysqli_query($con,$query);
                if(!$result) {
                    exit("Query could not be executed") ;
                }

                $result = mysqli_query($con,"select cr_id from customer where email='$email'");
                $row = mysqli_fetch_assoc($result);
                $cr_id = $row['cr_id'];
                

                $ride_id = $_SESSION["ride_id"];
                
                
                $query_booking = "insert into booking(cr_id,ride_id,status) values ('$cr_id','$ride_id','booked')";
                $result = mysqli_query($con,$query_booking);
                if(!$result) {
                    exit("Query could not be executed") ;
                }

                $seats_update = "update ride set seats_left = seats_left -1 where ride_id = '$ride_id'";
                $result_update = mysqli_query($con,$seats_update);
                if(!$result_update) {
                    exit("Query could not be executed") ;
                                   }

                $result = mysqli_query($con,"select bk_id from booking where cr_id='$cr_id' and ride_id='$ride_id' ");
                $row = mysqli_fetch_assoc($result);
                $bk_id = $row['bk_id'];
                $_SESSION["bk_id"] = $bk_id;

                header("location:booked-customer-ride.php");
                
            }
             
               
                    
                   
        ?>
        
    </body>
</html>