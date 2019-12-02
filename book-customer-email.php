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
        <title>Bussed|Book My Ride</title>
        <link rel="stylesheet" type="text/css" href="styles/navbar-styles.css">
        <link rel="stylesheet" type="text/css" href="styles/footer-style.css">
        <link rel="stylesheet" type="text/css" href="styles/forms-styles.css">

    </head>
	<style>
		.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 25px;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
}

.button:hover {
  background-color: green;
}
	.input[type=text]{
  width: 100%;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
   box-sizing: border-box;
}</style>
    <body>
            <ul>
                    <li ><a href="home.html">Home</a></li>
                    <li class="dropdown">
                            <a href="javascript:void(0)" class="dropbtn">Booking</a>
                            <div class="dropdown-content">
                              <a href="book-ride-start-end.html">Book A New Ride</a>
                              <a href="booked-customer-info.html">I've Already Booked</a>
                            </div>
                          </li>
                    <li><a href="help.html">Help</a></li>
                        
                </ul>
							<br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <div class="w3-panel w3-border w3-round-xxlarge">
        <form method="post">
           Email:
             <input type="email" name="cemail" size="30" maxlength="35"/>
           
           <input type="submit" value="Book Now" name="giveemail" class="book-btn">
        </form>
        <?php
                  
                   if (isset($_POST["giveemail"])) {
                       $email = $_POST["cemail"];
                       $_SESSION["email"] = $email;
                       $ride_id = $_SESSION["ride_id"];
                      
                       $get_cr_id = "select cr_id from customer where email='$email'";
                       $result = mysqli_query($con,$get_cr_id);
                       if(!$result) {
                         exit("Query couldn't be executed");
                       }
                       if(mysqli_num_rows($result) > 0){
                             $row = mysqli_fetch_assoc($result);
                             $cr_id = $row["cr_id"];

                             $check_cr_id = "select * from booking where cr_id=$cr_id";
                             $resultchk = mysqli_query($con,$check_cr_id);
                             if (!$resultchk) {
                              exit("Query couldn't be executed");
                             }
                             $rows_cleared = 0;
                             if(mysqli_num_rows($resultchk) === 0) {
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
                                  } else {
                                    while($row = mysqli_fetch_assoc($resultchk)) {
                                      $can = strcmp($row['status'],"cancelled");
                                      $tak = strcmp($row['ride_taken'],"taken");
                                      if($can === 0 or $tak === 0) {
                                        $rows_cleared++;
                                      }
                                    }
                                    if($rows_cleared === mysqli_num_rows($resultchk)) {
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
                                    } else {
                                      echo '
                                            <div><p> You already have a booked ride! </p></div>
                                           ';
                                    }
                                  }
                       
                       }else {
                         header("location:book-customer-info.php");
                       }
                      }






                    
                ?>
		</div>
    </body>
</html>
