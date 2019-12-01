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
        <title>Expresso|Email Sent</title>
        <link rel="stylesheet" type="text/css" href="styles/navbar-styles.css">
        <link rel="stylesheet" type="text/css" href="styles/footer-style.css">
        <link rel="stylesheet" type="text/css" href="styles/msg-styles.css">
        
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
        <?php
           
           
           $get_cr_id = "select cr_id from customer where email='$email'";
           $result = mysqli_query($con,$get_cr_id);
           if(!$result) {
             exit("Query could not be executed!");
           }
           $row = mysqli_fetch_assoc($result);
           $cr_id_from_email = $row['cr_id'];

           

           if($cr_id_from_email = $cr_id_from_booking) {
                 $get_ride_id = "select ride_id from booking where bk_id='$bk_id'";
                 $result = mysqli_query($con,$get_ride_id);
                 if(!$result) {
                      exit("Query could not be executed!");
                  }
                  $row = mysqli_fetch_assoc($result);
                  $ride_id = $row['ride_id'];

                  $get_ride = 'select ride_id,date_format(start_time,"%d/%m/%y") startd, date_format(start_time,"%l:%i %p") startt, price,seats_left from ride where ride_id="$ride_id"';
                  $result = mysqli_query($con,$get_ride);
                  if(!result) {
                    exit("Query could not be executed!");
                  }
                  $row = mysqli_fetch_assoc($result);
                  echo ' 
                     <div class="ride-detail">
                     <div class="od-line"></div>
                     <div class="origin-box">'.$_SESSION["ogn"].'</div>
                     <div class="dest-box">'.$_SESSION["dstn"].'</div>
                     <div class="fare-box">'.$row["price"].'PKR</div>
                     <div class="date-box">'.$row["startd"].'</div>
                     <div class="time-box">'.$row["startt"].'</div>
                     <div class="seat-box">'.$row["seats_left"].' Seats Left</div>
                     <img src="images/money-icon.png" class="money-icon">
                     <input type="hidden" value='.$row["ride_id"].' name=ride_id>
                     <input type="submit" value="Book Now" name="booknow" class="book-btn">
                            </div>
                            </form>';
                    echo '
                        <form>
                        <button onclick="return confirm("Are you sure you want to cancel this booking?");" type="submit" name="cancelbooking" value="Cancel"></button>
                        <button onclick="return confirm("Are you sure you want to confirm this booking?");" type="submit" name="confirmbooking" value="Confirm"></button>
                        </form>
                        
                    ';
           }else {

           }



        ?>
    </body>
</html>