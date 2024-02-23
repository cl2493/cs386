<?php
echo 'please work';
<!----- HOMEPAGE  ----->
<! DOCTYPE html>
<!----- Basic Starting Set Up ----->
<html lang="en">
  <head>
    <meta name="viewport">
    <title>RNT-A-ROOM</title>
    <!----- Connects to Different Files ----->
    <!-----
    This connects to homepageStyle.css
    which will make the website look pretty
    ----->
    <link rel="stylesheet" href = "style/homepageStyle.css">
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <script src="script.js" defer></script>
  </head>
    <!----- Start of the Enter Webpage ----->
  <body>
        <div class = "header">           
            <nav id = "navBar">
                <img  src="images/logo.png" class = "logo" >
                <ul class = "nav-links">
                    <li><a href = "404ErrorPage.html">Locations</a></li>
                    <li><a href = "404ErrorPage.html">Benefits</a></li>
                    <li><a href = "404ErrorPage.html">Accommodation</a></li>
                </ul>
				<li class = "login-btn" onclick="popupFunction()">Sign In</li>
            </nav>
            <div class="container">
				<div class="left">
				<h1>A Place That<br>Feels Like Home</h1>
                <div class="search-bar">
					<form>
                        <div class="search-input">
                            <label>Location</label>
                            <input type="text" placeholder="New York, Chicago...">
                        </div>
                        <div class="content-dropdown" data-dropdown>
                            <label># of Beds</label>
                            <button class="drop" data-dropdown-button>Beds</button>
                            <div class="dropdown-menu">
                                <div class= "dropdown-menu-selection">
                                    <a href="#" class = "link">1</a>
                                    <a href="#" class = "link">2</a>
                                    <a href="#" class = "link">3</a>
                                    <a href="#" class = "link">4</a>
                                    <a href="#" class = "link">5</a>
                                </div>
                            </div>
                        </div>
                        <div class="content-dropdown" data-dropdown>
                                <label>Lease Length</label>
                                <button class="drop" data-dropdown-button># of Weeks</button>
                                <div class="dropdown-menu">
                                    <div class= "dropdown-menu-selection">
                                        <a href="#" class = "link">1-3</a>
                                        <a href="#" class = "link">4-6</a>
                                        <a href="#" class = "link">7-9</a>
                                        <a href="#" class = "link">10-15</a>
                                        <a href="#" class = "link">15+</a>
                                    </div>
                                </div>                            
                        </div>
                        <button class="sub-btn" type="submit"><img src = "assets/search.png" alt="serach icon"></button>
                    </form>
                </div>
				</div>
				<div class ="myPopup" id="myPopup">
					<form>
						<h5 class="tenants-login">Sign In</h5>
						<label>Name:</label><br>
						<input type="text"><br>
						<label>House:</label><br>
						<input type="text"><br>
					</form>
				</div>
            </div>
        </div>
<!----UNDERNEATH THE HEADER PHOTO---------->
        <div class = "container">
            <h2 class="sub-title">Where You Going To Next?</h2>
            <div class="content-type">
                <div>
                    <img src="images/homepageImages/locationsImages/flordia.jpg">
                    <span>
                        <h3>Miami, Flordia</h3>
                    </span>
                </div>
                <div>
                    <img src="images/homepageImages/locationsImages/hawaii.jpg">
                    <span>
                        <h3>Honolulu, Hawaii</h3>
                    </span>
                </div>
                <div>
                    <img src="images/homepageImages/locationsImages/texas.jpeg">
                    <span>
                        <h3>San Antonio, Texas</h3>
                    </span>
                </div>
                <div>
                    <img src="images/homepageImages/locationsImages/atlanta.jpg">
                    <span>
                        <h3>Atlanta, Georgia</h3>
                    </span>
                </div>
                <div>
                    <img src="images/homepageImages/locationsImages/washington.jpg">
                    <span>
                        <h3>Seattle, Washington</h3>
                    </span>
                </div>
            </div>
            <h2 class="sub-title">Types Of Living</h2>
            <div class="type-rentals">
                <div>
                    <img src = "images/homepageImages/rentalTypeImages/homes.jpg">
                    <h3>Rental Homes</h3>
                </div>
                <div>
                    <img src = "images/homepageImages/rentalTypeImages/hotel.jpg">
                    <h3>Extended Stays Hotels</h3>
                </div>
                <div>
                    <img src ="images/homepageImages/rentalTypeImages/apartments.jpg">
                    <h3>Apartments</h3>
                </div>
            </div>
            <div class="prop-owner-contact">
                <h3>Want to support<br>our Travel Nurses?</h3>
                <p>Look into how you can get your space posted on our website</p>
                <a href ="404ErrorPage.html" class="learn-btn">Learn More</a>
            </div>

        </div>







    <!------ footer ----->
    <div class = "footer">
      <p>Follow Us On Social Media</p>
      <a href = "404ErrorPage.html"><i class="fa-brands fa-facebook"></i></a>
      <a href = "404ErrorPage.html"><i class="fa-brands fa-google-plus"></i></a>
      <a href = "404ErrorPage.html"><i class="fa-brands fa-instagram"></i></a>
      <a href = "404ErrorPage.html"><i class="fa-brands fa-yelp"></i></a>
      <a href = "404ErrorPage.html">Help Center</a>
      <a href = "404ErrorPage.html">About Us</a>
      <p>Copyright © 2024, RNT-A-ROOM</p>
    </div>
	<script>
	// When the user clicks on div, open the popup
	function popupFunction() {
		var popup = document.getElementById("myPopup");
		popup.classList.toggle("show");
	}
	</script>
  </body>
</html>
