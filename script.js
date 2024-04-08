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



/* the form 
Capture form submission
document.querySelector('.register-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission behavior
    
    // Gather form data
    const firstName = document.querySelector('#first-name').value;
    const lastName = document.querySelector('#last-name').value;
    const email = document.querySelector('#nurse-email').value;
    const password = document.querySelector('#password').value;
    const confirmPassword = document.querySelector('#check-password').value;
    const birthday = document.querySelector('#birthday').value;

    // Validation (you can add more checks as needed)
    if (!firstName || !lastName || !email || !password || !confirmPassword || !birthday) {
        alert('Please fill in all fields');
        return;
    }
    if (password !== confirmPassword) {
        alert('Passwords do not match');
        return;
    }
    
    // Create an object to hold the form data
    const formData = {
        firstName: firstName,
        lastName: lastName,
        email: email,
        password: password,
        birthday: birthday
    };

    //BACK END POINT NEEDED//

    // Send data to backend (assuming using fetch API)
    fetch('../INSERT-BACKEND-ENDPOINT HERE', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Handle successful registration
        console.log(data);
        alert('Registration successful!');
        // Optionally, redirect to another page
        window.location.href = '/success.html';
    })
    .catch(error => {
        // Handle errors
        console.error('There was a problem with the registration:', error);
        alert('Registration failed. Please try again later.');
    });
});

document.querySelector(".select-btn").addEventListener("click", function() {
    document.getElementById("certFile").click();
});

document.getElementById("certFile").addEventListener("change", function() {
    var fileName = this.files[0].name;
    document.getElementById("fileNameDisplay").textContent = fileName;
});

// Optional: Submit the form when a file is selected
document.getElementById("certFile").addEventListener("change", function() {
    document.getElementById("certForm").submit();
});
*/
