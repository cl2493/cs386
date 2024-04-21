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
