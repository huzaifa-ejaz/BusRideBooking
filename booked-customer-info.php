<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Expresso|Check Out My Ride</title>
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
        <div>
            <form   method="post">
                My Booking ID:
                    <input type="text" name="bk_id" size="10" maxlength="10">
                
                My Email:
                        <input type="text" name="email" size="30" maxlength="50">
                <a href='booked-customer-ride.php'><input type="submit" name="checkmyride" value="Check Out My Ride"></a>
                
            </form>
            
            <?php
                if(isset($_POST["checkmyride"])) {
                    
                    

                     $bk_id = $_POST["bk_id"];
                     $email = $_POST["email"];
                     $_SESSION["bk_id"] = $bk_id;
                     $_SESSION["email"] = $email;

                     header("location:booked-customer-ride.php");

                  
                }
            ?>
        </div>
    </body>
</html>