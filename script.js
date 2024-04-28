// Welcome Pop Up
document.addEventListener('DOMContentLoaded', function()
{
    // function to show the popup
    function showPopup(){
        var wPopUp = document.getElementById('welcomePopup');
        wPopUp.style.display = 'block';

        // hides the popup after 3 seconds
        setTimeout(function(){
            wPopUp.style.display = 'none';

        }, 3000);

    }

    // call the function when DOM fully loads
    showPopup();
});

/*
Dropdown Menu Funciton
checks if the user clicks on the dropdown
clicks on the body
because we want to see what the user is clicking on
*/
document.addEventListener('click', e=>{
    //Checks if the user clicks the dropdown button
    const isDropdownButton = e.target.matches("[data-dropdown-button]")

    let currentDropdown

    //if the user is outside a drop down, then don't do anyhting
    if (!isDropdownButton && e.target.closest('[data-dropdown]') != null) return
    
    //if we are clicking a dropdown button
    if (isDropdownButton)
    {
        // Prevent the default behavior of the anchor tag
        e.preventDefault();
        
        //get the dropdown we are clicking on
        currentDropdown = e.target.closest('[data-dropdown]')
    
        //hide or show the dropdown
        currentDropdown.classList.toggle('active')
    }

//Loop through all the active/open dropdowns (closes all the other dropdowns)
    document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
        //if the dropdown and the current are the same then do nothing
        if (dropdown === currentDropdown) return
        //otherwise, remove the active class
        dropdown.classList.remove('active')
    })
})

// When the user clicks on div, open the popup
function popupFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}

function closePopup() {
    var popup = document.getElementById("myPopup");
    popup.classList.add("exit");
    // Remove the 'show' class after a delay to ensure the fade-out animation plays
    setTimeout(function() {
        popup.classList.remove("show");
        popup.classList.remove("exit");
    });
}

function showMessageFunction() {
    alert("You need to be logged in to view a property.")
}



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

// function to hide certification upload section after upload
window.addEventListener('DOMContentLoaded', function () 
{
    var certificationContainer = document.getElementById('certification');

    if (certificationContainer) 
    {
        var certificationForm = certificationContainer.querySelector('certForm');
        if (certificationForm) 
        {
            certificationForm.addEventListener('submit', function () 
            {
                certificationContainer.style.display = 'none';
            });
        }
    }
});