<link rel="stylesheet" href="style/listing-filter.css">

<script href = "script.js"></script>

<!--- Listing Search Filter --->
<div class="container">
    <div class = "search-container">
        <div class = "search-content">
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
                    <div class="content-dropdown" data-dropdown>
                        <label># of Baths</label>
                        <select name="bath" id="bath-input" class="drop">
                            <option value=""><?=$baths?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="price-input-container">
                        <div class="price-field">
                            <label for="minPrice">Minimum Price</label>
                            <input name="minPrice" type="number" class="min-input" value="<?=$minPrice?>">
                        </div>
                        <div class="price-field">
                            <label for="maxPrice">Maximum Price</label>
                            <input name="maxPrice" type="number" class="max-input" value="<?=$maxPrice?>">
                        </div>
                    </div>
                    <div class = "slider">
                        <div class="price"></div>
                    </div>
                    <div class = "range-input">
                        <input type="range" class="range-min" min="0" max="5000" value="<?=$minPrice?>" step ="100">
                        <input type="range" class="range-max" min="0" max="5000" value="<?=$maxPrice?>" step ="100">
                    </div>
                <button name="filterBtn" class="filterBtn" type="submit"><img src = "assets/search.png" alt="serach icon"></button>
            </form>
        </div>
    </div>
</div>
