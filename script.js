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