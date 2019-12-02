<?php
// Start the session
session_start();
?>
<?php
    require 'dbconfig.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Expresso|Check Out My Ride</title>
        <link rel="stylesheet" type="text/css" href="styles/navbar-styles.css">
        <link rel="stylesheet" type="text/css" href="styles/footer-style.css">
        <link rel="stylesheet" type="text/css" href="styles/show-rides-styles.css">

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
        <h2>My Booked Ride<h2>
        <?php
                $email = $_SESSION["email"];
                $bk_id = $_SESSION["bk_id"];

                

                $get_cr_id = "select cr_id from customer where email='$email'";
                $result = mysqli_query($con,$get_cr_id);
                if(!$result) {
                     exit("Query could not be executed!");
                }
                $row = mysqli_fetch_assoc($result);
                $cr_id_from_email = $row['cr_id'];

                
                

                $get_cr_id2 = "select cr_id from booking where bk_id='$bk_id'";
                $result = mysqli_query($con,$get_cr_id2);
                if(!$result) {
                     exit("Query could not be executed!");
                }
                $row = mysqli_fetch_assoc($result);
                $cr_id_from_booking = $row['cr_id'];

                
                

                if($cr_id_from_email = $cr_id_from_booking) {
                       $get_ride_id = "select ride_id from booking where bk_id='$bk_id'";
                       $result = mysqli_query($con,$get_ride_id);
                       if(!$result) {
                             exit("Query could not be executed!");
                        }
                        $row = mysqli_fetch_assoc($result);
                        $ride_id = $row['ride_id'];
                        
                        $date_format = mysqli_real_escape_string($con,"%d/%m/%y");
                        $time_format = mysqli_real_escape_string($con,"%l:%i %p");
                        $get_ride = "select ri.ride_id,date_format(ri.start_time, '$date_format') startd, date_format(ri.start_time,'$time_format') startt, ri.price,ro.origin,ro.destination,bo.bk_id,bo.status from ride ri,route ro,booking bo where ri.ride_id='$ride_id' and ro.route_id = ri.route_id and bo.bk_id ='$bk_id'";
                        $result = mysqli_query($con,$get_ride);
                        if(!$result) {
                             exit("Query could not be executed!");
                         }
                         $row = mysqli_fetch_assoc($result);
                         echo '
                              <div class="ride-detail" id="booked-ride">
                                     <div class="od-line"></div>
                                     <div class="origin-box">'.$row["origin"].'</div>
                                     <div class="dest-box">'.$row["destination"].'</div>
                                     <div class="fare-box">'.$row["price"].'PKR</div>
                                     <div class="date-box">'.$row["startd"].'</div>
                                     <div class="time-box">'.$row["startt"].'</div>
                                     <div class="seat-box"> Booking ID: '.$row["bk_id"].'</div>
                                     <img src="images/money-icon.png" class="money-icon">
                                     <input type="hidden" value='.$row["ride_id"].' name=ride_id>
                                     <div class="book-btn" class"status">'.$row["status"].'</div>
                              </div>
                              ';
                              $status = $row["status"];
                              $cmp = strcmp($status,"booked");

                  
                            if( $cmp === 0) {
                              
                               
                               echo '
                               <form method="post">
                               <button onclick="return confirm(\'Are you sure you want to cancel this booking?\');" type="submit" name="cancelbooking" value="Cancel">Cancel Booking</button>
                               <button onclick="return confirm(\'Are you sure you want to confirm this booking?\');" type="submit" name="confirmbooking" value="Confirm">Confirm Booking</button>
                               </form>
                               ';
                               
                               if(isset($_POST["cancelbooking"])) {
                                  $query = "update booking set status='cancelled' where bk_id='$bk_id'";
                                  $result = mysqli_query($con,$query);
                                  if(!$result) {
                                     exit("Query could not be executed!");
                                  }

                                  header("location:email-sent.html");
                               }
                               if(isset($_POST["confirmbooking"])) {
                                  $query = "update booking set status='confirmed' where bk_id='$bk_id'";
                                  $result = mysqli_query($con,$query);
                                  if(!$result) {
                                      exit("Query could not be executed!");
                                  }

                                header("location:email-sent.html");
                               }
                          }
                          
                            
                }else {
                  echo ' 
                      <div>
                      <p>We could not find your booking!</p>
                      <a href="booked-customer-info.php"><button type="button">Check Again</button></a>
                      <a href="book-ride-start-end.php"><button type="button">Book A New Ride</button></a>
                      </div>
                  
                  
                  ';
                }
              
            ?>
    </body>
</html>
