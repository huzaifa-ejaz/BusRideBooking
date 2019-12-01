<!DOCTYPE html>
<html>
    <head>
        <title>Expresso|Check Out My Ride</title>
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
        
            <form>
                <p>My Booking ID:<br>
                    <input class="input" type="text" name="cbid" size="4" maxlength="4">
                </p>
                <p>My Email:<br>
                        <input class="input" type="text" name="cid" size="20" maxlength="30">
                </p>
            </form>
            <a href="booked-customer-ride.html"><button class="button">Check Out My Ride</button></a>
        </div>
    </body>
</html>
