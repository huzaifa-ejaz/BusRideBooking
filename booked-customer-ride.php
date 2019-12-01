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
        <div class="ride-detail" id="booked-ride">
                <div class="od-line"></div>
                <div class="origin-box">Karachi</div>
                <div class="dest-box">Lahore</div>
                <div class="fare-box">2000PKR</div>
                <div class="date-box">20/Nov/2019</div>
                <div class="time-box">12:30PM</div>
                <div class="seat-box">5 Seats Booked</div>
                <img src="images/money-icon.png" class="money-icon">
    
                <a href="booked-cancelled.html"><button class="book-btn">Cancel Booking</button></a>
            </div>
    </body>
</html>
