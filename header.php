<div class = "header">           
            <nav id = "navBar">
                <a href = "index.php"><img src="images/logo.png" class="logo"></a>
                <ul class = "nav-links">
                    <li><a href = "listing.php">Locations</a></li>
                    <li><a href = "404ErrorPage.html">Benefits</a></li>
                    <li><a href = "404ErrorPage.html">Accommodation</a></li>
                </ul>
                <?php
                    if (isset($_SESSION['user_id']))
                    {
                        if ($_SESSION['pfType'] == 'travelnursesdb')
                        {
                            //calls newMessageIcon function to display the bell icon
                            newMessageIcon($user->messageFlag);
                            echo '<div class="profile-dropdown">';
                            echo '<button class="profile-btn" data-dropdown-button>';
                            echo $user->first_name;
                            echo '</button>';
                            echo '<div class="menu-dropdown" data-dropdown tabindex="0">';
                            echo '<div class="menu-dropdown-content">';
                            echo '<a href="nurse-profile.php">Profile</a>';
                            echo '<a href="nurse-profile-tabs/payment-setting.php">Payment</a>';
                            echo '<a href="404ErrorPage.html">History</a>';
                            echo '<a href="404ErrorPage.html">Settings</a>';
                            echo '<a href="logout.php">Logout</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        } 
                        else
                        {
                            //calls newMessageIcon function to display the bell icon
                            newMessageIcon(true);
                            echo '<div class="profile-dropdown">';
                            echo '<button class="profile-btn" data-dropdown-button>';
                            echo $user->first_name;
                            echo '</button>';
                            echo '<div class="menu-dropdown" data-dropdown tabindex="0">';
                            echo '<div class="menu-dropdown-content">';
                            echo '<a href="propertyOwner-profile.php">Profile</a>';
                            echo '<a href="nurse-profile-tabs/payment-setting.php">Payment</a>';
                            echo '<a href="404ErrorPage.html">History</a>';
                            echo '<a href="404ErrorPage.html">Settings</a>';
                            echo '<a href="logout.php">Logout</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    else
                    {
                        echo '<a class="login-btn" onclick="popupFunction()">Sign In</a>';
                    }
                ?>
            </nav>
            <div class ="myPopup" id="myPopup">
                <button class="exit-btn" onclick="closePopup()">X</button>
                <form action="signin.php" method="POST" class="myPopup-Form">
                    <h2 class="tenants-login">Sign In</h2>
                    <label>Email</label><br>
                    <input name="signinemail" type="text"><br>
                    <label>Password</label><br>
                    <input name="signinpassword" type="password"><br>
                    <button name="sign-in-btn" type= "submit" class="sign-in-btn">Login</button>
                </form>
                <a href="nurse-register.php" class="sign-in-btn" id = "nurse-register">Register</a>
            </div>
