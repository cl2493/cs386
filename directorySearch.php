    <!-- jQuery UI library -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
    <div class = "search-container">
        <div class = "search-content">
            <div class = "location-search">
                <form action="filter.php" method="post">
                    <div class="search-input">
                        <label>Location</label>
                        <input name="location" type="text" placeholder="New York, Chicago..." value="<?=$location?>">
                    </div>
                    <div class="content-dropdown" data-dropdown>
                        <label># of Beds</label>
                        <select name="bed" id="" class="drop">
                            <option value=""><?=$bed?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="content-select">
                        <label>Lease Length</label>
                        <input type="text" id="lease_length" placeholder="Select lease length">
                    </div>
                    <div class="price-input-container"> 
                        <div class="price-input"> 
                            <div class="price-field"> 
                                <span>Minimum Price</span> 
                                <input name="minPrice" type="number" class="min-input" value="0"> 
                            </div> 
                            <div class="price-field"> 
                                <span>Maximum Price</span> 
                                <input name="maxPrice" type="number" class="max-input" value="10000"> 
                            </div> 
                        </div> 
                    <div class="slider-container"> 
                        <div class="price-slider"> 
                        </div> 
                    </div> 
                </div> 
  
            <!-- Slider -->
            <div class="range-input"> 
                <input type="range" class="min-range" min="0" max="10000" value="0" step="500"> 
                <input type="range" class="max-range" min="0" max="10000" value="10000" step="500"> 
            </div>
                    <button name="filterBtn" class="sub-btn" type="submit"><img src = "assets/search.png" alt="serach icon"></button>
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

