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
