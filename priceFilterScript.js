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