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
        <title>Bussed|Book A New Ride</title>
        <link rel="stylesheet" type="text/css" href="styles/navbar-styles.css">
        <link rel="stylesheet" type="text/css" href="styles/footer-style.css">
        <link rel="stylesheet" type="text/css" href="styles/forms-styles.css">
    </head>
	<style>
	select {
  width: 100%;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;

}
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
	</style>
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
                    <p>From: </p>
                    <select name="ogn">
                    <?php
                        $sql="select distinct origin from Route";
                        $result = mysqli_query($con,$sql);
                        if(mysqli_num_rows($result)>0) {
                             while($row = mysqli_fetch_array($result)) {
                                 echo "<option value=$row[origin]>$row[origin]</option>";
                              }
                            }else {
                            echo "<option>No origins</option>";
                        }
                    ?>
                    </select>
                    <p>To: </p>
                    <select name="dstn">
                    <?php
                        $sql="select distinct destination from Route";
                        $result = mysqli_query($con,$sql);
                        if(mysqli_num_rows($result)>0) {
                             while($row = mysqli_fetch_array($result)) {
                                 echo "<option value=$row[destination]>$row[destination]</option>";
                              }
                            }else {
                            echo "<option>No destinations</option>";
                        }
                    ?>
                    <br>
                    <input type="submit" value="Find Rides" name="findRides">
                </form>
		
              <?php
                   if (isset($_POST["findRides"])) {
                       $ogn = $_POST["ogn"];
                       $dstn = $_POST["dstn"];
                       $_SESSION["ogn"] = $ogn;
                       $_SESSION["dstn"] = $dstn;
                      
                       header("location:show-rides.php");
                    }
                ?>
		</div>
    </body>
</html>
