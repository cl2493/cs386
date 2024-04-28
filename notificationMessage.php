
<?php

include("connection.php");

?>
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
    transform: translateY(-8%) translateX(-15%);
    pointer-events: auto; /* Enable pointer events when visible */
}


.dropdown-btn {   
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    right: 25%;
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
    <div class = "dropdown-container">
    <?php newMessageIcon($user->messageFlag);?>
    <button class="dropdown-btn"></button>
        <div class = "message-container">
            <div class = "message-content">
                <div class = "title">
                    <h2>Notification Message</h2>
                </div>
                <div id = "pop-up" class = "message">
                    <?php
                    // get user data
                    $user = checkLogin($conn,$_SESSION['pfType']);
                        //if the user is a nurse
                        if ($user->pfType == "travelnursesdb")
                        {
                            // get the listing that the user is reserving
                            $query = "SELECT * FROM listingsdb WHERE address = :address OR availability=:user_id";
                            $userListing = [
                                ':address' => $user->reservedProperty,
                                ':user_id' => $user->user_id,
                            ];

                            $userListings = getListings($conn, $query, $userListing);

                            if (count($userListings))
                            {
                                $reservedListing = $userListings[0];
                            }

                            //check what type of notification the user will receive and display the correct message
                            // if tn request reservation
                            if ($user->messageFlag == 1)
                            {
                                echo "<h3> Reservation Requested </h3>";
                                echo "<p> You requested a reservation request at ".$reservedListing->city." for ".$reservedListing->bed." beds and ".$reservedListing->bath." baths. The price was ".$reservedListing->price.". </p>";
                                echo "<p> Please wait to get a confirmation message about your booking. </p>";
                            }
                            // if tn's request has been accepted
                            else if ($user->messageFlag == 2)
                            {
                                echo "<h3> Reservation Accepted </h3>";
                                echo "<p> Your reservation request at ".$reservedListing->city." for ".$reservedListing->bed." beds and ".$reservedListing->bath." baths was accepted. The price was ".$reservedListing->price.". </p>";
                                echo "<p> Please wait for the owner to contact you. </p>";
                            }
                            // if tn's request has been declined
                            else if ($user->messageFlag == 3)
                            {
                                echo "<h3> Reservation Declined </h3>";
                                echo "<p> Your reservation request for ".$reservedListing->city." for ".$reservedListing->bed." beds and ".$reservedListing->bath." baths was declined. The price was ".$reservedListing->price.". </p>";
                                echo "<p> Please try to make a reservation at another location. </p>";
                            }
                            //otherwise something went wrong
                            else if ($user->messageFlag == 4)
                            {
                                echo "<h3> Reservation Canceled </h3>";
                                echo "<p> Your reservation request at ".$reservedListing->city." for ".$reservedListing->bed." beds and ".$reservedListing->bath." baths was canceled. The price was ".$reservedListing->price.". </p>";
                                echo "<p> Please try to make a reservation at another location. </p>";
                            }
                            else
                            {
                                echo "<h3> No Notifications </h3>";
                            }
                        }
                        else
                        {
                            for ($listing = 0; $listing < count($user->pfListings); $listing++)
                            {
                                if ($user->pfListings[$listing]->availability != "available" && $user->pfListings[$listing]->availability != "reserved")
                                {
                                    echo "<h3> Reservation Requested </h3>";
                                    echo "<p> You received a reservation request at ".$user->pfListings[$listing]->city." for ".$user->pfListings[$listing]->bed." beds and ".$user->pfListings[$listing]->bath." baths. The price was ".$user->pfListings[$listing]->price.". </p>";
                                    echo "<p> Please accept or decline the request. </p>";
                                    $currentListing = serialize($user->pfListings[$listing]);
                                    echo "<form action='reservation.php' method='post'>";
                                    echo "<input type='hidden' name='currentListing' value='" . htmlspecialchars($currentListing) . "'>";
                                    echo "<button name='accept' class='accept-btn' type='submit'>Accept</button>";
                                    echo "<button name='decline' class='decline-btn' type='submit'>Decline</button>";
                                    echo "</form>";
                                }
                                else if ($user->pfListings[$listing]->availability == "reserved")
                                {
                                    echo "<h3> Reservation Accepted </h3>";
                                    echo "<p> You accepted a reservation request at ".$user->pfListings[$listing]->city." for ".$user->pfListings[$listing]->bed." beds and ".$user->pfListings[$listing]->bath." baths. The price was ".$user->pfListings[$listing]->price.". </p>";
                                    echo "<p> Please contact the nurse to confirm the reservation. </p>";
                                }
                                else if ($user->pfListings[$listing]->availability == "declined")
                                {
                                    echo "<h3> Reservation Declined </h3>";
                                    echo "<p> You declined a reservation request at ".$user->pfListings[$listing]->city." for ".$user->pfListings[$listing]->bed." beds and ".$user->pfListings[$listing]->bath." baths. The price was ".$user->pfListings[$listing]->price.". </p>";
                                    echo "<p> Please try to make a reservation at another location. </p>";
                                }
                                else if ($user->pfListings[$listing]->availability == "canceled")
                                {
                                    echo "<h3> Reservation Canceled </h3>";
                                    echo "<p> You canceled a reservation at ".$user->pfListings[$listing]->city." for ".$user->pfListings[$listing]->bed." beds and ".$user->pfListings[$listing]->bath." baths. The price was ".$user->pfListings[$listing]->price.". </p>";
                                    echo "<p> Please try to make a reservation at another location. </p>";
                                }
                                else
                                {
                                    echo "<h3> No Notifications </h3>";
                                }
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
