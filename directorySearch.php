    <!-- jQuery UI library -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
    <div class = "search-container">
        <div class = "search-content">
            <div class = "location-search">
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
                    <div class="content-select">
                        <label>Lease Length</label>
                        <input type="text" id="lease_length" placeholder="Select lease length">
                    </div>
                    <button class="sub-btn" type="submit"><img src = "assets/search.png" alt="serach icon"></button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#lease_length").datepicker({
            numberOfMonths: 2, // Display two months in the datepicker
            showButtonPanel: true, // Show a button panel with 'Today' and 'Done' buttons
            dateFormat: "yy-mm-dd", // Date format
            onSelect: function(selectedDate) {
                var endDate = $(this).datepicker("getDate"); // Get selected date
                endDate.setDate(endDate.getDate() + 30); // Add 30 days to selected date
                $("#lease_length").datepicker("option", "maxDate", endDate); // Set max date
            }
        });
    });
</script>

