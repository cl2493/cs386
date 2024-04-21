<link rel="stylesheet" href="style/listing-filter.css">
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
                            <input name="minPrice" type="number" class="min-input" value="1200">
                        </div>
                        <div class="price-field">
                            <label for="maxPrice">Maximum Price</label>
                            <input name="maxPrice" type="number" class="max-input" value="3800">
                        </div>
                    </div>
                    <div class = "slider">
                        <div class="price"></div>
                    </div>
                    <div class = "range-input">
                        <input type="range" class="range-min" min="0" max="5000" value="1200" id="myRange" step ="100">
                        <input type="range" class="range-max" min="0" max="5000" value="3800" id="myRange" step ="100">
                    </div>
                </form>
                <button name="filterBtn" class="sub-btn" type="submit"><img src = "assets/search.png" alt="serach icon"></button>
        </div>
    </div>
</div>

<script>
    // JavaScript for the price range slider
    // Get the range input and price input
    const rangeInput = document.querySelectorAll('.range-input input');
    priceInput = document.querySelectorAll('.price-input-container input');
    // Get the progress bar
    progress = document.querySelector(".slider .price");
    // Set the price gap
    let priceGap = 1000;

    priceInput.forEach(input =>{
        // Add event listener to the input
        input.addEventListener("input", e =>{
            //get the two input values of the range input
            let minVal = parseInt(priceInput[0].value);
            maxVal = parseInt(priceInput[1].value);
            //get the two values of the range input
            if((maxVal - minVal >= priceGap) && max <= 5000 && min >= 0){
                // Set the value of the range input
                if (e.target.className === "min-input")
                {
                    // Set the value of the range input
                    rangeInput[0].value = minVal;
                    progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                }
                else{
                    rangeInput[1].value = maxVal;
                    progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            }
        })
    })

    // Add event listener to the range input
    rangeInput.forEach(input =>{
        // Add event listener to the input
        input.addEventListener("input", e =>{
            //get the two values of the range input
            let minVal = parseInt(rangeInput[0].value);
            maxVal = parseInt(rangeInput[1].value);
            //get the two values of the price input
            if(maxVal - minVal < priceGap){
                // Set the value of the price input
                if (e.target.className === "range-min")
                {
                    // Set the value of the price input
                    rangeInput[0].value = maxVal - priceGap;
                }
                else{
                    rangeInput[1].value = minVal + priceGap;
                }
            }
            else{
                // Set the value of the price input
                priceInput[0].value = minVal;
                priceInput[1].value = maxVal;
                progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
        })
    })
</script>
