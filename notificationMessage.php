
<style>
/* Style for the notification message container */
.message-content{
    align-items: center;
    justify-content: center;
    text-align: center;
    background-color: rgba(233, 233, 233, 0.7);
    width: 100%;
    border-radius: 10px;
    padding: 10px;
    position: absolute;
    box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.3);
    transform: translateY(-20%);
    transition: opacity 150ms ease-in-out, transform 150ms ease-in-out;
    opacity: 0;
    pointer-events: none; 
}
.btn {
    background-color: red;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px;
    margin: 5px;
}
#bell{
    cursor: pointer;
    width: 20px;
    height: 20px;
    position: absolute;
    right: 23%;
    top: 8%;
}

.dropdown-container:hover .message-content,
.dropdown-btn:hover + .message-container .message-content,
.message-content:hover {
    opacity: 1;
    transform: translateX(0%);
    pointer-events: auto; /* Enable pointer events when visible */
}


.dropdown-btn {   
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    right: 22%;
    top: 6%;
    height: 6%;
    width: 3%;
    z-index: 1;
    opacity: 0;
    background-color: transparent;
    cursor: pointer;
}

.message-container{
    display: flex;
    position: absolute;
    width: 19%;
    height: 55%;
    z-index: 1;
    top: 11%; /* Adjust the position as needed */
    right: 13.5%; 
    pointer-events: none;
}
</style>


<?php newMessageIcon(true);?>

    <div class = "dropdown-container">
            <button class="dropdown-btn">No</button>
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
                                echo "<button name='accept' class='btn' type='submit'>Accept</button>";
                                echo "<button name='decline' class='btn' type='submit'>Decline</button>";
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
