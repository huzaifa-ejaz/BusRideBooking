<!DOCTYPE html>
<html>
    <head>
        <title>Expresso|Book My Ride</title>
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
        <form>
           <p>Email:<br>
             <input class="input" type="text" name:"cemail" size="20" maxlength="35"/>
           </p> 
        </form>
        <a href="book-customer-info.html"><button class= "button">Go!</button></a>
		</div>
    </body>
</html>
