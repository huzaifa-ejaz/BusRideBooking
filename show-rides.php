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
        <title>Bussed|Rides</title>
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
        <h2>Rides: <?php echo $_SESSION["ogn"] ?> to <?php echo $_SESSION["dstn"] ?> </h2>
        <?php
            $ogn = $_SESSION["ogn"];
            $dstn = $_SESSION["dstn"];

            $get_route_id = "select route_id from route where origin='$ogn' and destination='$dstn'";
            $result = mysqli_query($con,$get_route_id);
            if(!$result) {
                  exit("Query could not be executed!");
             }
             if (mysqli_num_rows($result)>0) {
                    $row = mysqli_fetch_assoc($result);
                    $route_id = $row['route_id'];
                    
             
                   $date_format = mysqli_real_escape_string($con,"%d/%m/%y");
                   $time_format = mysqli_real_escape_string($con,"%l:%i %p");
                   $sql = "select ride_id,date_format(start_time,'$date_format') startd, date_format(start_time,'$time_format') startt, price,seats_left from ride where route_id='$route_id'";
                   $result = mysqli_query($con,$sql);
                   if(mysqli_num_rows($result)>0) {
                   while($row = mysqli_fetch_array($result)) {
                     echo ' <form method="post">
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
                    
                    }
                }else {
                    echo '<div class="ride-detail">
                              Sorry! No Rides Found.
                              </div>';
                }
            }else {
                        echo '<div class="ride-detail">
                              Sorry! No Rides Found.
                              </div>';
            }
            if (isset($_POST["booknow"])) {
                       $ride_id = $_POST["ride_id"];
                       $_SESSION["ride_id"] = $ride_id;
                       
                       header("location:book-customer-email.php");
                    }
                
        ?>
        
        
    </body>
</html>
