
<style>
/* Style for the notification message container */
.message-container {
    display: flex;
    align-items: center;
    justify-content: center; /* Center content horizontally */
    text-align: center; /* Center text horizontally */
    background-color: rgba(233, 233, 233, 0.7);
    width: 20%;
    border-radius: 10px;
    padding: 10px;
    position: absolute;
    top: 12%; /* Adjust the position as needed */
    right: 13%; /* Adjust the position as needed */
    box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.3);
}

/* Style for the dropdown container */
.dropdown-container {
    background-color: red;
}
button {
    background-color: red;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px;
    margin: 5px;

}
</style>

    <div class = "dropdown-container">
        <div class = "message-container">
            <div class = "message-content">
                <div class = "title">
                    <h2>Notification Message</h2>
                </div>
                <div id = "pop-up" class = "message">
                    <?php

                        //if the user is a nurse
                        if (false)
                        {
                            //check what type of notification the user will receive and display the correct message
                            if (false)
                            {
                                echo "<h3> Reservation Requested </h3>";
                                echo "<p> You made a reservation at $location for $bed beds and $baths baths. The price range is $$minPrice to $$maxPrice. </p>";
                                echo "<p> Please wait to get a confirmation message about your booking. </p>";
                            }
                            else if (false)
                            {
                                echo "<h3> Reservation Accepted </h3>";
                                echo "<p> Your reservation at $location for $bed beds and $baths baths has been accepted. The price range is $$minPrice to $$maxPrice. </p>";
                                echo "<p> Please wait for the owner to contact you. </p>";
                            }
                            else if (false)
                            {
                                echo "<h3> Reservation Declined </h3>";
                                echo "<p> Your reservation at $location for $bed beds and $baths baths has been declined. The price range is $$minPrice to $$maxPrice. </p>";
                                echo "<p> Please try to make a reservation at another location. </p>";
                            }
                            //otherwise something went wrong
                            else
                            {
                                echo "<h3> Reservation Canceled </h3>";
                                echo "<p> Your reservation at $location for $bed beds and $baths baths has been canceled. The price range is $$minPrice to $$maxPrice. </p>";
                                echo "<p> Please try to make a reservation at another location. </p>";
                            }
                        }
                        else if (true)
                        {
                            if (true)
                            {
                                echo "<h3> Reservation Requested </h3>";
                                //echo "<p> You received a reservation request at $location for $bed beds and $baths baths. The price range is $$minPrice to $$maxPrice. </p>";
                                echo "<p> Please accept or decline the request. </p>";
                                echo "<form action='notificationMessage.php' method='post'>";
                                echo "<button name='accept' class='accept-btn' type='submit'>Accept</button>";
                                echo "<button name='decline' class='decline-btn' type='submit'>Decline</button>";
                                echo "</form>";
                            }
                            else if (false)
                            {
                                echo "<h3> Reservation Accepted </h3>";
                                echo "<p> You accepted a reservation at $location for $bed beds and $baths baths. The price range is $$minPrice to $$maxPrice. </p>";
                                echo "<p> Please contact the nurse to confirm the reservation. </p>";
                            }
                            else if (false)
                            {
                                echo "<h3> Reservation Declined </h3>";
                                echo "<p> You declined a reservation at $location for $bed beds and $baths baths. The price range is $$minPrice to $$maxPrice. </p>";
                                echo "<p> Please try to make a reservation at another location. </p>";
                            }
                            else
                            {
                                echo "<h3> Reservation Canceled </h3>";
                                echo "<p> You canceled a reservation at $location for $bed beds and $baths baths. The price range is $$minPrice to $$maxPrice. </p>";
                                echo "<p> Please try to make a reservation at another location. </p>";
                            }

                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
